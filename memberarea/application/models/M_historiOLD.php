<?php
Class M_histori extends CI_Model {

  public function list_histori($data){
    $stat = "";
    if ($data['trans_stat']=="sukses") {
      $stat = "AND a.trans_stat = 200 ";
    }elseif($data['trans_stat']=="pending"){
      $stat = "AND a.trans_stat = 1200 ";
    }elseif($data['trans_stat']=="gagal"){
      $stat = "AND (a.trans_stat != 200 AND a.trans_stat != 1200) ";
    }

    $sql = "SELECT *
    FROM (SELECT ROW_NUMBER () OVER (ORDER BY TO_DATE(TIME_START, 'DD/MM/YY HH24:MI:SS') DESC) AS ROW_NUM, A.*
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
                           WHEN nvl(a.trans_stat,0) = 200 THEN 'SN=' || a.TE_TRANSID
                           ELSE a.te_transid
                        END)
                          BERITA
                  FROM T_TRANS a, T_INQ b, T_NOM c
                 WHERE     1 = 1
                       AND b.messageid(+) = a.messageid
                       AND a.nom = c.nom
                       ".$stat."
                       AND trunc(a.TIME_START) = trunc(SYSDATE)
                       AND a.NO_HP = ?
                       AND a.STORE_ID = ?
                       AND (   a.USER_NAME = ?
                            OR GET_PARENT (a.USER_NAME, a.STORE_ID) =
                                  ?
                            OR GET_GRAND_PARENT (a.USER_NAME, a.STORE_ID) =
                                  ?
                            OR GET_GRAND_GRAND_PARENT (a.USER_NAME,
                                                       a.STORE_ID) =
                                  ?)  ) A)
               WHERE ROW_NUM >= ? AND ROW_NUM <= ?";

    return $this->db->query($sql,[
      $data['no_hp'],
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
    $stat = "";
    if ($data['trans_stat']=="sukses") {
      $stat = "AND a.trans_stat = 200 ";
    }elseif($data['trans_stat']=="pending"){
      $stat = "AND a.trans_stat = 1200 ";
    }elseif($data['trans_stat']=="gagal"){
      $stat = "AND a.trans_stat != 200 AND a.trans_stat != 1200 ";
    }

    $sql = "SELECT *
    FROM (SELECT ROW_NUMBER () OVER (ORDER BY TO_DATE(TIME_START, 'DD/MM/YY HH24:MI:SS') DESC) AS ROW_NUM, A.*
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
                           WHEN nvl(a.trans_stat,0) = 200 THEN 'SN=' || a.TE_TRANSID
                           ELSE a.te_transid
                        END)
                          BERITA
                  FROM T_TRANS a, T_INQ b, T_NOM c
                 WHERE     1 = 1
                       AND b.messageid(+) = a.messageid
                       AND a.nom = c.nom
                       AND trunc(a.TIME_START) BETWEEN TO_DATE ( ? , 'yyyy/mm/dd') AND TO_DATE ( ? , 'yyyy/mm/dd')
                       ".$stat."
                       AND (a.NO_HP = ? or (TRIM(?) is null) )
                       AND a.STORE_ID = ?
                       AND (   a.USER_NAME = ?
                            OR GET_PARENT (a.USER_NAME, a.STORE_ID) =
                                  ?
                            OR GET_GRAND_PARENT (a.USER_NAME, a.STORE_ID) =
                                  ?
                            OR GET_GRAND_GRAND_PARENT (a.USER_NAME,
                                                       a.STORE_ID) =
                                  ?)  ) A)
               WHERE ROW_NUM >= ? AND ROW_NUM <= ?";

    return $this->db->query($sql,[$data['start_date'], $data['end_date'], $data['no_hp'], $data['no_hp'], $data['store_id'], $data['uname'], $data['uname'],$data['uname'],$data['uname'],$data['offset'],$data['limit']])->result();

  }

   public function export_data($data) {

      $stat = "";
      if ($data['trans_stat']=="sukses") {
         $stat = "AND a.trans_stat = 200 ";
      }elseif($data['trans_stat']=="pending"){
         $stat = "AND a.trans_stat = 1200 ";
      }elseif($data['trans_stat']=="gagal"){
         $stat = "AND a.trans_stat != 200 AND a.trans_stat != 1200 ";
      }

      $sql = "SELECT *
      FROM (SELECT ROW_NUMBER () OVER (ORDER BY TO_DATE(TIME_START, 'DD/MM/YY HH24:MI:SS') DESC) AS ROW_NUM, A.*
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
                              WHEN nvl(a.trans_stat,0) = 200 THEN 'SN=' || a.TE_TRANSID
                              ELSE a.te_transid
                           END)
                              BERITA
                     FROM T_TRANS a, T_INQ b, T_NOM c
                     WHERE     1 = 1
                           AND b.messageid(+) = a.messageid
                           AND a.nom = c.nom
                           AND trunc(a.TIME_START) BETWEEN TO_DATE ( ? , 'yyyy/mm/dd') AND TO_DATE ( ? , 'yyyy/mm/dd')
                           ".$stat."
                           AND a.STORE_ID = ?
                           AND (   a.USER_NAME = ?
                              OR GET_PARENT (a.USER_NAME, a.STORE_ID) =
                                    ?
                              OR GET_GRAND_PARENT (a.USER_NAME, a.STORE_ID) =
                                    ?
                              OR GET_GRAND_GRAND_PARENT (a.USER_NAME,
                                                         a.STORE_ID) =
                                    ?)  ) A)";

      return $this->db->query($sql,[$data['start_date'], $data['end_date'], $data['store_id'], $data['uname'], $data['uname'],$data['uname'],$data['uname']])->result();

   }

}


?>
