<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Webreport extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->M_logger->access();
    $this->load->model('m_login');
    $sess = $this->session->userdata('status');

    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
        $this->data_sess = $this->session->userdata();
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $session = $this->session->userdata();
    $data['chart_bottom'] = $this->M_webreport->chart_bottom($session['username'],$session['store_id']);
    //set UUID
    if(!$this->input->cookie('uuid', TRUE)){
      $this->set_cookie();
    }
    //END
    $this->load->view('v_utama',$data);
  }

  private function set_cookie(){
    $cookie_name = "uuid";
    $cookie_value = $this->generate_uuid();
    setcookie($cookie_name, $cookie_value, time() + (86400*10), "/"); // 86400 = 1 day
  }

  private function generate_uuid(){
    return base64_encode(date('YmdHis').API_SECRET.rand(1000,10000));
  }

  public function get_profile(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyHash = sha1($jsonArray['store_id'] . $jsonArray['uname'] . $T);
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

    $result = $this->M_webreport->get_data_profile($jsonArray);
    echo json_encode($result);
    return;
  }

  public function component(){
      $this->load->view('v_component');
  }

  public function chart_line(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyHash = sha1($jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['day']. $T);
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

    $result = $this->M_webreport->chart_line($jsonArray);
    echo json_encode($result);
    return;
  }

  function cek_login(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $ID       = $jsonArray['id'];
    $PASS     = $jsonArray['pass'];
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyHash = sha1($ID . $PASS . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);


     if($MyHash === $H){
        if($interval < MAX_INTERVAL){
         $query = $this->m_login->isLogin($ID);

         if($query) {
            if($query->WEB_PASS == $jsonArray['pass']){
                $userData = array(
                  'username'       => $query->USER_NAME,
                  'store_id'       => $query->STORE_ID,
                  'msisdn'         => $query->MSISDN,
                  'lvl'            => $query->LVL,
                  'kd_price_plan'  => $query->KODE_PRICE_PLAN,
                  'user_img_name'  => $query->USER_IMG_NAME,
                  'status'         => "login"
                );

                $this->session->set_userdata($userData);

                echo json_encode(array("status"=>"SUKSES","TDate"=>$TDate));
                die();
            }else{
                echo json_encode(array("status"=>"GAGAL","pesan"=>"password salah"));
                die();
            }

         }else {
           echo json_encode(array("status"=>"GAGAL","pesan"=>"ID tidak terdaftar"));
           die();
         }
        }else {
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
          die();
        }
    }
    else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    }

  }


  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url("otentikasi"));
  }



  public function tambah(){
    if($this->input->post('submit')){
      if($this->M_banner->validation("save")){
        $this->M_banner->save();
        redirect('banner');
      }
    }
    $this->load->view('banner/insert_banner');
  }

  public function ubah($rowid){
    if($this->input->post('submit')){
      if($this->M_banner->validation("update")){
        $this->M_banner->edit($rowid);
        redirect('banner');
      }
    }

    $data['banner'] = $this->M_banner->view_by($rowid);
    $this->load->view('banner/form_ubah', $data);
  }

  public function hapus($rowid){
    $this->M_banner->delete($rowid);
    redirect('banner');
  }

  public function updatenomorfavorit(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    // $TDate = strtotime($T);
    $MyHash = sha1($T);
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

    $username = $this->data_sess['username'];
    $store_id = $this->data_sess['store_id'];

    if($jsonArray['list'] !== null){
      $getFavoriteNumber = $this->db->query("SELECT FAV_NUMBER as nomor, name as nama FROM t_fav_number WHERE STORE_ID = ? AND USER_NAME = ? ORDER BY NAME ASC",[
        $store_id,
        $username
      ])->result();

      $count_table = count($getFavoriteNumber);
      $count_local = count($jsonArray['list']);
      if($count_local < $count_table){
        $this->db->query("DELETE FROM t_fav_number WHERE STORE_ID = ? AND USER_NAME = ?",[
          $store_id,
          $username
        ]);
      }
      $result = "";
      foreach($jsonArray['list'] as $row){
        $isExist = $this->db->query("SELECT * FROM t_fav_number WHERE STORE_ID = ? AND USER_NAME = ? AND FAV_NUMBER = ?",[
          $store_id,
          $username,
          $row['nomor']
        ])->row();

        if(!$isExist){
          $result = "INSERT";
          $this->db->query("INSERT INTO t_fav_number (STORE_ID,USER_NAME,FAV_NUMBER,NAME) VALUES(?,?,?,?)",[
            $store_id,
            $username,
            $row['nomor'],
            $row['nama']
          ]);
        }else{
          $result = "UPDATE";
          $this->db->query("UPDATE t_fav_number SET STORE_ID = ?,USER_NAME = ? ,FAV_NUMBER = ?, NAME = ? WHERE STORE_ID = ? AND USER_NAME = ? AND FAV_NUMBER = ?",[
            $store_id,
            $username,
            $row['nomor'],
            $row['nama'],
            $store_id,
            $username,
            $row['nomor']
          ]);
        }
      }
    }else{
      $result = "IMPORT";
    }

    $getFavoriteNumber2 = $this->db->query("SELECT FAV_NUMBER as nomor, name as nama FROM t_fav_number WHERE STORE_ID = ? AND USER_NAME = ? ORDER BY NAME ASC",[
      $store_id,
      $username
    ])->result();

    $list_update = [];
    $i = 0;
    foreach($getFavoriteNumber2 as $row){
      $list_update[$i]['nama'] = $row->NAMA;
      $list_update[$i]['nomor'] = $row->NOMOR;
      $i++;
    }

    echo json_encode(array("status"=>"SUKSES","pesan"=>"","result"=>$jsonArray['list'],"list_update"=>$list_update));
  }

}
