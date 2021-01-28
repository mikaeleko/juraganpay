<?php
Class M_histori extends CI_Model {

  public function chart_bottom($data){
      $stat = "";
      if ($data['trans_stat']=="sukses") {
        $stat = "AND trans_stat = 200 ";
      }elseif($data['trans_stat']=="pending"){
        $stat = "AND trans_stat = 1200 ";
      }elseif($data['trans_stat']=="gagal"){
        $stat = "AND trans_stat != 200 AND trans_stat != 1200 ";
      }
      else{
        $stat = "AND (   trans_stat = 200
                 OR trans_stat = 1200
                 OR TRUNC (trans_stat / 100) = 2)";
      }

      $sql = "SELECT count(*) qty,
              case when trans_stat = 200 then 'berhasil'
              when trans_stat = 1200 then 'pending'
              else 'gagal' end status
              from t_trans
              where TIME_START BETWEEN TO_DATE ( ? , 'yyyy/mm/dd') AND TO_DATE ( ? , 'yyyy/mm/dd') + 1
              $stat
              and store_id = ?
              and (user_name = ?
                OR GET_PARENT (USER_NAME, STORE_ID) = ?
                OR GET_GRAND_PARENT (USER_NAME, STORE_ID) = ?
                OR GET_GRAND_GRAND_PARENT (USER_NAME, STORE_ID) = ?
              )
              and (no_hp = ? or ? is null)
              group by (case when trans_stat = 200 then 'berhasil'
              when trans_stat = 1200 then 'pending'
              else 'gagal' end)";

      // return $this->db->query($sql,[
      //   $data['start_date'],
      //   $data['end_date'],
      //   $data['store_id'],
      //   $data['uname'],
      //   $data['uname'],
      //   $data['uname'],
      //   $data['uname'],
      //   $data['no_hp'],
      //   $data['no_hp']
      //   ])->result();


      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->is_debug(false);
		$this->st24apiv1->set_query($sql,[
         $data['start_date'],
         $data['end_date'],
         $data['store_id'],
         $data['uname'],
         $data['uname'],
         $data['uname'],
         $data['uname'],
         $data['no_hp'],
         $data['no_hp']
         ]);
		$this->st24apiv1->set_secret(API_SECRET);
		$this->st24apiv1->run();
		return $this->st24apiv1->result();
  }


  public function cari($data,$is_pagination = true) {
    $stat = "";
    if ($data['trans_stat']=="sukses") {
      $stat = "AND a.trans_stat = 200 ";
    }elseif($data['trans_stat']=="pending"){
      $stat = "AND a.trans_stat = 1200 ";
    }elseif($data['trans_stat']=="gagal"){
      $stat = "AND a.trans_stat != 200 AND a.trans_stat != 1200 ";
    }else{
      $stat = "AND (   trans_stat = 200
      OR trans_stat = 1200
      OR TRUNC (trans_stat / 100) = 2)";
    }

    $q_pagination = "";
    if($is_pagination){
      $q_pagination = "WHERE ROW_NUM >= ? AND ROW_NUM <= ?";
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
               ".$q_pagination;

   //  return $this->db->query($sql,[
   //    $data['start_date'],
   //    $data['end_date'],
   //    $data['no_hp'],
   //    $data['no_hp'],
   //    $data['store_id'],
   //    $data['uname'],
   //    $data['uname'],
   //    $data['uname'],
   //    $data['uname'],
   //    $data['offset'],
   //    $data['limit']])->result();


      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      if($is_pagination){
         $this->st24apiv1->set_query($sql,[
            $data['start_date'],
            $data['end_date'],
            $data['no_hp'],
            $data['no_hp'],
            $data['store_id'],
            $data['uname'],
            $data['uname'],
            $data['uname'],
            $data['uname'],
            $data['offset'],
            $data['limit']]);
      }else{
         $this->st24apiv1->set_query($sql,[
            $data['start_date'],
            $data['end_date'],
            $data['no_hp'],
            $data['no_hp'],
            $data['store_id'],
            $data['uname'],
            $data['uname'],
            $data['uname'],
            $data['uname']]);
      }
		$this->st24apiv1->set_secret(API_SECRET);
		$this->st24apiv1->run();
		return $this->st24apiv1->result();

  }

   public function export_data($data) {
		return $this->cari($data,false);

   }

}


?>
