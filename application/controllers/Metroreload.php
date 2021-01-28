<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Metroreload extends CI_Controller {

  function __construct(){
    parent::__construct(); 
    $this->M_logger->access();
  }

  public function index(){
    $this->load->view('dashboard');
  }


  public function get_profile(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    // $TDate = strtotime($T);
    $MyHash = sha1($jsonArray['store_id'] . $jsonArray['uname'] . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    }

    $result = $this->M_webreport->get_data_profile($jsonArray);
    echo json_encode($result);
    return;
  }

  public function component(){
      $this->load->view('webreport_component');
  }

  public function chart_line(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    // $TDate = strtotime($T);
    $MyHash = sha1($jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['day']. $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
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
    // $TDate = strtotime($T);
    $MyHash = sha1($ID . $PASS . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);


     // echo json_encode(array("status"=>"TESTING","INTERVAL"=>$interval,"TDate"=>$TDate,"param"=>$jsonArray));
     // die();

     if($MyHash === $H){
        if($interval < MAX_INTERVAL){
         $query = $this->m_login->isLogin($ID);

        // print_r($query );
        //echo json_encode($query);
        //die();

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
                //set session untuk user
                $this->session->set_userdata($userData);
                //return TRUE;
                //redirect(base_url("banner/index"));
                echo json_encode(array("status"=>"SUKSES","TDate"=>$TDate,"param"=>$userData));
                die();
            }else{
                echo json_encode(array("status"=>"GAGAL","pesan"=>"password salah","param"=>$jsonArray));
                die();
            }

         }else {
           echo json_encode(array("status"=>"GAGAL","pesan"=>"ID tidak terdaftar","param"=>$jsonArray));
           die();
         }
        }else {
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
          die();
        }
    }
    else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    }

  }


  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url("login"));
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
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
        die();
      }
    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
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
        // echo json_encode($isExist); die();
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
