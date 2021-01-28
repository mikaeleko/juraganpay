<?php
Class M_pendaftaran extends CI_Model {

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
    $sql ="SELECT store_id, user_name, full_name, address1, address2, kode_prov, b.name prov, kode_kota, c.name kota,
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
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  $this->session->userdata('store_id'), $this->session->userdata('username') ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  function daftar($data){
    // $data_input['nama'] = $data['nama'];
    // $data_input['alamat1']  = $data['alamat1'];
    // $data_input['alamat2']  = $data['alamat2'];
    // $data_input['porpinsi'] = $data['propinsi'];
    // $data_input['kota'] = $data['kota'];
    // $data_input['kecamatan']  = $data['kecamatan'];
    // $data_input['kelurahan'] = $data['kelurahan'];
    // $data_input['zip']   = $data['zip'];
    // $data_input['owner'] = $data['owner'];
    // $data_input['msisdn'] = $data['msisdn'];
    // $data_input['npwp']  = $data['npwp'];
    // $data_input['nm_wp'] = $data['nm_wp'];
    // $data_input['jabber1']  = $data['jabber1'];
    // $data_input['jabber2']  = $data['jabber2'];
    // $data_input['ips1']  = $data['ip1'];
    // $data_input['ips2']  = $data['ip2'];
    // $data_input['ips3']  = $data['ip3'];
    // $data_input['rurl1']  = $data['rurl1'];
    // $data_input['rurl2']  = $data['rurl2'];
    // $data_input['rurl3']  = $data['rurl3'];
    // $this->db->insert('T_STORE_USER',$data_input);
  // return $this->db->affected_rows();
    $sql = "
    INSERT INTO T_STORE_USER (nama,alamat1,alamat2,porpinsi,kota,kecamatan,kelurahan,zip,owner,msisdn,npwp,nm_wp,jabber1,jabber2,ips1,ips2,ips3,rurl1,rurl2,rurl3) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
    ";
    
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,
    [
      $data['nama'],
      $data['alamat1'],
      $data['alamat2'],
      $data['propinsi'],
      $data['kota'],
      $data['kecamatan'],
      $data['kelurahan'],
      $data['zip'],
      $data['owner'],
      $data['msisdn'],
      $data['npwp'],
      $data['nm_wp'],
      $data['jabber1'],
      $data['jabber2'],
      $data['ip1'],
      $data['ip2'],
      $data['ip3'],
      $data['rurl1'],
      $data['rurl2'],
      $data['rurl3']
    ] );
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
	}


  function get_storeid(){
    $sql = "SELECT min(store_id) as storeid from t_store ";
    // return $this->db->query($query)->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }


  function get_username($storeid){
    $sql = "SELECT user_name from t_store_user where store_id = $storeid and lvl = 1 ";
    // return $this->db->query($query)->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }


  function get_kode_price_plan($storeid,$username){
    $sql = "SELECT kode_price_plan from t_store_user where store_id = ? and user_name = ?";
    // return $this->db->query($query,[$storeid,$username])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$storeid,$username]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }


  function insert_t_store_user($data){
    $sql = "INSERT INTO T_STORE_USER (STORE_ID, FULL_NAME, ADDRESS1, ADDRESS2,
              KODE_PROV, KODE_KOTA, KODE_KEC, KODE_KEL_DES, ZIP, PEMILIK, USER_NAME,  NPWP,
              NAMA_WAJIB_PAJAK, WEB_PASS, PASS, KODE_PRICE_PLAN, IP_ADDR, IP_ADDR2, IP_ADDR3,
              REVERSE_URL, REVERSE_URL2, REVERSE_URL3, PARENT_USER_NAME, LVL, JOINING_DATE, WEB_PASS_EXPDATE)
              values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 4 ,sysdate, TO_DATE('01/01/2200 03:18:20','dd/mm/yyyy hh24:mi:ss'))";

    // return $this->db->query($query,[$data['store_id'],
    //                                 $data['nama'],
    //                                 $data['address1'],
    //                                 $data['address2'],
    //                                 $data['kd_prov'],
    //                                 $data['kd_kota'],
    //                                 $data['kd_kec'],
    //                                 $data['kd_kel'],
    //                                 $data['zip'],
    //                                 $data['owner'],
    //                                 $data['msisdn'],
    //                                 $data['npwp'],
    //                                 $data['nm_wp'],
    //                                 $data['password'],
    //                                 $data['pin'],
    //                                 $data['kode_price_plan'],
    //                                 $data['ips1'],
    //                                 $data['ips2'],
    //                                 $data['ips3'],
    //                                 $data['rurl1'],
    //                                 $data['rurl2'],
    //                                 $data['rurl3'],
    //                                 $data['parent_username']
    //                               ]);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[
      $data['store_id'],
      $data['nama'],
      $data['address1'],
      $data['address2'],
      $data['kd_prov'],
      $data['kd_kota'],
      $data['kd_kec'],
      $data['kd_kel'],
      $data['zip'],
      $data['owner'],
      $data['msisdn'],
      $data['npwp'],
      $data['nm_wp'],
      $data['password'],
      $data['pin'],
      $data['kode_price_plan'],
      $data['ips1'],
      $data['ips2'],
      $data['ips3'],
      $data['rurl1'],
      $data['rurl2'],
      $data['rurl3'],
      $data['parent_username']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }

  function cek_msisdn($msisdn){
    $sql = "SELECT * from t_store_user_msisdn where msisdn = ?";
    // return $this->db->query($query,[$msisdn['msisdn']])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$msisdn['msisdn']]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();

  }


  function insert_t_store_user_msisdn($data){
    $sql = "INSERT into t_store_user_msisdn (store_id, user_name,  msisdn, add_action_by, is_active,
              is_master, add_date) values(?, ?, ?, 'web',1, 1, sysdate)";

    // return $this->db->query($query,[$data['store_id'],
    //                               $data['msisdn'],
    //                               $data['msisdn'],
    //                               ]);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$data['store_id'],
    $data['msisdn'],
    $data['msisdn'],
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }


  function get_pin($data){
    $sql = "SELECT pass as pin FROM t_store_user WHERE store_id = ? AND user_name = ?";
    // return $this->db->query($query, [$data['store_id'], $data['user_name']])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$data['store_id'], $data['user_name']]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }


  function get_propinsi(){
      // $query = $this->db->query("SELECT * FROM provinces");
      // return $query->result();
      $sql = "SELECT * FROM provinces";
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }


  function get_kota($data){
      $sql =  "SELECT id, name, province_id FROM (SELECT distinct id, name, province_id FROM regencies)
              WHERE province_id = ? ORDER BY name ";
      // return $this->db->query($sql,[  $data['id_prop'] ])->result();
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[  $data['id_prop'] ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }


  function get_kecamatan($data){
      $sql =  "SELECT id, name, regency_id FROM (SELECT distinct id, name, regency_id FROM districts)
              WHERE regency_id = ? ORDER BY name ";
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


    $sql = "UPDATE T_STORE_USER SET nominal = ?, bank = ? WHERE store_id = ? AND user_name = ?";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[
      $data['nominal'],$data['bank'],$data['store_id'],$data['uname']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
	}

  function resendcode($data){
    $sql = "UPDATE t_store_user set reg_act_code = ?, reg_act_code_exp_date = sysdate + 30/24/60 where user_name = ? and store_id = ?";
    // return $this->db->query($sql,[  $data['code'],
    //                                 $data['msisdn'],
    //                                 $data['stid']
    //                               ]);

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  
      $data['code'],
      $data['msisdn'],
      $data['stid']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }

  function reg_act_code($data){
    $sql = "UPDATE t_store_user set reg_act_code = ?, reg_act_code_exp_date = sysdate + 30/24/60 where user_name = ? and store_id = ?";
    // return $this->db->query($sql,[  $data['act_code'],
    //                                 $data['msisdn'],
    //                                 $data['store_id']
    //                              ]);

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  
        $data['act_code'],
        $data['msisdn'],
        $data['store_id']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }

  function cek_kode($data){
    $sql = "SELECT * from t_store_user where reg_act_code=?";
    // return $this->db->query($sql, [$data['kode']])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$data['kode']]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }

  public function cekExpKode($data) {
    $sql = "SELECT to_char(REG_ACT_CODE_EXP_DATE,'yyyymmddhh24miss') REG_ACT_CODE_EXP_DATE from
            t_store_user_msisdn a,
            t_store_user b
            where a.store_id = ?
            and a.user_name = ?
            and a.msisdn = ?
            and b.reg_act_code = ?";
    // return $this->db->query($sql,[  $data['stid'],
    //                                 $data['uname_msisdn'],
    //                                 $data['uname_msisdn'],
    //                                 $data['kode']
    //                              ])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[  
      $data['stid'],
      $data['uname_msisdn'],
      $data['uname_msisdn'],
      $data['kode']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
 }

  function aktifasi($data){
    $sql = "UPDATE t_store_user set is_active = '1' where store_id = ? and user_name = ?";
    // return $this->db->query($sql,[  
    //   $data['stid'],
    //   $data['msisdn']
    //   ]);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[  
      $data['stid'],
      $data['msisdn']
      ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }


}


?>
