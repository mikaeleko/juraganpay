<?php
Class M_statusproduct extends CI_Model {

   public function cari($data,$mode_export = false) {
      $prv = "";
      if ($data['prv']!="") {
         $dataPrv = $data['prv'];
         $prv = " B.KODE_PROVIDER = '$dataPrv' AND ";
      }else{
         $prv ="";
      }

      $query_pagination = "";
      if(!$mode_export){
         $query_pagination = "WHERE Row_num >= ? AND Row_num <= ?";
      }
      $sql = " SELECT *
      FROM (SELECT ROW_NUMBER ()
         OVER (ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom)))
         AS ROW_NUM,
      A.*,'Rp. '|| TO_RP(harga_jual_numb-price) margin
      FROM (SELECT Price,
               tag,
               nom,
               ket,
               harga,
               status,
               CASE
                  WHEN UPPER (SUBSTR (IMG, 0, 4)) = 'HTTP'
                  THEN
                     IMG
                  ELSE
                        ?
                     || 'icon_'
                     || IMG
                     || '.png'
               END
                  IMG,
               fee,
               discount,
               kode_provider,
               short_dsc,
               nvl(harga_jual,harga) harga_jual,nvl(harga_jual_numb,price) harga_jual_numb
         FROM (SELECT nom nom_outlet,user_name,store_id,'Rp. '||to_RP(price) harga_jual,price harga_jual_numb FROM t_outlet_price WHERE user_name = ? AND store_id = ?) op,
                  (SELECT get_myprice (?, ?, B.NOM)
                        PRICE,
                        'Rp. '
                     || To_Rp (
                           get_myprice (?, ?, B.NOM))
                        DISCOUNT,
                        'Rp. '
                     || To_rp (
                           get_myfee (?, ?, B.NOM))
                        FEE,
                     B.HASHTAG TAG,
                     B.NOM,
                     B.DSC KET,
                        'Rp. '
                     || TO_RP (
                              get_myprice (?, ?, B.NOM)
                           + get_myfee (?, ?, B.NOM))
                     || Get_Tag_price (b.nom, 'RETAIL')
                        HARGA,
                     CASE
                        WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
                        ELSE 'CLOSE'
                     END
                        STATUS,
                     NVL (b.img_url,
                           NVL (p.img_url, p.kode_provider))
                        IMG,
                     b.kode_provider,
                     b.short_dsc
                  FROM l_detail_price_plan l,
                     t_provider p,
                     (
                     SELECT tnom.*
                        FROM T_NOM tnom
                        ) B
               WHERE
               ".$prv."
                  l.nom = b.nom AND l.kode_price_plan = ?
                     AND p.kode_provider = b.kode_provider
                     AND b.nom NOT LIKE 'CEKPLN%'
                     AND b.nom NOT LIKE 'TAGPLN%'
                     AND UPPER (B.DSC) LIKE UPPER (?)
                     AND ( (   NVL (product_type, 'N') <> 'B'
                              OR (    NVL (product_type, 'N') = 'B'
                                 AND B.nom NOT LIKE 'TAG%')))) tnom
                     WHERE op.nom_outlet (+) = tnom.nom) A)
                     ".$query_pagination."
                     ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))";

       $this->st24apiv1->set_host(HOST_API_INTERNAL);
       $this->st24apiv1->is_debug(false);
       if($mode_export){
         $this->st24apiv1->set_query($sql,[
            HOST_API_IMAGE.'get_img?file=',
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['kode'],
            '%'.$data['key'].'%']);
       }else{
         $this->st24apiv1->set_query($sql,[
            HOST_API_IMAGE.'get_img?file=',
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['uname'],$data['store_id'],
            $data['kode'],
            '%'.$data['key'].'%',
            $data['offset'],
            $data['limit']]);
       }
       $this->st24apiv1->set_secret(API_SECRET);
       $this->st24apiv1->run();
       return $this->st24apiv1->result();
  }



  function get_provider(){
        $sql = "SELECT DISTINCT kode_provider
                FROM t_nom WHERE hashtag IS NOT NULL
                ORDER BY kode_provider";
      //   return $this->db->query($sql)->result();
        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->result();
  }


  public function cekoutlet($data){
    $sql = "SELECT * FROM T_OUTLET_PRICE WHERE NOM = ? AND USER_NAME = ? AND STORE_ID = ?";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[
      $data['nom'],
      $data['username'],
      $data['store_id']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  public function insertoutlet($data){
    $sql = "INSERT INTO T_OUTLET_PRICE (STORE_ID,USER_NAME,NOM,PRICE) VALUES (?,?,?,?)";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[
        $data['store_id'],
        $data['username'],
        $data['nom'],
        $data['price']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }

  public function updateoutlet($data){
    $sql = "UPDATE T_OUTLET_PRICE SET PRICE = ? WHERE NOM = ? AND USER_NAME = ? AND STORE_ID = ?";
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[
      $data['price'],
      $data['nom'],
      $data['username'],
      $data['store_id']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }

  
   public function exportcsv($data){
      return $this->cari($data,true);
   }

}


?>
