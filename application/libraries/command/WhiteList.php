<?php

    class WhiteList{
        //tambahkan ip white list baru seperti ini  ['192.168.100.26','ip baru']
        private $ip_white_list = ['192.168.100.101','::1','202.56.170.234'];
        //tambahkan command white list baru seperti ini  ['dir','command/perintah baru']
        private $command_whitelist = ['ejabberdctl'];

        public function get_ip_white_list(){
            return $this->ip_white_list;
        }

        public function get_command_white_list(){
            $text = "";
            $i=0;
            foreach($this->command_whitelist as $value){
                $this->command_whitelist[$i] = strtoupper($value);
                $i++;
            }
            $text = implode(" ",$this->command_whitelist);
            return $text;
        }
    }

?>
