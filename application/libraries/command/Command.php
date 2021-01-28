<?php
	include("WhiteList.php");
	//header('Content-Type:text/plain');
	// Function to get the client IP address
	class Command {
		public function get_client_ip() {
			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
			else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
			else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
			else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
		}

		public function terminal($command)
		{
			$white_list = new WhiteList();
			if(!in_array($this->get_client_ip(), $white_list->get_ip_white_list())){
				//echo $this->get_client_ip().'<br>';
				//echo "<pre>Access Denied!</pre>";
				return "Access Denied!";
				// return;
			}
			$command_tmp = $command;
			$comman_white_list = $white_list->get_command_white_list();
			$command = explode(" ",strtoupper($command))[0];
			//if (!preg_match("/\b$command\b/", $comman_white_list)) {
				// echo "<pre> The <b>$command_tmp</b> command is not permitted.</pre>";
				//return "The $command_tmp command is not permitted.";
				// return;
			//}
			$output = shell_exec($command_tmp);
			//echo "<pre>$output</pre>";
			return $output;
		}

	}
?>
