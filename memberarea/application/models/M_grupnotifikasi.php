<?php
Class M_grupnotifikasi extends CI_Model {

    public function getInbox($data) {
        $sql = "
        select count(*) count from 
        t_inbox_outbox a,
        t_store_user b,
        t_store_user_msisdn c
        where a.in_out = 'OUT'
        and nvl(a.is_read,0) = 0 
        and a.trans_date between trunc(sysdate) and trunc(sysdate)+1
        and a.msisdn = c.msisdn
        and b.user_name = c.user_name
        and b.store_id = c.store_id
        and b.user_name = ?
        and b.store_id = ?";

        // return $this->db->query($sql,[
        //     $data['username'],
        //     $data['store_id']
        // ])->row();

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $data['username'],
            $data['store_id']
        ]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();
    }

    public function inboxUpdate($data){
        $sql = "update t_inbox_outbox
        set is_read = 1
        where msisdn in
        (
            Select msisdn from t_store_user_msisdn
            where store_id = ?
            and user_name = ?
        )";
        // return $this->db->query($sql,[
        //     $data['store_id'],
        //     $data['username']
        // ]);

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $data['store_id'],
            $data['username']
        ]);
        $this->st24apiv1->set_secret(API_SECRET);
        return $this->st24apiv1->run();
        // return $this->st24apiv1->result();
    } 

    public function getNews($data) {
        $sql = "
        select count(*) AS COUNT from (
            select a.*, nvl(c.is_read,0) is_read
            from 
            t_news a, 
            t_store_user b,
            t_news_status c
            where 
            b.user_name = ?
            and b.store_id = ?
            and c.news_date(+) = a.news_date
            )
            where is_read = 0";

        // return $this->db->query($sql,[
        //     $data['username'],
        //     $data['store_id']
        // ])->row();

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $data['username'],
            $data['store_id']
        ]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->row();
    }

    public function get_news_is_read_0($data) {
        $sql = "
        select a.*, nvl(c.is_read,0) is_read, to_char(a.news_date,'YYYY/MM/DD HH24:MI:SS') news_date2
        from 
        t_news a, 
        t_store_user b,
        t_news_status c
        where 
        b.store_id = ?
        and b.user_name = ?
        and c.news_date(+) = a.news_date
        and nvl(c.is_read,0) = 0";

        // return $this->db->query($sql,[
        //     $data['store_id'],
        //     $data['username']
        // ])->result();

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $data['store_id'],
            $data['username']
        ]);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();
    }

    

    public function news_read($news_date,$store_id,$username){
        $sql = "insert into t_news_status(news_date,store_id,user_name,is_read)
        values(to_date(?,'YYYY/MM/DD HH24:MI:SS'), ?, ?, 1)";
        // return $this->db->query($sql,[
        //     $news_date,
        //     $store_id,
        //     $username
        // ]);

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql,[
            $news_date,
            $store_id,
            $username
        ]);
        $this->st24apiv1->set_secret(API_SECRET);
        return $this->st24apiv1->run();
    } 
  

}


?>
