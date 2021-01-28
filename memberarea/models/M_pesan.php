<?php
Class M_pesan extends CI_Model {

  public function list_pesan($data){
    //replaceIgnoreCase(msg, d1(pass) pass , '*') msg,
    $sql = "SELECT row_num, message_date, dari_ke, in_out,
     msg,
     CASE WHEN smscid LIKE 'XMLM%' THEN 'MOBILE'
     WHEN smscid LIKE 'XMLW%' THEN 'WEB'
     WHEN smscid LIKE 'WEB%' THEN 'WEB'
     WHEN smscid LIKE 'XML%' THEN 'H2H'
     WHEN smscid LIKE '%TELEGRAM%' THEN 'TELEGRAM'
	 WHEN smscid LIKE '%WHATSAPP%' THEN 'WHATSAPP'
     WHEN smscid LIKE '%JABBER%' THEN 'JABBER'
     ELSE 'SYS' END smscid
     FROM (
     SELECT rownum row_num, a.* FROM (
     SELECT to_char(trans_date, 'DD/MM/YY HH24:MI:SS') message_date,
     a.msisdn dari_ke, in_out,
     replaceIgnoreCase(msg, pass , '*') msg,
     upper(replace(Nvl(smscid,'SYS'),'YAHOOIN-','')) smscid
     FROM t_inbox_outbox a,
     t_store_user b,
     t_store_user_msisdn c
     WHERE a.msisdn = c.msisdn
     and b.store_id = c.store_id
     and b.user_name = c.user_name
     and b.store_id = ?
     AND b.user_name = ?
     ORDER BY trans_date DESC
     ) a
     )
     WHERE row_num >= ? AND row_num <=?";

    // return $this->db->query($sql,[
    //   $data['store_id'],
    //   $data['uname'],
    //   $data['offset'],
    //   $data['limit']
    //   ])->result();

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[
        $data['store_id'],
        $data['uname'],
        $data['offset'],
        $data['limit']
        ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();

  }



  public function cari($data) {
//replaceIgnoreCase(msg, d1(pass) pass , '*') msg,
    $sql = "SELECT row_num, message_date, dari_ke, in_out,
     msg,
     CASE WHEN smscid LIKE 'XMLM%' THEN 'MOBILE'
     WHEN smscid LIKE 'XMLW%' THEN 'WEB'
     WHEN smscid LIKE 'WEB%' THEN 'WEB'
     WHEN smscid LIKE 'XML%' THEN 'H2H'
     WHEN smscid LIKE '%TELEGRAM%' THEN 'TELEGRAM'
	 WHEN smscid LIKE '%WHATSAPP%' THEN 'WHATSAPP'
     WHEN smscid LIKE '%JABBER%' THEN 'JABBER'
     ELSE 'SYS' END smscid
     FROM (
     SELECT rownum row_num, a.* FROM (
     SELECT to_char(trans_date, 'DD/MM/YY HH24:MI:SS') message_date,
     a.msisdn dari_ke, in_out,
     replaceIgnoreCase(msg,pass , '*') msg,
     upper(replace(Nvl(smscid,'SYS'),'YAHOOIN-','')) smscid
     FROM t_inbox_outbox a,
     t_store_user b,
     t_store_user_msisdn c
     WHERE a.msisdn = c.msisdn
     and b.store_id = c.store_id
     and b.user_name = c.user_name
     and b.store_id = ?
     AND b.user_name = ?
     AND (a.msisdn like ? OR upper(a.msg) like upper(?))
     AND trunc(trans_date) BETWEEN TO_DATE ( ? , 'yyyy/mm/dd') AND TO_DATE ( ? , 'yyyy/mm/dd')
     ORDER BY trans_date DESC
     ) a
     )
     WHERE row_num >= ? AND row_num <=?";

    // return $this->db->query($sql,[
    //   $data['store_id'],
    //   $data['uname'],
    //   '%'.$data['input_key'].'%',
    //   '%'.$data['input_key'].'%',
    //   $data['start_date'],
    //   $data['end_date'],
    //   $data['offset'],$data['limit']])->result();

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[
        $data['store_id'],
        $data['uname'],
        '%'.$data['input_key'].'%',
        '%'.$data['input_key'].'%',
        $data['start_date'],
        $data['end_date'],
        $data['offset'],$data['limit']]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();

  }

}


?>
