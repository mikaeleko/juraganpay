<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_webreport extends CI_Model {

  // function __construct(){
  //   parent::__construct();
  // }

    public function get_data_profile($data){
        $sql = "SELECT a.user_name,
                a.full_name,
                a.lvl,
                to_rp(CASE WHEN lvl <> 1 THEN NVL (a.balance, 0) ELSE NVL (b.balance, 0) END)
                balance
                FROM t_store_user a, t_store b
                WHERE     a.store_id = b.store_id
                    AND a.user_name = ?
                    AND a.store_id = ?";

        // return $this->db->query($sql,[$data['uname'],$data['store_id']])->row();
        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[$data['uname'],$data['store_id']]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->row();
    }
    
    public function chart_bottom($username,$store_id){
        $sql = "SELECT b.status, NVL (a.jumlah, 0) jumlah, NVL (a.nilai, 0) nilai
        FROM (  SELECT COUNT (*) jumlah,
                       NVL (SUM (price), 0) nilai,
                       CASE
                          WHEN NVL (trans_stat, 0) = 200 THEN 'BERHASIL'
                          WHEN NVL (trans_stat, 0) = 1200 THEN 'PENDING'
                          WHEN trans_stat LIKE '2%' THEN 'GAGAL'
                       END
                          status
                  FROM t_trans
                 WHERE     store_id = ?
                       AND user_name = ?
                       AND time_start BETWEEN TRUNC (SYSDATE) AND TRUNC (SYSDATE) + 1
              GROUP BY CASE
                          WHEN NVL (trans_stat, 0) = 200 THEN 'BERHASIL'
                          WHEN NVL (trans_stat, 0) = 1200 THEN 'PENDING'
                          WHEN trans_stat LIKE '2%' THEN 'GAGAL'
                       END) a,
             (SELECT 'BERHASIL' status FROM DUAL
              UNION
              SELECT 'PENDING' status FROM DUAL
              UNION
              SELECT 'GAGAL' status FROM DUAL) b
        WHERE a.status(+) = b.status
        ORDER BY a.status ASC";
        // return $this->db->query($sql,[$store_id,$username])->result();
        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[$store_id,$username]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();
    }

    public function chart_line($data){
        $sql = "SELECT b.tanggal, NVL (a.jumlah, 0) jumlah, NVL (a.nilai, 0) nilai
        FROM (  SELECT COUNT (*) jumlah,
                       NVL (SUM (price), 0) nilai,
                       TRUNC (time_start) tanggal
                  FROM t_trans
                 WHERE     store_id = ?
                       AND user_name = ?
                       and nvl(trans_stat,0) = 200
                       AND time_start BETWEEN TRUNC (SYSDATE - ?)
                                          AND TRUNC (SYSDATE) + 1
              GROUP BY TRUNC (time_start)) a,
             (WITH nums
                   AS (    SELECT LEVEL - 1 h_min
                             FROM DUAL
                       CONNECT BY LEVEL <= ? + 1)
              SELECT TRUNC (SYSDATE - h_min) tanggal
                FROM nums) b
        WHERE a.tanggal(+) = b.tanggal
        ORDER BY b.tanggal";
        // return $this->db->query($sql,[$data['store_id'], $data['uname'],$data['day'],$data['day']])->result();

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[$data['store_id'], $data['uname'],$data['day'],$data['day']]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();
    }
}
?>
