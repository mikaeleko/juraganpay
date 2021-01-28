<?php
Class M_statusproduct extends CI_Model {

  public function cari($data) {
    $prv = "";
    if ($data['prv']!="") {
      $dataPrv = $data['prv'];
      $prv = " B.KODE_PROVIDER = '$dataPrv' AND ";
    }else{
      $prv ="";
    }
//     $sql = "SELECT *
//   FROM (SELECT ROW_NUMBER ()
//                     OVER (ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom)))
//                     AS ROW_NUM,
//                  A.*
//             FROM (SELECT Price,
//                          tag,
//                          nom,
//                          ket,
//                          harga,
//                          status,
//                          CASE
//                             WHEN TRIM (img) = 'PEMBAYARAN'
//                             THEN
//                                TRIM (img) || nom
//                             ELSE
//                                TRIM (img)
//                          END
//                             img,
//                          fee,
//                          discount
//                     FROM (SELECT NVL (Level_?, level_4) Price,
//                                     'Rp. '
//                                  || To_Rp (NVL (Level_?, NVL (level_4, 0)))
//                                     DISCOUNT,
//                                  'Rp. ' || To_rp (NVL (A.Fee, 0)) FEE,
//                                  B.HASHTAG TAG,
//                                  A.NOM,
//                                  B.DSC KET,
//                                     'Rp. '
//                                  || TO_RP (
//                                        NVL (Level_?, level_4) + (NVL (fee, 0)))
//                                  || Get_Tag_price (a.nom, level_?)
//                                     HARGA,
//                                  CASE
//                                     WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
//                                     ELSE 'CLOSE'
//                                  END
//                                     STATUS,
//                                  trim('icon_' ||
//                                  lower(
//                                  CASE
//                                     WHEN DSC IS NULL
//                                     THEN
//                                        GET_OPR (A.NOM)
//                                     WHEN TRIM (DSC) = ''
//                                     THEN
//                                        GET_OPR (A.NOM)
//                                     WHEN INSTR (DSC, ' ') > 0
//                                     THEN
//                                        replace(SUBSTR (DSC, 1, INSTR (DSC, ' ')),'+','_')
//                                     ELSE
//                                        replace(DSC,'+','_')
//                                  END)) || '.png'
//                                     IMG
//                             FROM L_DETAIL_PRICE_PLAN A,
//                                  (SELECT *
//                                     FROM T_NOM
//                                    WHERE NVL (IS_ACTIVE, 0) = 1) B
//                            WHERE     TRUNC (SYSDATE) BETWEEN TRUNC (start_date)
//                                                          AND TRUNC (end_date)
//                                  AND A.Kode_price_plan = ?
//                                  -- AND B.HASHTAG = ?
//                                  ".$tag."
//                                  AND A.NOM = B.NOM
//                                  AND upper(B.DSC) like upper(?)
//                                  AND   ( (   NVL (product_type, 'N') <> 'B'
//                                           OR (    NVL (product_type, 'N') = 'B'
//                                               AND a.nom NOT LIKE 'TAG%')))
//                                      )) A)
//            WHERE     Row_num >= ?
//                  AND Row_num <= ?
//         ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))";

   //  return $this->db->query($sql,[
   //                                (int)$data['level'],
   //                                (int)$data['level'],
   //                                (int)$data['level'],
   //                                (int)$data['level'],
   //                                $data['kode'],
   //                                $data['tag'],
   //                                '%'.$data['key'].'%',
   //                                $data['offset'],
   //                                $data['limit']])->result();

//    $sql = "SELECT *
//    FROM (SELECT ROW_NUMBER ()
//                    OVER (ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom)))
//                    AS ROW_NUM,
//                 A.*
//            FROM (SELECT Price,
//                         tag,
//                         nom,
//                         ket,
//                         harga,
//                         status,
//                         CASE
//                            WHEN TRIM (img) = 'PEMBAYARAN'
//                            THEN
//                               TRIM (img) || nom
//                            ELSE
//                               TRIM (img)
//                         END
//                            img,
//                         fee,
//                         discount
//                    FROM (SELECT get_myprice (?, ? , B.NOM) PRICE,
//                                    'Rp. '
//                                 || To_Rp (
//                                       get_myprice (?, ? , B.NOM))
//                                    DISCOUNT,
//                                    'Rp. '
//                                 || To_rp (
//                                       get_myfee (?, ? , B.NOM))
//                                    FEE,
//                                 B.HASHTAG TAG,
//                                 B.NOM,
//                                 B.DSC KET,
//                                    'Rp. '
//                                 || TO_RP ( get_myprice (?, ? , B.NOM) + get_myfee (?, ? , B.NOM) )
//                                 || Get_Tag_price (b.nom, ?)
//                                    HARGA,
//                                 CASE
//                                    WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
//                                    ELSE 'CLOSE'
//                                 END
//                                    STATUS,
//                                    TRIM (
//                                          'icon_'
//                                       || LOWER (
//                                             CASE
//                                                WHEN DSC IS NULL
//                                                THEN
//                                                   GET_OPR (B.NOM)
//                                                WHEN TRIM (DSC) = ''
//                                                THEN
//                                                   GET_OPR (B.NOM)
//                                                WHEN INSTR (DSC, ' ') > 0
//                                                THEN
//                                                   REPLACE (
//                                                      SUBSTR (DSC,
//                                                              1,
//                                                              INSTR (DSC, ' ')),
//                                                      '+',
//                                                      '_')
//                                                ELSE
//                                                   REPLACE (DSC, '+', '_')
//                                             END))
//                                 || '.png'
//                                    IMG
//                            FROM (SELECT *
//                                    FROM T_NOM
//                                   WHERE NVL (IS_ACTIVE, 0) = 1) B
//                           WHERE
//                           ".$prv."
//                           UPPER (B.DSC) LIKE UPPER (?)
//                                 AND ( (   NVL (product_type, 'N') <> 'B'
//                                        OR (    NVL (product_type, 'N') = 'B'
//                                            AND B.nom NOT LIKE 'TAG%'))))) A)
//   WHERE Row_num >= ? AND Row_num <= ?
// ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))";

$sql = "SELECT *
    FROM (SELECT ROW_NUMBER ()
                    OVER (ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom)))
                    AS ROW_NUM,
                 A.*
            FROM (SELECT Price,
                         tag,
                         nom,
                         ket,
                         harga,
                         status,
                         CASE
                            WHEN UPPER (SUBSTR (IMG, 0,4)) = 'HTTP'
                            THEN
                               IMG
                            ELSE
                                  ?
                               || 'icon_'||IMG||'.png'
                         END
                         IMG,
                         fee,
                         discount,
                         kode_provider,
                         short_dsc
                    FROM (SELECT get_myprice (?, ?, B.NOM)
                                    PRICE,
                                    'Rp. '
                                 || To_Rp (
                                       get_myprice (?,?, B.NOM))
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
                                         get_myprice (?, ?,  B.NOM)  + get_myfee (?,?, B.NOM))
                                 || Get_Tag_price (b.nom, ?)
                                    HARGA,
                                 CASE
                                    WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
                                    ELSE 'CLOSE'
                                 END
                                    STATUS,
                                    nvl(b.img_url,nvl(p.img_url,p.kode_provider))
                                    IMG,
                                    b.kode_provider,b.short_dsc
                            FROM l_detail_price_plan l,t_provider p,(SELECT *
                                    FROM T_NOM
                                   WHERE NVL (IS_ACTIVE, 0) = 1) B
                                   WHERE
                                   ".$prv."
                            l.nom = b.nom AND p.kode_provider = b.kode_provider AND UPPER (B.DSC) LIKE UPPER (?)
                                 AND ( (   NVL (product_type, 'N') <> 'B'
                                        OR (    NVL (product_type, 'N') = 'B'
                                            AND B.nom NOT LIKE 'TAG%'))))) A)
   WHERE Row_num >= ? AND Row_num <= ?
ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))    ";

   $this->st24apiv1->set_host(HOST_API_INTERNAL);
   $this->st24apiv1->is_debug(false);
   $this->st24apiv1->set_query($sql,[
   HOST_API_IMAGE.'get_img?file=',
   $data['uname'],$data['store_id'],
   $data['uname'],$data['store_id'],
   $data['uname'],$data['store_id'],
   $data['uname'],$data['store_id'],
   $data['uname'],$data['store_id'],
   $data['kode'],
   '%'.$data['key'].'%',
   $data['offset'],
   $data['limit']]);
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

}


?>
