<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Akun extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();

    $this->load->model('m_login');
    $sess = $this->session->userdata('status');
    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $data['propinsi'] = $this->M_akun->get_propinsi();
    $data['akun']     = $this->M_akun->get_akun();
    if($this->input->cookie('st24_print_config')){
      $print_setting = json_decode($this->input->cookie('st24_print_config'));
    }else{
      $print_setting = (object)[
        'outlet_name' => '', 
        'address' => '', 
        'npwp' => '',
        'web' => '',
        'facebook' => '',
        'instagram' => '',
        'twitter' => '',
        'phone_number' => '',
        'image' => '',
        'notes' => '',
        'title' => '',
        'footer' => '',
        'font_size' => '',
        'paper_size' => ''
      ];
    }
    $data['print_setting'] = $print_setting;
    $this->load->view('v_akun', $data);
  }

  public function topup(){
    $data['propinsi'] = $this->M_akun->get_propinsi();
    $data['akun']     = $this->M_akun->get_akun();
    $this->load->view('v_topup', $data);
  }

  public function get_tiket(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $nominal   = $jsonArray['nominal'];
    $store_id  = $jsonArray['store_id'];
    $user_name = $jsonArray['user_name'];
    $bank      = $jsonArray['bank'];
    $msisdn    = $jsonArray['msisdn'];
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];
    $MyHash    = sha1($jsonArray['bank'] . $jsonArray['nominal'] . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
     } else {

      $getPin = $this->M_akun->get_pin($jsonArray);

      if($getPin !=""){

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => HOST_API.'send_sm_plain?msisdn='.$jsonArray['msisdn'].'&Text=TIKET'.'.'.$jsonArray['bank'].'.' .$jsonArray['nominal']. '.' .$getPin->PIN.'&xmlin_id=W'
        ]);
        $resp = json_decode(curl_exec($curl));

        curl_close($curl);

        echo json_encode($resp,true);

      } else {
        echo "GAGAL";
      }

    }
  }

  public function get_kota(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $id_propinsi   = $jsonArray['id_prop'];

    $affect = $this->M_akun->get_kota($jsonArray);
    if($affect > 0){
      $response['affect'] = $affect;
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Kota Berhasil Diload";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "Gagal Load Kota";
    }
    echo json_encode($response);
    die();
  }

  public function get_kecamatan(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $id_kota   = $jsonArray['id_kota'];

    $affect = $this->M_akun->get_kecamatan($jsonArray);
    if($affect > 0){
      $response['affect'] = $affect;
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Kecamatan Berhasil Diload";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "Gagal Load Kota";
    }
    echo json_encode($response);
    die();
  }

  public function get_kelurahan(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $id_kecamatan   = $jsonArray['id_kecamatan'];

    $affect = $this->M_akun->get_kelurahan($jsonArray);
    if($affect > 0){
      $response['affect'] = $affect;
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Kelurahan Berhasil Diload";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "Gagal Load Kelurahan";
    }
    echo json_encode($response);
    die();
  }


  function ubah_pass(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $PASS        = $jsonArray['passlama'];
    $PASS1       = $jsonArray['passbaru'];
    $PASS2       = $jsonArray['passbaru2'];
    $UNAME       = $jsonArray['uname'];
    $STOREID     = $jsonArray['store_id'];
    $T           = $jsonArray['tt'];
    $H           = $jsonArray['hh'];
    $MyHash      = sha1($PASS1 . $PASS2 . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
      die();
    }

    $affect = $this->M_akun->ubah_pass($jsonArray);
    if($affect > 0){
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Password Berhasil Diubah";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "GAGAL, Password Lama Anda Tidak sesuai";
    }
    echo json_encode($response);
    die();
  }



  function update_akun(){
    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $nama       = $jsonArray['nama'];
    $alamat_1   = $jsonArray['alamat_1'];
    $alamat_2   = $jsonArray['alamat_2'];
    $propinsi   = $jsonArray['propinsi'];
    $kota       = $jsonArray['kota'];
    $kecamatan  = $jsonArray['kecamatan'];
    $kelurahan  = $jsonArray['kelurahan'];
    $zip        = $jsonArray['zip'];
    $ktp        = $jsonArray['ktp'];
    $npwp       = $jsonArray['npwp'];
    $wp         = $jsonArray['wp'];
    $email      = $jsonArray['email'];
    $uname      = $jsonArray['uname'];
    $store_id   = $jsonArray['store_id'];
    $TIME       = $jsonArray['time'];
    $HASH       = $jsonArray['hash'];

    $MyHash = sha1($nama . $alamat_1 .$alamat_2 . $propinsi . $kota . $kecamatan . $kelurahan . $zip . $ktp . $npwp . $wp .$email .$TIME);

    if($MyHash != $HASH){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
      die();
    }

    $affect = $this->M_akun->update_akun($jsonArray);
    if($affect > 0){
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Akun Berhasil Diubah";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "Gagal Ubah Akun";
    }
    echo json_encode($response);
    die();
  }


 }
