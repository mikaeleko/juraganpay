<?php
Class M_akun extends CI_Model {

  public function validasi(){
    $this->form_validation->set_rules('id', 'Id', 'trim|required|min_height[4]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]|min_height[4]');

    if($this->form_validation->run()){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function get_akun(){
    $sql ="SELECT store_id, user_name, email, full_name, address1, address2, kode_prov, b.name prov, kode_kota, c.name kota,
                kode_kec, d.name kec, kode_kel_des, e.name kel, zip kode_pos, no_id ktp_sim_paspor, npwp,
                nama_wajib_pajak from t_store_user a,
                (select distinct id, name from provinces) b,
                (select distinct id, name, province_id from regencies) c,
                (select distinct id, name, regency_id from districts) d,
                (select distinct id, name, district_id from villages) e
                where b.id (+) = a.kode_prov
                and c.id (+) = a.kode_kota
                and d.id (+) = a.kode_kec
                and e.id (+) = a.kode_kel_des
                and a.store_id = ?
                and a.user_name = ?";
    // return $this->db->query($sql,[  $this->session->userdata('store_id'), $this->session->userdata('username') ])->result();
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  $this->session->userdata('store_id'), $this->session->userdata('username') ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  function update_email($data){
    $sql = "UPDATE T_STORE_USER  SET EMAIL = ?  WHERE STORE_ID = ? AND USER_NAME = ?";
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[
    $data['email'],
    $data['store_id'],
    $data['user_name']
   ]);
   $this->st24apiv1->set_secret(API_SECRET);
   return $this->st24apiv1->run();
  }

  function update_akun($data){
    // $data_input['FULL_NAME'] = $data['nama'];
    // $data_input['ADDRESS1'] = $data['alamat_1'];
    // $data_input['ADDRESS2'] = $data['alamat_2'];
    // $data_input['KODE_PROV'] = $data['propinsi'];
    // $data_input['KODE_KOTA'] = $data['kota'];
    // $data_input['KODE_KEC'] = $data['kecamatan'];
    // $data_input['KODE_KEL_DES'] = $data['kelurahan'];
    // $data_input['ZIP'] = $data['zip'];
    // $data_input['NO_ID'] = $data['ktp'];
    // $data_input['NPWP'] = $data['npwp'];
    // $data_input['NAMA_WAJIB_PAJAK'] = $data['wp'];



    // $this->db->where('STORE_ID',$data['store_id']);
    // $this->db->where('USER_NAME',$data['uname']);
    // $this->db->update('_STORE_USER',$data_input);
    // return $this->db->affected_rows();

     $data_input['STORE_ID'] = $data['store_id'];
     $data_input['USER_NAME'] = $data['uname'];
     $sql = " UPDATE T_STORE_USER
       SET FULL_NAME = ?,
           ADDRESS1 = ?,
           ADDRESS2 = ?,
           KODE_PROV = ?,
           KODE_KOTA = ?,
           KODE_KEC = ?,
           KODE_KEL_DES = ?,
           ZIP = ?,
           NO_ID = ?,
           NPWP = ?,
           NAMA_WAJIB_PAJAK =?,
           EMAIL = ?
     WHERE STORE_ID = ? AND USER_NAME = ?";

     $this->st24apiv1->set_host(HOST_API_INTERNAL);
     $this->st24apiv1->set_query($sql,[
     $data['nama'],
     $data['alamat_1'],
     $data['alamat_2'],
     $data['propinsi'],
     $data['kota'],
     $data['kecamatan'],
     $data['kelurahan'],
     $data['zip'],
     $data['ktp'],
     $data['npwp'],
     $data['wp'],
     $data['email'],
     $data['store_id'],
     $data['uname']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
	}

  function forgot_pass($data){
    //$ubahpass = $this->db->query("UPDATE t_store_user SET web_pass=$data[passbaru2] WHERE STORE_ID='7' AND USER_NAME ='6285716959280'");
    // $data_input['WEB_PASS'] = $data['passnew'];
    // $this->db->where('USER_NAME',$data['idforgot']);
    // $this->db->update('T_STORE_USER',$data_input);
    // return $this->db->affected_rows();
    // $sql = "UPDATE T_STORE_USER SET WEB_PASS = e1(?) WHERE USER_NAME = ?";
    $sql = "UPDATE T_STORE_USER SET WEB_PASS = ? WHERE USER_NAME = ?";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[
      $data['passnew'],$data['idforgot']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
	}

  function ubah_pass($data){
    //$ubahpass = $this->db->query("UPDATE t_store_user SET web_pass=$data[passbaru2] WHERE STORE_ID='7' AND USER_NAME ='6285716959280'");
    // $data_input['WEB_PASS'] = $data['passbaru2'];
    // $this->db->where('STORE_ID',$data['store_id']);
    // $this->db->where('USER_NAME',$data['uname']);
    // $this->db->where('WEB_PASS',$data['passlama']);
    // $this->db->update('T_STORE_USER',$data_input);
    // return $this->db->affected_rows();
    // $sql = " UPDATE T_STORE_USER SET WEB_PASS = e1(?) WHERE STORE_ID = ? AND USER_NAME = ? AND WEB_PASS = e1(?) ";
    $sql = " UPDATE T_STORE_USER SET WEB_PASS = ? WHERE STORE_ID = ? AND USER_NAME = ? AND WEB_PASS = ? ";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[
      $data['passbaru2'], $data['store_id'],  $data['uname'], $data['passlama']
    ]);

    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();

	}

  function get_pin($data) {
    // $sql = "SELECT user_name, d1(pass) as pin FROM t_store_user WHERE store_id = ? AND user_name = ? ";
    $sql = "SELECT user_name, pass as pin FROM t_store_user WHERE store_id = ? AND user_name = ? ";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[$data['store_id'], $data['user_name']]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();

  }


  function get_propinsi(){
      // $sql = $this->db->query("SELECT * FROM provinces");
      // return $sql->result();

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query("SELECT * FROM provinces");
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }

  function get_kota($data){
      $sql =  "SELECT id, name, province_id FROM (SELECT distinct id, name, province_id FROM regencies)
              WHERE province_id = ? ORDER BY name";
      // return $this->db->query($sql,[  $data['id_prop'] ])->result();
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[  $data['id_prop'] ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }

  function get_kecamatan($data){
      $sql =  "SELECT id, name, regency_id FROM (SELECT distinct id, name, regency_id FROM districts)
              WHERE regency_id = ? ORDER BY name  ";
      // return $this->db->query($sql,[ $data['id_kota'] ])->result();
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[ $data['id_kota'] ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
    }

  function get_kelurahan($data){
      $sql = "SELECT id, name, district_id FROM (SELECT distinct id, name, district_id FROM villages)
              WHERE district_id = ? ORDER BY name";
      // return $this->db->query($sql,[  $data['id_kecamatan'] ])->result();
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[  $data['id_kecamatan'] ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }


  function ubah_tiket($data){

    // $data_input['nominal'] = $data['nominal'];
    // $data_input['bank'] = $data['bank'];
    // $this->db->where('STORE_ID',$data['store_id']);
    // $this->db->where('USER_NAME',$data['uname']);
    // $this->db->update('T_STORE_USER',$data_input);

    // return $this->db->affected_rows();
      $sql = "UPDATE T_STORE_USER SET NOMINAL = ?, BANK = ? WHERE STORE_ID = ? AND USER_NAME = ?";
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[ $data['nominal'], $data['bank'],$data['store_id'], $data['uname'] ]);
      $this->st24apiv1->set_secret(API_SECRET);
      return $this->st24apiv1->run();
	}

  function cek_pass($data){
    // $sql = "SELECT * FROM t_store_user WHERE store_id = ? AND user_name = ? AND web_pass = e1(?)";
    $sql = "SELECT * FROM t_store_user WHERE store_id = ? AND user_name = ? AND web_pass = ?";
    // return $this->db->query($sql,[  $data['store_id'], $data['uname'], $data['passold'] ])->result();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  $data['store_id'], $data['uname'], $data['passold'] ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }


}


?>
