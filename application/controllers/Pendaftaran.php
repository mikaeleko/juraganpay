<?php
require_once(APPPATH.'libraries/securimage/securimage.php');
class Pendaftaran extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->M_logger->access();
    $this->securimage = new Securimage();
  }

  public function index(){
    $data['idstore'] = $this->M_pendaftaran->get_storeid();
    $data['propinsi'] = $this->M_pendaftaran->get_propinsi();
    $this->load->view("webreport_pendaftaran", $data);
  }

  function securimage(){
    $img = new Securimage();
    $img->show();
  }

  function setSecurimageOptions(){
      $this->securimage->image_width = 190;
       $this->securimage->image_height = 60;
       $this->securimage->image_bg_color = new Securimage_Color(227, 218, 237);
       $this->securimage->line_color = new Securimage_Color(51, 51, 51);
       $this->securimage->num_lines = 5;

       $this->securimage->use_multi_text = true;
       $this->securimage->multi_text_color = array(
            new Securimage_Color(184, 4, 50),
            new Securimage_Color(12, 67, 157),
            new Securimage_Color(244, 49, 11)
       );
       $this->securimage->text_color = new Securimage_Color(184, 4, 50);
  }

  public function displayCaptchaPicture() {
       $this->securimage = new Securimage();
       $this->setSecurimageOptions();
       $this->securimage->show();
  }

  public function get_kota(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $id_propinsi   = $jsonArray['id_prop'];

    $affect = $this->M_pendaftaran->get_kota($jsonArray);
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

    $affect = $this->M_pendaftaran->get_kecamatan($jsonArray);
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

    $affect = $this->M_pendaftaran->get_kelurahan($jsonArray);
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


  function daftar(){
    $img = new Securimage();

    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $nama       = $jsonArray['nama'];
    $address1   = $jsonArray['address1'];
    $address2   = $jsonArray['address2'];
    $kd_prov    = $jsonArray['kd_prov'];
    $kd_kota    = $jsonArray['kd_kota'];
    $kd_kec     = $jsonArray['kd_kec'];
    $kd_kel     = $jsonArray['kd_kel'];
    $zip        = $jsonArray['zip'];
    $owner      = $jsonArray['owner'];
    $msisdn     = $jsonArray['msisdn'];
    $nm_wp      = $jsonArray['nm_wp'];
    $password   = $jsonArray['password'];
    $pin        = $jsonArray['pin'];
    $pin2        = $jsonArray['pin2'];
    $npwp       = $jsonArray['npwp'];
    $jabber1        = $jsonArray['jabber1'];
    $jabber2        = $jsonArray['jabber2'];
    $ips1        = $jsonArray['ips1'];
    $ips2        = $jsonArray['ips2'];
    $ips3        = $jsonArray['ips3'];
    $rurl1      = $jsonArray['rurl1'];
    $rurl2      = $jsonArray['rurl2'];
    $rurl3      = $jsonArray['rurl3'];
    $capcode      = $jsonArray['capcode'];
    $TIME       = $jsonArray['t'];
    $HASH       = $jsonArray['hash'];


    $MyHash = sha1($nama . $owner . $msisdn . $npwp . $nm_wp . $password . $pin . $TIME);

    if($MyHash != $HASH){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation","param"=>$jsonArray));
      die();
    }
    // print_r($MyHash);
    // die();

  if($this->securimage->check($jsonArray['capcode']) == true){
      $store           = $this->M_pendaftaran->get_storeid();
      $parent_username = $this->M_pendaftaran->get_username($store->STOREID);
      $kode_price_plan = $this->M_pendaftaran->get_kode_price_plan($store->STOREID,$parent_username->USER_NAME);
      $code            = random_string('numeric', 4);

      $jsonArray['store_id'] = $store->STOREID;
      $jsonArray['parent_username'] = $parent_username->USER_NAME;
      $jsonArray['kode_price_plan'] = $kode_price_plan->KODE_PRICE_PLAN;
      $jsonArray['act_code']   = $code;

      $cek = $this->M_pendaftaran->cek_msisdn($jsonArray);

      if($cek) {
        echo json_encode(array("status"=>"MSISDN","pesan"=>"Nomor MSISDN sudah terdaftar!", "param"=>$jsonArray));
        die();
      } else {
        $this->M_pendaftaran->insert_t_store_user($jsonArray);
        $this->M_pendaftaran->insert_t_store_user_msisdn($jsonArray);
        $affect = $this->M_pendaftaran->reg_act_code($jsonArray);
        // var_dump($affect);
        // die();

        if($affect){
          $api_url = HOST_SEND_MSG.'?PhoneNumber='.$msisdn.'&Text='.urlencode('Kode aktivasi anda adalah:'.' '.$code);
          $ch = curl_init($api_url);
          curl_setopt($ch, CURLOPT_HEADER, true);
          curl_setopt($ch, CURLOPT_NOBODY, true);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
          curl_setopt($ch, CURLOPT_TIMEOUT,10);
          $output = curl_exec($ch);
          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);

          $data['api'] = $httpcode.' : '.$api_url;
          $data['affect'] = $affect;
          $data['status'] = 'SUKSES';
          $data['pesan'] = "Data Berhasil Disimpan & Akun Sudah Aktif";
        } else {
          $data['status'] = 'GAGAL';
          $data['pesan'] = "Gagal Input Aktifasi Kode";
        }
        echo json_encode(array("status"=>"SUKSES","pesan"=>$data['pesan'], "api"=>$data['api'], "stid"=>$jsonArray['store_id'], "msisdn"=>$jsonArray['msisdn'], "param"=>$jsonArray));
        die();
      }
  } else {
    echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"KODE CAPTCHA Salah","param"=>$jsonArray));
    die();
  }

}

  function aktifasi(){
    $jsonArray    = json_decode(file_get_contents('php://input'),true);
    $kode         = $jsonArray['kode'];
    $stid         = $jsonArray['stid'];
    $uname_msisdn = $jsonArray['uname_msisdn'];
    $TIME       = $jsonArray['t'];
    $HASH       = $jsonArray['h'];
    $now      = date('YmdHis', strtotime($TIME));

    $MyHash = sha1($kode . $TIME);
    if($MyHash != $HASH){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation","param"=>$jsonArray));
      die();
    }

    $cek_kode = $this->M_pendaftaran->cek_kode($jsonArray);
    //cek kesamaan kode
    if($cek_kode){

      $expkode = $this->M_pendaftaran->cekExpKode($jsonArray);
      //cek expired kode
      if($now < $expkode->REG_ACT_CODE_EXP_DATE){
        $data['stid'] = $stid;
        $data['msisdn'] = $uname_msisdn;
        $data['kode'] = $kode;

        $aktifasi = $this->M_pendaftaran->aktifasi($data);

        if($aktifasi > 0) {
          echo json_encode(array("status"=>"SUKSES","pesan"=>"Selamat, Akun Anda Telah Aktif","param"=>$jsonArray));
          die();

        } else {

          echo json_encode(array("status"=>"GAGAL","pesan"=>"Gagal Aktifasi","param"=>$jsonArray));
          die();
        }

      } else {

        echo json_encode(array("status"=>"EXPIRED","pesan"=>"Kode Aktifasi Anda Expired, Silahkan Kirim Ulang Kode Aktifasi!","param"=>$jsonArray));
        die();
      }

    } else {
      echo json_encode(array("status"=>"SALAH","pesan"=>"Kode Aktifasi Yang Anda Masukan Salah, Cek Kembali Inbox Anda!","param"=>$jsonArray));
      die();
    }
  }

  public function resendcode(){
    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $msisdn     = $jsonArray['msisdn'];
    $stid       = $jsonArray['stid'];
    $TIME       = $jsonArray['t'];
    $HASH       = $jsonArray['h'];
    $code       = random_string('numeric', 4);

    $MyHash = sha1($msisdn . $stid . $TIME);
    if($MyHash != $HASH){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation","param"=>$jsonArray));
      die();
    } else {
      $paramResend['msisdn'] = $msisdn;
      $paramResend['stid'] = $stid;
      $paramResend['code']   = $code;
    }

    $affect = $this->M_pendaftaran->resendcode($paramResend);

     if($affect){
       $api_url = HOST_SEND_MSG.'?PhoneNumber='.$msisdn.'&Text='.urlencode('Kode Aktifasi Anda Yang Baru adalah:'.' '.$code);
       $ch = curl_init($api_url);
       curl_setopt($ch, CURLOPT_HEADER, true);
       curl_setopt($ch, CURLOPT_NOBODY, true);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       curl_setopt($ch, CURLOPT_TIMEOUT,10);
       $output = curl_exec($ch);
       $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
       curl_close($ch);

       echo json_encode(array("status"=>"BERHASIL","pesan"=>"Kode Aktifasi Anda Telah Diperbaharui dan dikirim ulang!","param"=>$jsonArray));
       die();

     }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"Gagal Kirim Ulang Kode Aktifasi","param"=>$jsonArray));
       die();
     }


  }



}
