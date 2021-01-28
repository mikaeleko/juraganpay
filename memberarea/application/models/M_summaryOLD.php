<?php
Class M_summary extends CI_Model {

  public function list_summary($data){


    $sql = "SELECT * FROM (SELECT store_id,
       user_name,
       full_name,
       nom,
       qty,
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
                          ORDER BY MESSAGEID DESC) A)
           WHERE     STORE_ID = ?
                 AND (   USER_NAME = ?
                      OR GET_PARENT (USER_NAME, STORE_ID) = ?
                      OR GET_GRAND_PARENT (USER_NAME, STORE_ID) = ?
                      OR GET_GRAND_GRAND_PARENT (USER_NAME, STORE_ID) =? )
        GROUP BY nom,
                 price,
                 user_name,
                 store_id,
                 full_name
        ORDER BY full_name, get_opr (nom), TO_NUMBER (get_denom (nom)))) WHERE rownum >=? AND rownum <=?";

    return $this->db->query($sql,[
      $data['store_id'],
      $data['uname'],
      $data['uname'],
      $data['uname'],
      $data['uname'],
      $data['offset'],
      $data['limit']
      ])->result();

  }



  public function cari($data) {

    $sql = "SELECT * FROM (SELECT store_id,
       user_name,
       full_name,
       nom,
       qty,
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
                 AND (   USER_NAME = ?
                      OR GET_PARENT (USER_NAME, STORE_ID) = ?
                      OR GET_GRAND_PARENT (USER_NAME, STORE_ID) = ?
                      OR GET_GRAND_GRAND_PARENT (USER_NAME, STORE_ID) =? )
        GROUP BY nom,
                 price,
                 user_name,
                 store_id,
                 full_name
        ORDER BY full_name, get_opr (nom), TO_NUMBER (get_denom (nom)))) WHERE rownum >=? AND rownum <=?";

    return $this->db->query($sql,[
      $data['start_date'],
      $data['end_date'],
      $data['store_id'],
      $data['uname'],
      $data['uname'],
      $data['uname'],
      $data['uname'],
      $data['offset'],
      $data['limit']])->result();

  }

}


?>
