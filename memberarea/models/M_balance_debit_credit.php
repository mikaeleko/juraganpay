<?php
Class M_balance_debit_credit extends CI_Model {

    public function cari($lvl,$data){
    
        if($lvl==1){
            $sql = "SELECT *
            FROM (SELECT ROWNUM row_num, a.*
                    FROM (  SELECT messageid,
                                a.user_name,
                                a.store_id,
                                b.store_name full_name,
                                TO_CHAR (trans_date, 'dd/mm/yyyy hh24:mi:ss')
                                    trans_date,
                                to_rp (
                                    DECODE (a.db_cr,  'DB', amount,  'CR', NULL,  NULL))
                                    db,
                                to_rp (
                                    DECODE (a.db_cr,  'CR', amount,  'DB', NULL,  NULL))
                                    cr,
                                to_rp (a.balance) balance,
                                trans_stat,
                                dsc
                            FROM t_trans_balance a, t_store b
                            WHERE     a.store_id = b.store_id
                                AND a.user_name = 'store_' || a.store_id
                                AND a.store_id = ?
                                AND trans_date BETWEEN TO_DATE (?,
                                                                'dd-mm-yyyy')
                                                    AND   TO_DATE (?,
                                                                    'dd-mm-yyyy')
                                                        + 1
                                AND NVL (B.STORE_ID, -1) = 7
                                AND 1 = 1
                        ORDER BY trans_date DESC) a)
        WHERE ROW_NUM >= ? AND ROW_NUM <= ?";
        // return $this->db->query($sql,[
        //     $data['store_id'],
        //     $data['start_date'],
        //     $data['end_date'],
        //     $data['offset'],
        //     $data['limit']
        //     ])->result();

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $data['store_id'],
            $data['start_date'],
            $data['end_date'],
            $data['offset'],
            $data['limit']
            ]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();

        }elseif($lvl>1){
            $sql = "SELECT *
            FROM (SELECT ROWNUM row_num, a.*
                    FROM (  SELECT messageid,
                                a.user_name,
                                a.store_id,
                                b.full_name full_name,
                                trans_date tdate,
                                TO_CHAR (trans_date, 'dd/mm/yyyy hh24:mi:ss')
                                    trans_date,
                                to_rp (
                                    DECODE (a.db_cr,  'DB', amount,  'CR', NULL,  NULL))
                                    \"DB\",
                                to_rp (
                                    DECODE (a.db_cr,  'CR', amount,  'DB', NULL,  NULL))
                                    cr,
                                to_rp (a.balance) balance,
                                trans_stat,
                                dsc
                            FROM t_trans_balance a, t_store_user b
                            WHERE     a.user_name = b.user_name
                                AND a.store_id = b.store_id
                                AND a.user_name <> 'store_' || a.store_id
                                AND a.store_id = ?
                                AND a.user_name = ?
                                AND a.store_id = ?
                                AND trans_date BETWEEN TO_DATE (?,
                                                                'dd-mm-yyyy')
                                                    AND   TO_DATE (?,
                                                                    'dd-mm-yyyy')
                                                        + 1
                                AND NVL (B.STORE_ID, -1) = ?
                                AND (   B.USER_NAME = ?
                                        OR GET_PARENT (B.USER_NAME, B.STORE_ID) =
                                            ?
                                        OR GET_GRAND_PARENT (B.USER_NAME, B.STORE_ID) =
                                            ?
                                        OR GET_GRAND_GRAND_PARENT (B.USER_NAME,
                                                                B.STORE_ID) =
                                            ?)
                        ORDER BY tdate DESC) a)
            WHERE ROW_NUM >= ? AND ROW_NUM <= ?";
            // return $this->db->query($sql,[
            //     $data['store_id'],
            //     $data['uname'],
            //     $data['store_id'],
            //     $data['start_date'],
            //     $data['end_date'],
            //     $data['store_id'],
            //     $data['uname'],
            //     $data['uname'],
            //     $data['uname'],
            //     $data['uname'],
            //     $data['offset'],
            //     $data['limit']
            //     ])->result();

            $this->st24apiv1->set_host(HOST_API_INTERNAL);
            $this->st24apiv1->set_query($sql,[
                $data['store_id'],
                $data['uname'],
                $data['store_id'],
                $data['start_date'],
                $data['end_date'],
                $data['store_id'],
                $data['uname'],
                $data['uname'],
                $data['uname'],
                $data['uname'],
                $data['offset'],
                $data['limit']
                ]);
            $this->st24apiv1->set_secret(API_SECRET);
            $this->st24apiv1->run();
            return $this->st24apiv1->result();
        }

    
    }

    public function export($lvl,$data){
    
        if($lvl==1){
            $sql = "SELECT *
            FROM (SELECT ROWNUM row_num, a.*
                    FROM (  SELECT messageid,
                                a.user_name,
                                a.store_id,
                                b.store_name full_name,
                                TO_CHAR (trans_date, 'dd/mm/yyyy hh24:mi:ss')
                                    trans_date,
                                to_rp (
                                    DECODE (a.db_cr,  'DB', amount,  'CR', NULL,  NULL))
                                    \"(db)\",
                                to_rp (
                                    DECODE (a.db_cr,  'CR', amount,  'DB', NULL,  NULL))
                                    cr,
                                to_rp (a.balance) balance,
                                trans_stat,
                                dsc
                            FROM t_trans_balance a, t_store b
                            WHERE     a.store_id = b.store_id
                                AND a.user_name = 'store_' || a.store_id
                                AND a.store_id = ?
                                AND trans_date BETWEEN TO_DATE (?,
                                                                'dd-mm-yyyy')
                                                    AND   TO_DATE (?,
                                                                    'dd-mm-yyyy')
                                                        + 1
                                AND NVL (B.STORE_ID, -1) = 7
                                AND 1 = 1
                        ORDER BY trans_date DESC) a)";
        return $this->db->query($sql,[
            $data['store_id'],
            $data['start_date'],
            $data['end_date']
            ])->result();
        }elseif($lvl>1){
            $sql = "SELECT *
            FROM (SELECT ROWNUM row_num, a.*
                    FROM (  SELECT messageid,
                                a.user_name,
                                a.store_id,
                                b.full_name full_name,
                                trans_date tdate,
                                TO_CHAR (trans_date, 'dd/mm/yyyy hh24:mi:ss')
                                    trans_date,
                                to_rp (
                                    DECODE (a.db_cr,  'DB', amount,  'CR', NULL,  NULL))
                                    \"DB\",
                                to_rp (
                                    DECODE (a.db_cr,  'CR', amount,  'DB', NULL,  NULL))
                                    cr,
                                to_rp (a.balance) balance,
                                trans_stat,
                                dsc
                            FROM t_trans_balance a, t_store_user b
                            WHERE     a.user_name = b.user_name
                                AND a.store_id = b.store_id
                                AND a.user_name <> 'store_' || a.store_id
                                AND a.store_id = ?
                                AND a.user_name = ?
                                AND a.store_id = ?
                                AND trans_date BETWEEN TO_DATE (?,
                                                                'dd-mm-yyyy')
                                                    AND   TO_DATE (?,
                                                                    'dd-mm-yyyy')
                                                        + 1
                                AND NVL (B.STORE_ID, -1) = ?
                                AND (   B.USER_NAME = ?
                                        OR GET_PARENT (B.USER_NAME, B.STORE_ID) =
                                            ?
                                        OR GET_GRAND_PARENT (B.USER_NAME, B.STORE_ID) =
                                            ?
                                        OR GET_GRAND_GRAND_PARENT (B.USER_NAME,
                                                                B.STORE_ID) =
                                            ?)
                        ORDER BY tdate DESC) a)";
            // return $this->db->query($sql,[
            //     $data['store_id'],
            //     $data['uname'],
            //     $data['store_id'],
            //     $data['start_date'],
            //     $data['end_date'],
            //     $data['store_id'],
            //     $data['uname'],
            //     $data['uname'],
            //     $data['uname'],
            //     $data['uname']
            //     ])->result();

            $this->st24apiv1->set_host(HOST_API_INTERNAL);
            $this->st24apiv1->set_query($sql,[
                $data['store_id'],
                $data['uname'],
                $data['store_id'],
                $data['start_date'],
                $data['end_date'],
                $data['store_id'],
                $data['uname'],
                $data['uname'],
                $data['uname'],
                $data['uname']
                ]);
            $this->st24apiv1->set_secret(API_SECRET);
            $this->st24apiv1->run();
            return $this->st24apiv1->result();
        }

    
    }

}


?>
