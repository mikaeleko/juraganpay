<?php
Class M_deposit extends CI_Model {

  public function list_deposit($data){


    $sql = "SELECT *
      FROM (SELECT ROWNUM AS ROW_NUM, a.*
              FROM (  SELECT MESSAGEID,
                             REQUESTID,
                             TO_CHAR (TIME_START, 'dd/mm/yy hh24.mi.ss')
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
                             A.NO_HP,
                             to_rp (PRICE) JUMLAH,
                             TRANS_STAT,
                             to_rp (ENDING_BALANCE) ending_balance
                        FROM T_TRANS A, T_STORE_USER_MSISDN B, T_STORE_USER C
                       WHERE     A.NO_HP = B.MSISDN
                             AND B.USER_NAME = C.USER_NAME
                             AND B.STORE_ID = C.STORE_ID
                             AND C.USER_NAME = ?
                             AND C.STORE_ID = ?
                             AND NVL (A.TRANS_STAT, 0) IN (901, 900, 601, 600)
                    ORDER BY MESSAGEID DESC) a)
     WHERE ROW_NUM >= ? AND ROW_NUM <= ?";

   //  return $this->db->query($sql,[
   //    $data['uname'],
   //    $data['store_id'],
   //    $data['offset'],
   //    $data['limit']
   //    ])->result();

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[
         $data['uname'],
         $data['store_id'],
         $data['offset'],
         $data['limit']
         ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();

  }



  public function cari($data) {

    $sql = "SELECT *
      FROM (SELECT ROWNUM AS ROW_NUM, a.*
            FROM (  SELECT MESSAGEID,
                           REQUESTID,
                           TO_CHAR (TIME_START, 'dd/mm/yy hh24.mi.ss')
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
                           A.NO_HP,
                           to_rp (PRICE) JUMLAH,
                           TRANS_STAT,
                           to_rp (ENDING_BALANCE) ending_balance
                      FROM T_TRANS A, T_STORE_USER_MSISDN B, T_STORE_USER C
                     WHERE     A.NO_HP = B.MSISDN
                           AND B.USER_NAME = C.USER_NAME
                           AND B.STORE_ID = C.STORE_ID
                           AND C.USER_NAME = ?
                           AND C.STORE_ID = ?
                           AND TIME_START BETWEEN TRUNC (TO_DATE (?, 'YYYY-MM-DD'))
                           AND  TRUNC (TO_DATE (?, 'YYYY-MM-DD')) + 1
                           AND NVL (A.TRANS_STAT, 0) IN (901, 900, 601, 600)
                  ORDER BY MESSAGEID DESC) a)
        WHERE ROW_NUM >= ? AND ROW_NUM <= ?
         ";

   //  return $this->db->query($sql,[
   //    $data['uname'],
   //    $data['store_id'],
   //    $data['start_date'],
   //    $data['end_date'],
   //    $data['offset'],
   //    $data['limit']])->result();
      $this->st24apiv1->is_debug(false);
      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->set_query($sql,[
         $data['uname'],
         $data['store_id'],
         $data['start_date'],
         $data['end_date'],
         $data['offset'],
         $data['limit']]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();

  }

}


?>
