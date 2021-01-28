<?php
Class M_summary extends CI_Model {

  public function cari($data) {

    $sql = "SELECT TO_CHAR (store_id) store_id,
       user_name,
       full_name,
       nom,
       TO_CHAR (qty) qty,
       to_rp (price) price,
       to_rp (total_price) total_price
  FROM (  SELECT STORE_ID,
                 USER_NAME,
                 FULL_NAME,
                 NOM,
                 COUNT (*) QTY,
                 PRICE,
                 SUM (PRICE) TOTAL_PRICE
            FROM (SELECT ROWNUM AS ROW_NUM, A.*
                    FROM (  SELECT MESSAGEID,
                                   TO_CHAR (TIME_START, 'dd/mm/yy hh24.mi.ss')
                                      AS TIME_START,
                                   TO_CHAR (TIME_FINISH, 'dd/mm/yy hh24.mi.ss')
                                      TIME_FINISH,
                                   NOM,
                                   PRICE,
                                   NO_HP AS TUJUAN,
                                   MSISDN AS PENGISI,
                                   A.STORE_ID,
                                   ENDING_BALANCE,
                                   A.USER_NAME,
                                   B.FULL_NAME,
                                   TRANS_STAT,
                                   GET_TRANS_STAT_DESC (TRANS_STAT) AS KET
                              FROM T_TRANS A, T_STORE_USER B
                             WHERE     A.STORE_ID = B.STORE_ID
                                   AND A.USER_NAME = B.USER_NAME
                                   AND NVL (A.TRANS_STAT, 0) = 200
                                   AND TIME_START BETWEEN TRUNC (
                                                             TO_DATE (
                                                                ?,
                                                                'YYYY-MM-DD'))
                                                      AND   TRUNC (
                                                               TO_DATE (
                                                                  ?,
                                                                  'YYYY-MM-DD'))
                                                          + 1
                          ORDER BY MESSAGEID DESC) A)
           WHERE     STORE_ID = ?
                 AND (   USER_NAME = ?)
        GROUP BY nom,
                 price,
                 user_name,
                 store_id,
                 full_name
        ORDER BY full_name, get_opr (nom), TO_NUMBER (get_denom (nom)))
UNION
SELECT '',
        '',
        '',
        'TOTAL',
        TO_CHAR (COUNT (*)) qty,
        '',
        to_rp (NVL (SUM (price), 0)) total_price
   FROM t_trans
  WHERE     TIME_START BETWEEN TRUNC (TO_DATE (?, 'YYYY-MM-DD'))
                           AND   TRUNC (TO_DATE (?, 'YYYY-MM-DD'))
                               + 1
        AND NVL (trans_stat, 0) = 200
        AND STORE_ID = ?
        AND (   USER_NAME = ?)";

   //  return $this->db->query($sql,[
   //    $data['start_date'],
   //    $data['end_date'],
   //    $data['store_id'],
   //    $data['uname'],
   //    $data['start_date'],
   //    $data['end_date'],
   //    $data['store_id'],
   //    $data['uname']])->result();

   $this->st24apiv1->set_host(HOST_API_INTERNAL);
   $this->st24apiv1->set_query($sql,[
      $data['start_date'],
      $data['end_date'],
      $data['store_id'],
      $data['uname'],
      $data['start_date'],
      $data['end_date'],
      $data['store_id'],
      $data['uname']]);
   $this->st24apiv1->set_secret(API_SECRET);
   $this->st24apiv1->run();
   return $this->st24apiv1->result();

  }

}


?>
