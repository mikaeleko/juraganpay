<?php
Class M_login extends CI_Model {

  public function validasi(){
    $this->form_validation->set_rules('id', 'Id', 'trim|required|min_height[4]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]|min_height[4]');

    if($this->form_validation->run()){ //jika validasi benar
      return TRUE; //maka kembalikan hasilnya dengan TRUE
    }else{
      return FALSE; //maka kembalikan hasilnya dengan FALSE
    }
  }

  public function isLogin($ID) {
    //NVL(a.is_active,0) is_active, a.web_pass_expdate, d1(web_pass) web_pass,
    $sql = " SELECT a.user_name, a.full_name, a.store_id,  pass, a.lvl, upper(b.msisdn) msisdn,
              NVL(a.is_active,0) is_active, a.web_pass_expdate, web_pass,
              a.kode_price_plan,
              a.user_img_name
              FROM t_store_user a, t_store_user_msisdn b
              WHERE a.store_id = b.store_id
              AND a.user_name = b.user_name
              AND nvl(b.is_active, 0) = 1
              AND upper(b.msisdn) = ?";

    // return $this->db->query($sql)->row();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[$ID]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }

  public function getExp($ID) {
    $sql = " SELECT to_char(a.web_pass_expDate,'yyyymmddhh24miss') web_pass_expdate FROM t_store_user a, t_store_user_msisdn b
             WHERE a.store_id = b.store_id AND a.user_name = b.user_name AND b.msisdn = '$ID'";
    // return $this->db->query($sql)->row();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }

  function is_ip_black_list(){
    return $this->st24apiv1->is_ip_black_list();
  }

}


?>
