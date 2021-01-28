<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/securimage/securimage.php');

class Forgotpass extends CI_Controller {

  function __construct(){
    parent::__construct();
$this->M_logger->access();
    $this->securimage = new Securimage();

    $this->M_logger->access();
  }

  public function securimage(){
    $img = new Securimage();
    $img->show();
  }

  public function index(){
    if($this->is_ip_black_list()){
      die(json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation! (-1), Silakan hubungi CS kami")));
    }
    $get     = $this->input->get();
    $random  = random_string('numeric', 6);
    $headers = $this->input->request_headers();

    if($this->checkSign($headers['timestamp'],$headers['sign'])){
      $jsonArray    = json_decode(file_get_contents('php://input'),true);
      $ID           = $jsonArray['id'];
      $T           = $jsonArray['t'];
      $H           = $jsonArray['h'];
      $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
      $MyHash = sha1($ID . $T);
      $MyTime = strtotime(date("Y/m/d H:i:s"));
      $interval = abs($MyTime-$TDate);
      $now = date("YmdHis");

      if($jsonArray['captcha']==""){
        echo json_encode(array("status"=>"GAGAL CAPTCHA","pesan"=>"Kode Captcha Salah Belum Diisi"));return;
      }
      if(!$this->securimage->check($jsonArray['captcha'])){
        echo json_encode(array("status"=>"GAGAL CAPTCHA","pesan"=>"Kode Captcha Salah"));return;
      }

      if($MyHash === $H){
        if($interval < MAX_INTERVAL){
          $query        = $this->M_forgot->getUsername($ID);

          if($query) {
              $paramReset['username'] = $query->USER_NAME;
              $paramReset['store_id'] = $query->STORE_ID;
              $paramReset['random']   = $random;

              $affect = $this->M_forgot->reset_code($paramReset);

              if($affect > 0){
                $api_url = HOST_SEND_MSG.'?PhoneNumber='.$ID.'&Text='.urlencode('Reset Code untuk penggantian Password Anda adalah: '.$random).'&xmlin_id=W';
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_NOBODY, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_TIMEOUT,10);
                $output   = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                $data['affect']   = $affect;
                $data['status']   = 'SUKSES';
                $data['pesan']    = "Berhasil Reset Code";              
                $data['username'] = $query->USER_NAME;
                $data['store_id'] = $query->STORE_ID;
              } else {
                $data['status'] = 'GAGAL';
                $data['pesan'] = "Gagal Update Data";
              }
              echo json_encode($data);return;
          }else{
            echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!"));return;
          }
        }else{
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation!"));
          return;
        }
      }else{
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation!"));
        return;
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation! (-1)"));
      return;
    }

  }

  public function resendCode(){
    if($this->is_ip_black_list()){
      die(json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation! (-1), Silakan hubungi CS kami")));
    }
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
    $random  = random_string('numeric', 6);

    $jsonArray   = json_decode(file_get_contents('php://input'),true);
    $ID          = $jsonArray['id'];
    $T           = $jsonArray['t'];
    $H           = $jsonArray['h'];
    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyHash = sha1($ID . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);
    $now = date("YmdHis");

    if($MyHash === $H){
      if($interval < MAX_INTERVAL){
        $query       = $this->M_forgot->getUsername($ID);
        if($query->USER_NAME != "") {
            $paramReset['username'] = $query->USER_NAME;
            $paramReset['store_id'] = $query->STORE_ID;
            $paramReset['random']   = $random;

            $affect = $this->M_forgot->reset_code($paramReset);

            if($affect > 0){

              $api_url = HOST_SEND_MSG.'?PhoneNumber='.$id.'&Text='.urlencode('Reset Code untuk penggantian Password Anda adalah: '.$random.'&xmlin_id=W');
              $ch = curl_init($api_url);
              curl_setopt($ch, CURLOPT_HEADER, true);
              curl_setopt($ch, CURLOPT_NOBODY, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
              curl_setopt($ch, CURLOPT_TIMEOUT,10);
              $output = curl_exec($ch);
              $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
              curl_close($ch);

              $data['affect'] = $affect;
              $data['status'] = 'SUKSES';
              $data['pesan']  = "Berhasil Reset Code";
            }else{
              $data['status'] = 'GAGAL';
              $data['pesan']  = "Gagal Update Data";
            }
            echo json_encode($data);
        }else{
          echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!"));
        }
      }else{
        echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!"));
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!"));
    }

  }

  public function forgot(){
    $this->load->view('v_resetpass');
  }

  function forgot_pass(){
    if($this->is_ip_black_list()){
      die(json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation! (-1), Silakan hubungi CS kami")));
    }
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $idforgot  = $jsonArray['idforgot'];
    $username  = $jsonArray['username'];
    $store_id  = $jsonArray['store_id'];
    $resetcode = $jsonArray['resetcode'];
    $pwdnew    = $jsonArray['pwdnew'];
    $pwdconf   = $jsonArray['pwdconf'];
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];
    $now       = date("YmdHis");
    $now2      = date('YmdHis', strtotime($T));
    $MyHash    = sha1($idforgot . $pwdnew . $pwdconf . $T);

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);

    if($jsonArray['captcha']==""){
      echo json_encode(array("status"=>"GAGAL CAPTCHA","pesan"=>"Kode Captcha Salah Belum Diisi"));return;
    }
    if(!$this->securimage->check($jsonArray['captcha'])){
      echo json_encode(array("status"=>"GAGAL CAPTCHA","pesan"=>"Kode Captcha Salah"));return;
    }

    if($MyHash === $H){
      if($interval < MAX_INTERVAL){
        $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
        $headers = array(
          'signatureapps: '.hash('sha256',$uuid)
        );

        $affectcode = $this->M_forgot->cek_reset_code($jsonArray);

        if($affectcode->WEB_PASS_RESET_CODE == $resetcode){
            $expcode = $this->M_forgot->cekExpCode($jsonArray);

            if($now2 < $expcode->WEB_PASS_RESET_EXP) {
              $data['pwdconf']  = $pwdconf;
              $data['uname']    = $affectcode->USER_NAME;;
              $data['store_id'] = $store_id;
              $affect = $this->M_forgot->reset_pass($data);
                  if($affect > 0){
                    $this->session->set_userdata('count_reset_code',0);
                    //call api logout belanja
                    $this->logout_otp();
                    //end
                    $response['status'] = 'SUKSES';
                    $response['pesan']  = "Password Berhasil Di Reset";
                  }else{
                    $response['status'] = 'GAGAL';
                    $response['pesan']  = 'GAGAL RESET PASSWORD';
                  }
                  echo json_encode($response);
                  return;
            } else {
              $response['status'] = 'EXPIRED';
              $response['pesan'] = "Reset Code Expired, Kirim Ulang Reset Code!";
              echo json_encode($response);
            }

        } else {
          $this->session->set_userdata('count_reset_code',$this->session->userdata('count_reset_code')+1);
          if($this->session->userdata('count_reset_code')>3){
            $this->black_list_ip();
            $this->session->set_userdata('count_reset_code',0);
          }
          $response['status'] = 'SALAH';
          $response['pesan'] = 'Reset Code Yang Anda Masukan Salah';
          echo json_encode($response);
          return;
        }
      }else{
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
        return;
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
      return;
    }
  }

  //security
  private function checkSign($timestamp=null,$sign=null){
    if(empty($timestamp)){
      // die('You are a liar! (-1)');
      return false;
    }
    if(empty($sign)){
      // die('You are a liar! (-2)');
      return false;
    }

    $t_ar = str_split($timestamp);
    $getAlgoritmText = $t_ar[1].$t_ar[9].$t_ar[3].$t_ar[8].$t_ar[4].$t_ar[11].$t_ar[10].$t_ar[13].$t_ar[2].$t_ar[12].$t_ar[15].$t_ar[14].$t_ar[7].$t_ar[6].$t_ar[0].$t_ar[5];

    $algo = hash_hmac('sha256', $getAlgoritmText, 'C$PT4$0Lu$1');
    // die($algo);

    $my_ip = $this->get_client_ip();

    $folder_name = '.temp';
    $filename = 'black_list.json';
    $path = FCPATH.$folder_name."/".$filename;

    //check folder $folder_name  exist
    if(!file_exists(FCPATH.$folder_name)){
      mkdir(FCPATH.$folder_name, 0777, true);
    }
    //check file $filename exist
    if(!file_exists($path)){
      $this->create_file($path,'[]');
    }

    $json_in_file = file_get_contents($path);
    if ($json_in_file === false) {
        // die("error 30");
        return false;
    }

    $json_decode_file = json_decode($json_in_file, true);
    if ($json_decode_file === null) {
      // die("error 31");
      return false;
    }

    $ip_list = $json_decode_file;

    if(in_array($my_ip,$ip_list)){
      // die('You are a liar! (33)');
      return false;
    }

    if($algo == $sign){
      // echo "Ok";
      return true;
    }else{
      //save ip to file black_list.json
      $data[count($json_decode_file)] = $my_ip;
      $this->create_file($path,json_encode($data));
      // END
      // echo "You are a liar! (32)";
      return false;
    }
  }

  private function create_file($file_name='',$content=''){
    $fp = fopen($file_name,"wb");
    fwrite($fp,$content);
    fclose($fp);
  }

  private function get_client_ip(){
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

  private function black_list_ip(){
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

  private function is_ip_black_list(){
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

  private function logout_otp(){
    $curl = curl_init();
    $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
    $headers = array(
      'x_access_token: '.$this->input->cookie('x_access_token', TRUE)
    );
    $url = HOST_API.'api/v3/users_logout?uuid='.$uuid;
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers
    ]);

    $resp = curl_exec($curl);
    curl_close($curl);
  }

}
