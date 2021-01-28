<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ubahpass extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
  }

  function index(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $PASS        = $jsonArray['passlama'];
    $PASS1       = $jsonArray['passbaru'];
    $PASS2       = $jsonArray['passbaru2'];
    $UNAME       = $jsonArray['uname'];
    $STOREID     = $jsonArray['store_id'];
    $T           = $jsonArray['tt'];
    $H           = $jsonArray['hh'];

    $MyHash = sha1($PASS1 . $PASS2 . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
      die();
    }

    $affect = $this->M_akun->ubah_pass($jsonArray);
    if($affect > 0){
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Password data berhasil diubah";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "GAGAL, Password lama tidak sesuai";
    }
    echo json_encode($response);
    die();
  }

  

 }
