<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Belanja extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->M_logger->access();
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

    $category = $this->input->get('category');
    $category =  $category == ''?'pulsa':$category;

    $is_login_belanja = $this->is_login_belanja();

    if($is_login_belanja->RC == '00'){
      //perangkat sudah login
      if($category == 'pulsa' || $category == 'paketdata'){
        $data['title'] = $category == 'pulsa'?'Pengisian Pulsa':'Pembelian Paket Internet';
        return $this->load->view('v_belanja_prefix',$data);
      } elseif ($category == 'pembayaran') {
        $data['title'] = 'Pembayaran Tagihan - PPOB';
        return $this->load->view('v_belanja_tagihan',$data);
      } elseif ($category == 'token') {
        $data['title'] = 'Pembelian Token PLN';
        return $this->load->view('v_belanja_token_listrik',$data);
      } elseif ($category == 'pesawat') {
        $data['title'] = 'Pembelian Tiket Pesawat';
        return $this->load->view('v_belanja_tiket_pesawat',$data);
      } elseif ($category == 'kereta') {
        $data['title'] = 'Pembelian Tiket Kereta';
        return $this->load->view('v_belanja_tiket_kereta',$data);
      } else {
        if($category=="emoney"){
          $data['title'] = 'TOPUP EMONEY';
        } else {
          $a = substr($category,0,5);
          $b = substr($category,5);
          $c = ucwords($a." ".$b);
          $data['title'] = 'Pembelian '.str_replace('_',' ',$c);
        }
        return $this->load->view('v_belanja_non_prefix',$data);
      }
    } else {
      //perangkat belum login
      return $this->load->view('v_otp');
    }
  }

  public function cek_price(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $T        = $jsonArray['t'];
        $H        = $jsonArray['h'];

        $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
        $MyHash = sha1($this->session->userdata('username') . $T);
        $MyTime = strtotime(date("Y/m/d H:i:s"));

        if($MyHash === $H){
          $cek_price = $this->M_belanja->cekoutlet($jsonArray);

          if($cek_price){
            $hargaJual = $cek_price[0]->PRICE;
            echo json_encode(array("status"=>"OK","pesan"=>"Harga Ada Pada Outlet","hargajual"=>$hargaJual));
            die();
          } else {
            echo json_encode(array("status"=>"","pesan"=>"Bukan Harga Outlet"));
            die();
          }

        } else {
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
          die();
        }

  }


  public function tiketpesawat(){
    redirect("handle/underconstruction");
    //$this->load->view('v_belanja_emoney');
  }

  public function tiketkereta(){
    redirect("handle/underconstruction");
    //$this->load->view('v_belanja_emoney');
  }

  public function nomorfavorit(){
    // redirect("handle/underconstruction");
    $this->load->view('v_belanja_no_favorit');
  }


  public function cariicon(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['uname'] . $jsonArray['store_id'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_icon = $this->M_belanja->view_icon($jsonArray);
    echo json_encode($result_icon);
    die();
  }


  public function carioperator(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['prefix'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['hashtag'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }
    $result_parent = $this->M_belanja->cariprodukbyprefix($jsonArray);

    echo json_encode($result_parent);
    die();
  }

  public function cariprodukhashtag(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $T        = $jsonArray['t'];
        $H        = $jsonArray['h'];

       $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
       $MyHash = sha1($jsonArray['hashtag']. $jsonArray['username'] . $jsonArray['store_id'] . $jsonArray['kode_price_plan'] . $jsonArray['kode_provider'] . $T);
       $MyTime = strtotime(date("Y/m/d H:i:s"));
       $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_parent = $this->M_belanja->cari_produk_by_hashtag($jsonArray);
    echo json_encode($result_parent);
    die();
  }

  public function cariprodukpaketdata(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['prefix'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['hashtag'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }
    $result_produk = $this->M_belanja->cariprodukpaketdatabyprefix($jsonArray);


    echo json_encode($result_produk);
    die();
  }



  public function cariprodukemoney(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

     $MyHash = sha1($jsonArray['hashtag'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_parent = $this->M_belanja->view_emoney($jsonArray);
    echo json_encode($result_parent);
    die();
  }


  public function detailproduknonprefix(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['kdProv'] . $jsonArray['hashtag']. $jsonArray['uname'] . $jsonArray['store_id'] . $T );
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);


    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_parent = $this->M_belanja->view_detail_emoney($jsonArray);
    echo json_encode($result_parent);
    die();
  }



  public function cariproduktoken(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

     $MyHash = sha1($jsonArray['hashtag'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_parent = $this->M_belanja->view_emoney($jsonArray);
    echo json_encode($result_parent);
    die();
  }




  public function detailproduktoken(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $TDate = strtotime($T);
     $MyHash = sha1($jsonArray['kdProv'] . $jsonArray['hashtag']. $jsonArray['uname'] . $jsonArray['store_id'] . $T );
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
        if($interval > MAX_INTERVAL){
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
          die();
        }
    } else {
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Hashing Failed","param"=>$jsonArray, "MyHash"=>$MyHash, "H"=>$H));
        die();
    }

    $result_parent = $this->M_belanja->view_detail_token($jsonArray);
    echo json_encode($result_parent);
    die();
  }

  public function kategoriprodukhashtag(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['hashtag'] . $jsonArray['kode_price_plan'] . $T);
     $MyTime = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

    $result_parent = $this->M_belanja->kategori_produk_by_hashtag($jsonArray['hashtag'],$jsonArray['kode_price_plan']);
    echo json_encode($result_parent);
    die();
  }


  private function is_login_belanja(){
    $curl = curl_init();
    $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
    $headers = array(
      'signatureapps: '.hash('sha256',$uuid)
    );
    $url = HOST_API.'api/v3/users_is_login?uuid='.$uuid.'&msisdn='.$this->session->userdata('msisdn');
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers
    ]);
    $resp = curl_exec($curl);
    if($resp){
      $resp_obj = json_decode($resp);
      curl_close($curl);
      return $resp_obj;
    }else{
      return (object)[
        'RC'=>'-1',
        'msg'=>'Koneksi gagal'
      ];
    }
  }


  public function request_otp(){
      $jsonArray = json_decode(file_get_contents('php://input'),true);
      $T        = $jsonArray['t'];
      $H        = $jsonArray['h'];
      $MyHash   = sha1($this->session->userdata('username') . $T);

      if($MyHash === $H){
            $curl = curl_init();
            $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
            $headers = array(
              'signatureapps: '.hash('sha256',$uuid)
            );
            $url = HOST_API.'api/v3/users_login_via_otp?uuid='.$uuid.'&msisdn='.$this->session->userdata('msisdn');
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => $headers
            ]);

            $resp = curl_exec($curl);

            if($resp){
              $resp_obj = json_decode($resp);
              curl_close($curl);
              echo $resp;
            } else {
              echo json_encode(
                [
                  'RC'=>'-1',
                  'msg'=>'Koneksi gagal'
                ]);
            }

      } else {
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }

  }


  public function submit_otp(){
      $jsonArray = json_decode(file_get_contents('php://input'),true);
      $T        = $jsonArray['t'];
      $H        = $jsonArray['h'];
      $otpcode  = $jsonArray['otp'];
      $MyHash   = sha1($this->session->userdata('username') . $T . $otpcode);

      if($MyHash === $H){
            $curl = curl_init();
            $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
            $headers = array(
              'signatureapps: '.hash('sha256',$uuid)
            );
            $url = HOST_API.'api/v3/users_login_via_otp_submit_code?uuid='.$uuid.'&msisdn='.$this->session->userdata('msisdn').'&mobile_reset_code='.$otpcode.'&xmlin_id=W';

            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => $headers
            ]);

            $resp = curl_exec($curl);

            if($resp){
              $resp_obj = json_decode($resp);
              if($resp_obj->RC == "00"){
                $this->set_cookie($resp_obj->x_access_token);
              }
              curl_close($curl);
              echo $resp;
            } else {
              echo json_encode(
                [
                  'RC'=>'-1',
                  'msg'=>'Koneksi gagal'
                ]);
            }

      } else {
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        die();
      }

  }

  public function logout_otp(){
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

    if($resp){
      $resp_obj = json_decode($resp);

      curl_close($curl);

    } else {
      // echo json_encode(
      //   [
      //     'RC'=>'-1',
      //     'msg'=>'Koneksi gagal'
      //   ]);
    }

    redirect('belanja');
  }

  public function page_otp(){
    return $this->load->view('v_otp');
  }

  private function set_cookie($x_access_token){
    $cookie_name = "x_access_token";
    setcookie($cookie_name, $x_access_token, time() + (86400*10), "/"); // 86400 = 1 day
  }

}
