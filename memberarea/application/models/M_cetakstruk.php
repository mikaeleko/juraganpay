<?php
Class M_cetakstruk extends CI_Model {

  public function cari($data) {
    $sql = "SELECT *
      FROM (SELECT ROW_NUMBER () OVER (ORDER BY Messageid DESC) AS ROW_NUM, A.*
              FROM (SELECT a.MESSAGEID,
                           a.REQUESTID,
                           TO_CHAR (a.TIME_START, 'dd/mm/yy hh24.mi.ss')
                              AS TIME_START,
                           CASE
                              WHEN a.TIME_START BETWEEN TRUNC (SYSDATE)
                                                    AND TRUNC (SYSDATE) + 1
                              THEN
                                 ' - [HARI INI]'
                              ELSE
                                 ' - []'
                           END
                              IS_HARI_INI,
                           TO_CHAR (a.TIME_FINISH, 'dd/mm/yy hh24.mi.ss')
                              TIME_FINISH,
                           a.NOM,
                           TO_RP (a.PRICE) AMOUNT,
                           NVL (a.QTY, 1) QTY,
                           a.NO_HP AS TUJUAN,
                           a.MSISDN AS PENGISI,
                           a.STORE_ID,
                           to_rp (a.ENDING_BALANCE) ending_balance,
                           a.USER_NAME,
                           a.TRANS_STAT,
                           GET_TRANS_STAT_DESC (a.TRANS_STAT) AS KET,
                           (CASE
                               WHEN a.trans_Stat = 200 THEN 'SN=' || a.TE_TRANSID
                               ELSE a.te_transid
                            END)
                              BERITA,
                              c.PRODUCT_TYPE,
                           to_char(b.pmt_rawxml) STRUK_INFO
                      FROM T_TRANS a, T_INQ b, T_NOM c
                     WHERE     1 = 1
                           AND b.messageid(+) = a.messageid
                           AND a.nom = c.nom
                           AND a.trans_stat = 200
                           AND a.NO_HP = ?
                           AND trunc(a.time_start) BETWEEN TO_DATE(?,'yyyy/mm/dd') AND TO_DATE(?,'yyyy/mm/dd')
                           AND a.STORE_ID = ?
                           AND (   a.USER_NAME = ?
                                OR GET_PARENT (a.USER_NAME, a.STORE_ID) = ?
                                OR GET_GRAND_PARENT (a.USER_NAME, a.STORE_ID) = ?
                                OR GET_GRAND_GRAND_PARENT (a.USER_NAME,
                                                           a.STORE_ID) = ?)) A)
     WHERE ROW_NUM >= ? AND ROW_NUM <= ?";

      //return $this->db->query($sql,[$data['key'],$data['store_id'],$data['uname'],$data['uname'],$data['uname'],$data['uname'],$data['offset'],$data['limit']])->result();
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[$data['key'],$data['start_date'],$data['end_date'],$data['store_id'],$data['uname'],$data['uname'],$data['uname'],$data['uname'],$data['offset'],$data['limit']]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }

  public function raw_struk($data) {
   $sql = "SELECT MESSAGEID,replace(struk, '|', chr(10)) AS STRUK FROM T_RAW_STRUK WHERE MESSAGEID = ?";

   //return $this->db->query($sql,[$data['messageid']])->row();
   $this->st24apiv1->set_host(HOST_API_INTERNAL);
   $this->st24apiv1->set_query($sql,[$data['messageid']]);
   $this->st24apiv1->set_secret(API_SECRET);
   $this->st24apiv1->run();
   return $this->st24apiv1->row();
  }

  public function cariNomorDanMessageId($data) {
   $sql = "SELECT *
     FROM (SELECT ROW_NUMBER () OVER (ORDER BY Messageid DESC) AS ROW_NUM, A.*
             FROM (SELECT a.MESSAGEID,
                          a.REQUESTID,
                          TO_CHAR (a.TIME_START, 'dd/mm/yy hh24.mi.ss')
                             AS TIME_START,
                          CASE
                             WHEN a.TIME_START BETWEEN TRUNC (SYSDATE)
                                                   AND TRUNC (SYSDATE) + 1
                             THEN
                                ' - [HARI INI]'
                             ELSE
                                ' - []'
                          END
                             IS_HARI_INI,
                          TO_CHAR (a.TIME_FINISH, 'dd/mm/yy hh24.mi.ss')
                             TIME_FINISH,
                          a.NOM,
                          TO_RP (a.PRICE) AMOUNT,
                          NVL (a.QTY, 1) QTY,
                          a.NO_HP AS TUJUAN,
                          a.MSISDN AS PENGISI,
                          a.STORE_ID,
                          to_rp (a.ENDING_BALANCE) ending_balance,
                          a.USER_NAME,
                          a.TRANS_STAT,
                          GET_TRANS_STAT_DESC (a.TRANS_STAT) AS KET,
                          (CASE
                              WHEN a.trans_Stat = 200 THEN 'SN=' || a.TE_TRANSID
                              ELSE a.te_transid
                           END)
                             BERITA,
                             c.PRODUCT_TYPE,
                          to_char(b.pmt_rawxml) STRUK_INFO
                     FROM T_TRANS a, T_INQ b, T_NOM c
                    WHERE     1 = 1
                          AND b.messageid(+) = a.messageid
                          AND a.nom = c.nom
                          AND a.messageid = ?
                          AND a.trans_stat = 200
                          AND a.NO_HP = ?
                          AND a.STORE_ID = ?
                          AND (   a.USER_NAME = ?
                               OR GET_PARENT (a.USER_NAME, a.STORE_ID) = ?
                               OR GET_GRAND_PARENT (a.USER_NAME, a.STORE_ID) = ?
                               OR GET_GRAND_GRAND_PARENT (a.USER_NAME,
                                                          a.STORE_ID) = ?)) A)
    WHERE ROW_NUM >= 0 AND ROW_NUM <= 100";

   //return $this->db->query($sql,[$data['messageid'],$data['key'],$data['store_id'],$data['uname'],$data['uname'],$data['uname'],$data['uname']])->result();
   $this->st24apiv1->set_host(HOST_API_INTERNAL);
   $this->st24apiv1->is_debug(false);
   $this->st24apiv1->set_query($sql,[$data['messageid'],$data['key'],$data['store_id'],$data['uname'],$data['uname'],$data['uname'],$data['uname']]);
   $this->st24apiv1->set_secret(API_SECRET);
   $this->st24apiv1->run();
   return $this->st24apiv1->result();
 }

}


?>
