<?php

class ST24apiv1 {

	/**
	 * berikut adalah contoh kode memanggil library ini
	 * $this->load->library('ST24apiv1');
	 * $this->st24apiv1->set_host("http://127.0.0.1:3500/internal/api");
	 * $this->st24apiv1->set_query("SELECT * FROM T_STORE_USER");
	 * $this->st24apiv1->set_secret("4d6816ad7eb3a98ed9739fd6361866b6798c9fd4");
	 * $result = $this->st24apiv1->run();
	 * echo json_encode($result);
	 *
	 *
	 */

	private $host = 'http://127.0.0.1:3500/internal/api';
	private $secret = '';
	private $query = '';
	private $error = [
		'status' => false,
		'message' => ""
	];
	private $response = [];
	private $is_debug = false;
	private $is_json_return = false;
	function test(){
		return "OK";
	}

	function set_host($host_ip){
		$this->host = $host_ip;
	}

	function is_debug($debug = false){
		$this->is_debug = $debug;
	}

	function set_secret($text_secret){
		$this->secret = $text_secret;
	}

	function set_query($text_query, $array_param = []){

		$text_query_exp = explode('?',$text_query);
		$count_text_query = count($text_query_exp);
		if($count_text_query > 1){
			if(($count_text_query-1) != count($array_param)){
				$this->error = [
					'status' => true,
					'message' => "Error set query, pastikan jumlah tanda tanya (?) dengan jumlah parameter array sama. ".$text_query
				];
				$this->query = $text_query;
				return;
			}
			$i = 0;
			$query_mapping = "";
			$text_tmp = '';
			$param_tmp = '';
			foreach($text_query_exp as $row){
				$text_tmp = $row;
				if($i < $count_text_query-1){
					$param_tmp = (is_string($array_param[$i])?"'".str_replace("'","''",$array_param[$i])."'":(
						$array_param[$i] == ''?"''":$array_param[$i]
					));
				}else{
					$param_tmp = '';
				}
				$row .= $this->anti_SQL_inject($param_tmp);
				$query_mapping .= $row;
				$i++;
			}
			if($this->is_debug){
				die($query_mapping);
				$this->error = [
					'status' => true,
					'message' => $query_mapping
				];
				$this->query = $text_query;
				return;
			}

			$this->query = $query_mapping;
		}else{
			if($this->is_debug){
				die($text_query);
				return;
			}
			$this->query = $text_query;
		}

	}

	function anti_SQL_inject($string){
		$temp_string = strtoupper($string);
		if ((strpos($temp_string, 'UNION') !== false)||(strpos($temp_string, 'SELECT') !== false)) {
			$this->black_list_ip();
		}
		$result=$string;
		$result=trim($result);
		$result=htmlentities($result);
		$result=addslashes($result);
		$result=strip_tags($result);
		$result=stripslashes($result);
		$result=htmlspecialchars($result);
		return $result;
	}


	function run(){
		if($this->is_json_return){
			header('Content-Type: application/json');
		}
		//$request_body = json_decode(file_get_contents('php://input'));

		if($this->is_ip_black_list()){
			return (object)[
				'success' => false,
				'response' => 'Access Violation (-1)'
			];
		}

		if(empty($this->query)){
			return (object)[
				'success' => false,
				'response' => 'query harus diisi, isi pada function object->set_query("SELECT * EXAMPLE")'
			];
		}

		if($this->error['status']){
			return (object)[
				'success' => false,
				'response' => $this->error['message']
			];
		}

		if(empty($this->secret)){
			return (object)[
				'success' => false,
				'response' => 'secret harus diisi, isi pada function object->set_secret("XXXXXXXXX-XXXXXXXXX-XXXXXXXXXX")'
			];
		}

		$timestamp = $this->get_timestamp();
		$data = array("timestamp" => $timestamp, "qstr" => $this->query);
		$data_string = json_encode($data);

		$secret = $this->secret;
		$replace_body = str_replace("\n", '', $data_string);
		$replace_body = str_replace("\r", '', $replace_body);
		$replace_body = str_replace("\t", '', $replace_body);
		$replace_body = str_replace(" ", '', $replace_body);

		$md5_body = base64_encode(hex2bin(md5($replace_body)));
		$signature = $this->get_signature($timestamp,$secret,$md5_body);

		// echo json_encode([
		// 	"signature" => $timestamp,
		// 	"md5_body" => $replace_body
		// ]); die();

		// {
		// "timestamp":"2019-11-11T18:20:37+0700",
		// "qstr":"Select * from t_cores"
		// }

		$ch = curl_init($this->host);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Signature: ' . $signature
			)
		);

		$result = curl_exec($ch);
		//die($result);
		$result_to_json = json_decode($result);
		if(!is_null($result_to_json)){
			$this->response = $result_to_json;
			if($result_to_json->rc != '00'){
				$this->error = [
					'status' => true,
					'message' => $result_to_json
				];
			}
			$query_invalid = '';
			if($result_to_json->rc == '90'){
				$query_invalid = ". Query ".$this->query;
			}
			return [
				'success' => true,
				'response' => $result_to_json
			];
		}else{
			$this->response = [];

			$this->error = [
				'status' => true,
				'message' => "Error, Gagal mengakses host ".$this->host
			];
			return (object) [
				'success' => false,
				'response' => "Error, Gagal mengakses host ".$this->host
			];
		}

	}

	function result(){
		if($this->is_ip_black_list()){
			return (object)[
				'success' => false,
				'response' => 'Access Violation (-1)'
			];
		}

		if($this->error['status']){
			return (object) [
				'success' => false,
				'response' => $this->error['message']
			];
		}

		if(empty($this->response->content)){
			return [];
		}
		return $this->response->content;
	}

	function row(){
		if($this->is_ip_black_list()){
			return (object)[
				'success' => false,
				'response' => 'Access Violation (-1)'
			];
		}

		if($this->error['status']){
			return (object)[
				'success' => false,
				'response' => $this->error['message']
			];
		}

		if(empty($this->response->content)){
			return null;
		}
		if(!$this->response->content){
			return null;
		}
		return $this->response->content[0];
	}

	function get_timestamp(){
		//$date = new DateTime('now');
		// /$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		//return $date->format('Y-m-d').'T'.$date->format('H:i:s').'+0700';
		date_default_timezone_set('Asia/Jakarta');
		//DATE_W3C
		//
		$time = date(DATE_W3C,time());
		$split = explode('+',$time);
		$split = $split[0].'+'.str_replace(':','',$split[1]);
		return $split;
	}

	function get_signature($timestamp,$secret,$md5_body){
		$hmac_signature =  $timestamp . ':' . $secret . ':' . $md5_body;
		$hmac_as_Base64 = $this->calculateHMACSHA256($hmac_signature, substr($secret,20,strlen($secret)). substr($secret,0,20));
		$result = $secret . ':' . $hmac_as_Base64;
		$result =  base64_encode($result);

		return $result;
	}

	function calculateHMACSHA256($hmac_signature,$secret){
		return base64_encode(hex2bin(hash_hmac('sha256',$hmac_signature,$secret)));;
	}

	function black_list_ip(){
		if(!$this->is_ip_black_list()){
			$folder_name = '.temp';
			$filename = 'black_list.json';
			$path = FCPATH.$folder_name."/".$filename;
			$json_in_file = json_decode(file_get_contents($path));
			$my_ip = $this->get_client_ip();
			$json_in_file[count($json_in_file)] = $my_ip;
			$this->create_file($path,json_encode($json_in_file));
		}
	}

	function is_ip_black_list(){
		$folder_name = '.temp';
		$filename = 'black_list.json';
		$path = FCPATH.$folder_name."/".$filename;
		$json_in_file = json_decode(file_get_contents($path));
		$my_ip = $this->get_client_ip();
		if(in_array($my_ip,$json_in_file)){
		  // die('You are a liar! (33)');
		  return true;
		}
		return false;
	}

	function get_client_ip(){
		//whether ip is from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
		  $ip_address = $_SERVER['HTTP_CLIENT_IP'];
		}
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
		  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		//whether ip is from remote address
		else
		{
		  $ip_address = $_SERVER['REMOTE_ADDR'];
		}
		return $ip_address;
	}

	private function create_file($file_name='',$content=''){
		$fp = fopen($file_name,"wb");
		fwrite($fp,$content);
		fclose($fp);
	}
}
