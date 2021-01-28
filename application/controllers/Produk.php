<?php
class Produk extends CI_Controller {
  function __construct(){
    parent::__construct(); 
    $this->M_logger->access();
  }
  public function index(){
    $this->load->view("webreport_produk");
  }

  public function getProduk(){
    $result = $this->M_produk->getProduk();

    $is_connect = (isset($result->success))?false:true;

    if(!$is_connect){
      //koneksi ke api gagal
      echo json_encode(array("status"=>"KONEKSI", "pesan"=>"Koneksi Ke Server Gagal"));
      die();

    } else {
      echo json_encode($result);
    }
  }

  public function getJenisProduk(){
    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $kode_provider        = $jsonArray['oper'];
    $getTitleProduk       = $this->M_produk->getTitleProduk($kode_provider);
    foreach ($getTitleProduk as $key) {
      $affect = $this->M_produk->getJenisProduk($kode_provider,$key->OPR_NAME);
      $key->list_produk = $affect;
    }

    $response['status'] = 'SUKSES';
    $response['pesan'] = "Berhasil";
    $response['affect'] = $getTitleProduk;
    echo json_encode($response);
    die();
    // $result = $this->M_produk->getJenisProduk();
    // echo json_encode($result);
  }

}
