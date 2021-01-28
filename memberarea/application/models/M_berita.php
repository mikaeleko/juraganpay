<?php
Class M_berita extends CI_Model {

  public function list_pesan($data){
    //replace(msg, d1(pass) pass , '**********') msg,
    $sql = "SELECT row_num, message_date, dari_ke, in_out,
     msg,
     CASE WHEN smscid LIKE 'XMLM%' THEN 'MOBILE'
     WHEN smscid LIKE 'XMLW%' THEN 'WEB'
     WHEN smscid LIKE 'WEB%' THEN 'WEB'
     WHEN smscid LIKE 'XML%' THEN 'H2H'
     ELSE smscid END smscid
     FROM (
     SELECT rownum row_num, a.* FROM (
     SELECT to_char(trans_date, 'DD/MM/YY HH24:MI:SS') message_date,
     a.msisdn dari_ke, in_out,
     replace(msg, pass , '**********') msg,
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

    return $this->db->query($sql,[
      $data['store_id'],
      $data['uname'],
      $data['offset'],
      $data['limit']
      ])->result();

  }



  public function cari($data) {

    $sql = "SELECT rownum as ROW_NUM,a.news_date , to_char(a.text) TEXT, IS_READ,to_char(a.news_date,'DD/MM/YYYY HH24:MI:SS') news_date2 FROM (
        select a.*, nvl(c.is_read,0) is_read
        from
        t_news a,
        t_store_user b,
        t_news_status c
        where
        b.store_id = ?
        and b.user_name = ?
        and c.news_date(+) = a.news_date
        AND upper(a.text) like upper(?)
        AND trunc(a.news_date) BETWEEN TO_DATE ( ? , 'yyyy/mm/dd') AND TO_DATE ( ? , 'yyyy/mm/dd')
        order by a.news_date desc
        ) a WHERE rownum >= ? AND rownum <= ?";

    return $this->db->query($sql,[
      $data['store_id'],
      $data['uname'],
      '%'.$data['input_key'].'%',
      $data['start_date'],
      $data['end_date'],
      $data['offset'],$data['limit']])->result();

  }

}


?>
