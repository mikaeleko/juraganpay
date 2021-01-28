<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_logger extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->is_active        = TRUE;
        $this->request_header   = TRUE;
        $this->request_url      = TRUE;
        $this->request_body     = TRUE;
        $this->prefix_file_name = 'access_';
        $this->extention        = '.log';
        $this->file_name        = date("d-m-Y").$this->extention;
        $this->path             = APPPATH.'logs/';

        $this->checkFile($this->path.$this->prefix_file_name.$this->file_name);
    }

    private function checkFile($path){
        if($this->is_active){
            if(!file_exists($path)){
                $fp = fopen($path,"wb");
                $content = "FILE CREATED"
                .PHP_EOL;
                fwrite($fp,$content);
                fclose($fp);
				chmod($path, 0777);
            }
        }
    }  

    public function d($text){
        if($this->is_active){
            $log  = '['.date("d-m-Y h:i:s").']'.'[DEBUG]'.' > '.$text
            .PHP_EOL;
            file_put_contents($this->path.$this->prefix_file_name.$this->file_name, $log, FILE_APPEND);
        }  
    }

    public function e($text){
        if($this->is_active){
            $log  = '['.date("d-m-Y h:i:s").']'.'[ERROR]'.' > '.$text
            .PHP_EOL;
            file_put_contents($this->path.$this->prefix_file_name.$this->file_name, $log, FILE_APPEND);   
        }  
    }

    public function i($text){
        if($this->is_active){
            $log  = '['.date("d-m-Y h:i:s").']'.'[INFO]'.' > '.$text
            .PHP_EOL;
            file_put_contents($this->path.$this->prefix_file_name.$this->file_name, $log, FILE_APPEND);     
        }
    }

    public function access(){
        if($this->is_active){
            if($this->request_header){
                $headers = apache_request_headers();
                foreach ($headers as $header => $value) {
                    $this->i("$header: $value");
                }
            }
            if($this->request_url){
                $this->i('Client IP: '.$this->get_client_ip());
                $this->i('Method: '.$_SERVER['REQUEST_METHOD']);
                $this->i('URI: '.$_SERVER['REQUEST_URI']);
            }
            if($this->request_body){
                $this->i('Body: '.(
                    file_get_contents('php://input')?file_get_contents('php://input'):(print_r($_POST,true))
                ));
            }   
        }
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
}
?>
