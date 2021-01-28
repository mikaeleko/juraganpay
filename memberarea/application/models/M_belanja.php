<?php
Class M_belanja extends CI_Model {


  public function view_icon($data){
    $sql = "SELECT distinct hashtag name from t_nom where hashtag is not null";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  public function kategori_produk_by_hashtag($hashtag,$kode_price_plan){
    $sql = "SELECT tt.*,CASE
            WHEN UPPER (SUBSTR (NVL(tt.img_url,NVL (p.img_url, p.kode_provider)), 0, 4)) =
                    'HTTP'
            THEN
               NVL(tt.img_url,NVL (p.img_url, p.kode_provider))
            ELSE
                  ?
               || 'icon_'
               || LOWER (NVL(tt.img_url,NVL (p.img_url, p.kode_provider)))
               || '.png'
         END
            IMG
        FROM (SELECT DISTINCT kode_provider, kode_price_plan,img_url
          FROM (SELECT
                      TRIM(t.kode_provider) kode_provider, l.kode_price_plan,t.img_url
              FROM t_nom t,l_detail_price_plan l
              WHERE t.hashtag = ? AND t.nom = l.nom AND t.is_active = 1 AND t.nom not like 'TAG%' AND t.nom not like 'CEK%')
              WHERE kode_price_plan = get_my_price_plan(?, ?)
          ORDER BY kode_provider) tt,t_provider p
        WHERE p.kode_provider = tt.kode_provider ORDER BY p.kode_provider ASC";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[HOST_API_IMAGE.'get_img?file=',$hashtag,$this->session->userdata('username'),$this->session->userdata('store_id')]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }





  public function cariprodukbyprefix($data) {
        $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
                case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
                from
                (
                SELECT nom, denom, dsc, short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
                FROM (  SELECT a.*, get_myprice(?, ?, a.nom) price
                        FROM (SELECT DISTINCT
                                    t.opr_name,
                                    t.nom,
                                    t.img_url,
                                    t.short_dsc,
                                    t.is_active,
                                    trim(to_rp(get_denom (nom) * 1000)) denom,
                                    t.dsc,
                                    t.hashtag,
                                        'icon_'
                                    || case when INSTR (t.kode_provider, ' ') <= 0 then Lower (t.kode_provider) else LOWER (SUBSTR (t.kode_provider, 1, INSTR (t.kode_provider, ' ') - 1)) end
                                    || '.png'
                                        img_file_name,
                                    TRIM (REGEXP_SUBSTR (nvl(p.prefix_list,t.prefix_list),
                                                          '[^,]+',
                                                          1,
                                                          levels.COLUMN_VALUE))
                                        AS prefix
                                FROM t_nom t, t_provider p,
                                TABLE (
                                        CAST (
                                          MULTISET (
                                                  SELECT LEVEL
                                                    FROM DUAL
                                              CONNECT BY LEVEL <=
                                                              LENGTH (
                                                                REGEXP_REPLACE (
                                                                    nvl(p.prefix_list,t.prefix_list),
                                                                    '[^,]+'))
                                                            + 1) AS SYS.OdciNumberList)) levels where t.kode_provider = p.kode_provider(+)) a,
                                                            t_store_user b, l_detail_price_plan c
                      WHERE     a.prefix IS NOT NULL
                            AND NVL (a.is_active, 0) = 1
                            AND b.store_id = ?
                            AND b.user_name = ?
                            AND prefix = ?
                            AND a.HASHTAG = ?
                            and a.nom = c.nom
                            and c.kode_price_plan = get_my_price_plan(?, ?)
                   ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom)))
                   GROUP BY nom, denom, dsc, short_dsc, opr_name, price, img_file_name, nvl(img_url, img_file_name)
                   ORDER BY opr_name, price ASC)";

    // return $this->db->query($sql,
    //                         [$data['store_id'],
    //                         $data['uname'],
    //                         $data['prefix'],
    //                         $data['hashtag']]
    //                         )->result();

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->is_debug(false);
      $this->st24apiv1->set_query($sql,
      [
      HOST_API_IMAGE.'get_img?file=',
      $data['uname'],
      $data['store_id'],
      $data['store_id'],
      $data['uname'],
      $data['prefix'],
      $data['hashtag'],
      $data['uname'],
      $data['store_id']
    ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }



  public function cariprodukpaketdatabyprefix($data) {
    $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
            case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
            from
            (
            SELECT nom, denom, dsc, short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
            FROM (  SELECT a.*, get_myprice(?, ?, a.nom) price
                    FROM (SELECT DISTINCT
                                t.opr_name,
                                t.nom,
                                t.img_url,
                                t.short_dsc,
                                t.is_active,
                                trim(to_rp(get_denom (nom) * 1000)) denom,
                                t.dsc,
                                t.hashtag,
                                    'icon_'
                                || case when INSTR (t.kode_provider, ' ') <= 0 then Lower (t.kode_provider) else LOWER (SUBSTR (t.kode_provider, 1, INSTR (t.kode_provider, ' ') - 1)) end
                                || '.png'
                                    img_file_name,
                                TRIM (REGEXP_SUBSTR (nvl(p.prefix_list,t.prefix_list),
                                                      '[^,]+',
                                                      1,
                                                      levels.COLUMN_VALUE))
                                    AS prefix
                            FROM t_nom t, t_provider p,
                            TABLE (
                                    CAST (
                                      MULTISET (
                                              SELECT LEVEL
                                                FROM DUAL
                                          CONNECT BY LEVEL <=
                                                          LENGTH (
                                                            REGEXP_REPLACE (
                                                                nvl(p.prefix_list,t.prefix_list),
                                                                '[^,]+'))
                                                        + 1) AS SYS.OdciNumberList)) levels where t.kode_provider = p.kode_provider(+)) a,
                                                        t_store_user b, l_detail_price_plan c
                  WHERE     a.prefix IS NOT NULL
                        AND NVL (a.is_active, 0) = 1
                        AND b.store_id = ?
                        AND b.user_name = ?
                        AND prefix = ?
                        AND a.HASHTAG = ?
                        and a.nom = c.nom
                        and c.kode_price_plan = get_my_price_plan(?,?)et_my_price_plan(?,?)
                ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom)))
               GROUP BY nom, denom, dsc, short_dsc, opr_name, price, img_file_name, nvl(img_url, img_file_name)
               ORDER BY opr_name, price ASC)";

    //return $this->db->query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]])->result();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,
    [
    HOST_API_IMAGE.'get_img?file=',
    $data['uname'],
    $data['store_id'],
    $data['store_id'],
    $data['uname'],
    $data['prefix'],
    $data['hashtag'],
    $data['uname'],
    $data['store_id']
  ]);
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
      $data['storeid']
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




  // public function detailprodukbyNom($data) {
  //   $sql = "SELECT a.*, c.level_4 price
  //   FROM (SELECT DISTINCT
  //
  //                t.nom,
  //                t.is_active,
  //                trim(to_rp (get_denom (nom) * 1000)) denom,
  //                t.dsc,
  //                t.hashtag,
  //                   'icon_'
  //                || LOWER (SUBSTR (dsc, 1, INSTR (dsc, ' ') - 1))
  //                || '.png'
  //                   img_file_name,
  //                TRIM (REGEXP_SUBSTR (t.prefix_list,
  //                                     '[^,]+',
  //                                     1,
  //                                     levels.COLUMN_VALUE))
  //                   AS prefix
  //                     FROM t_nom t,
  //                         TABLE (
  //                             CAST (
  //                               MULTISET (
  //                                       SELECT LEVEL
  //                                         FROM DUAL
  //                                   CONNECT BY LEVEL <=
  //                                                   LENGTH (
  //                                                     REGEXP_REPLACE (
  //                                                         t.prefix_list,
  //                                                         '[^,]+'))
  //                                                 + 1) AS SYS.OdciNumberList)) levels) a,
  //                 t_store_user b,
  //                 l_detail_price_plan c
  //           WHERE  a.prefix IS NOT NULL
  //                 AND NVL (a.is_active, 0) = 1
  //                 AND a.nom = c.nom
  //                 AND b.kode_price_plan = get_my_price_plan(?,?).kode_price_plan
  //                 AND b.store_id = ?
  //                 AND b.user_name = ?
  //                 AND prefix = ?
  //                 AND a.denom = ?
  //                 AND a.HASHTAG = ?
  //         ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom))";
  //
  //   //return $this->db->query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]])->result();
  //
  //   $this->st24apiv1->set_host(HOST_API_INTERNAL);
  //   $this->st24apiv1->set_query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]]);
  //   $this->st24apiv1->set_secret(API_SECRET);
  //   $this->st24apiv1->run();
  //   return $this->st24apiv1->result();
  // }


  public function cari_produk_by_hashtagg($data){
    $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
                case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
                from
                (
                SELECT nom, denom, dsc, short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
                FROM (  SELECT a.*, get_myprice(?, ?, a.nom) price
                        FROM (SELECT DISTINCT
                                    t.opr_name,
                                    t.kode_provider,
                                    t.nom,
                                    t.img_url,
                                    t.short_dsc,
                                    t.is_active,
                                    trim(to_rp(get_denom (nom) * 1000)) denom,
                                    t.dsc,
                                    t.hashtag,
                                        'icon_'
                                    || case when INSTR (t.kode_provider, ' ') <= 0 then Lower (t.kode_provider) else LOWER (SUBSTR (t.kode_provider, 1, INSTR (t.kode_provider, ' ') - 1)) end
                                    || '.png'
                                        img_file_name
                                FROM t_nom t, t_provider p
                                where t.kode_provider = p.kode_provider(+)  ) a,
                                                            t_store_user b, l_detail_price_plan c
                      WHERE     NVL (a.is_active, 0) = 1
                            AND b.store_id = ?
                            AND b.user_name = ?
                            AND a.HASHTAG = ?
                            AND a.kode_provider = ?
                            and a.nom = c.nom
                            and c.kode_price_plan = get_my_price_plan(?,?)et_my_price_plan(?, ?)
                    ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom)))
                   GROUP BY nom, denom, dsc, short_dsc, opr_name, price, img_file_name, nvl(img_url, img_file_name)
                   ORDER BY opr_name, price ASC)";

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->is_debug(false);
      $this->st24apiv1->set_query($sql,[
                                          HOST_API_IMAGE.'get_img?file=',
                                          $data['uname'],
                                          $data['store_id'],
                                          $data['store_id'],
                                          $data['uname'],
                                          $data['hashtag'],
                                          $data['kdProv'],
                                          $data['uname'],
                                          $data['store_id']
                                      ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }



  public function cari_produk_by_hashtag($data){
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
                         img,
                         fee,
                         discount
                    FROM (SELECT get_myprice (?, ?, A.NOM) Price,
                                 'Rp. ' || To_Rp (0) DISCOUNT,
                                    'Rp. '
                                 || To_rp (
                                       NVL (
                                          get_myfee (?, ?, A.NOM),
                                          0))
                                    FEE,
                                 B.HASHTAG TAG,
                                 A.NOM,
                                 B.DSC KET,
                                    'Rp. '
                                 || TO_RP (
                                         get_myprice (?, ?, A.NOM)
                                       + NVL (
                                            get_myfee (?, ?, A.NOM),
                                            0))
                                    HARGA,
                                 CASE
                                    WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
                                    ELSE 'CLOSE'
                                 END
                                    STATUS,
                                 CASE
                                    WHEN UPPER (
                                            SUBSTR (
                                               NVL (
                                                  B.IMG_URL,
                                                  NVL (P.IMG_URL,
                                                       P.KODE_PROVIDER)),
                                               0,
                                               4)) = 'HTTP'
                                    THEN
                                       NVL (B.IMG_URL,
                                            NVL (P.IMG_URL, P.KODE_PROVIDER))
                                    ELSE
                                          ?
                                       || 'icon_'
                                       || LOWER (
                                             NVL (
                                                B.IMG_URL,
                                                NVL (P.IMG_URL,
                                                     P.KODE_PROVIDER)))
                                       || '.png'
                                 END
                                    IMG
                            FROM L_DETAIL_PRICE_PLAN A,
                                 T_PROVIDER P,
                                 (SELECT *
                                    FROM T_NOM
                                   WHERE NVL (IS_ACTIVE, 0) = 1) B
                           WHERE     TRUNC (SYSDATE) BETWEEN TRUNC (start_date)
                                                         AND TRUNC (end_date)
                                 AND A.Kode_price_plan = get_my_price_plan(?,?)
                                 AND B.HASHTAG = ?
                                 AND p.KODE_PROVIDER = ?
                                 AND A.NOM = B.NOM
                                 AND a.nom NOT LIKE 'TAG%'
                                 AND a.nom NOT LIKE 'CEK%'
                                 AND P.KODE_PROVIDER = B.KODE_PROVIDER
                                 AND ( (   NVL (product_type, 'N') <> 'B'
                                        OR (NVL (product_type, 'N') = 'B'))))) A)
ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))";
      // return $this->db->query($sql,[
      //   (int)$data['level'],
      //   (int)$data['level'],
      //   (int)$data['level'],
      //   $data['kode_price_plan'],
      //   $data['hashtag']
      //   ])->result();

      $keyword = empty($data['keyword'])?'':$data['keyword'];

      $this->st24apiv1->set_host(HOST_API_INTERNAL);
      $this->st24apiv1->is_debug(false);
      $this->st24apiv1->set_query($sql,[
        $data['username'],
        $data['store_id'],
        $data['username'],
        $data['store_id'],
        $data['username'],
        $data['store_id'],
        $data['username'],
        $data['store_id'],
        HOST_API.'get_img?file=',
        $data['username'],
        $data['store_id'],
        $data['hashtag'],
        $data['kode_provider']
        ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }




  public function view_token($data){
    $sql = "SELECT kode_provider,
       CASE
          WHEN SUBSTR (UPPER (img_file_name), 1, 4) = 'HTTP'
          THEN
             img_file_name
          ELSE
             ? || img_file_name
       END
          img_file_name
       FROM (SELECT DISTINCT
               kode_provider,
                  'icon_'
               || CASE
                     WHEN INSTR (kode_provider, ' ') <= 0
                     THEN
                        LOWER (kode_provider)
                     ELSE
                        LOWER (
                           SUBSTR (kode_provider,
                                   1,
                                   INSTR (kode_provider, ' ') - 1))
                  END
               || '.png'
                  img_file_name
          FROM t_nom
         WHERE hashtag = ? AND kode_provider IS NOT NULL)";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,
                                    [
                                      HOST_API_IMAGE.'get_img?file=',
                                      $data['hashtag']
                                    ]
                                );
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }



  public function view_detail_token($data){
    $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
                case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
                from
                (
                SELECT nom, denom, dsc, short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
                FROM (  SELECT a.*, get_myprice(?, ?, a.nom) price
                        FROM (SELECT DISTINCT
                                    t.opr_name,
                                    t.kode_provider,
                                    t.nom,
                                    t.img_url,
                                    t.short_dsc,
                                    t.is_active,
                                    trim(to_rp(get_denom (nom) * 1000)) denom,
                                    t.dsc,
                                    t.hashtag,
                                        'icon_'
                                    || case when INSTR (t.kode_provider, ' ') <= 0 then Lower (t.kode_provider) else LOWER (SUBSTR (t.kode_provider, 1, INSTR (t.kode_provider, ' ') - 1)) end
                                    || '.png'
                                        img_file_name
                                FROM t_nom t, t_provider p
                                where t.kode_provider = p.kode_provider(+)  ) a,
                                                            t_store_user b, l_detail_price_plan c
                      WHERE     NVL (a.is_active, 0) = 1
                            AND b.store_id = ?
                            AND b.user_name = ?
                            AND a.HASHTAG = ?
                            AND a.kode_provider = ?
                            and a.nom = c.nom
                            and c.kode_price_plan = get_my_price_plan(?, ?)
                    ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom)))
                   GROUP BY nom, denom, dsc, short_dsc, opr_name, price, img_file_name, nvl(img_url, img_file_name)
                   ORDER BY opr_name, price ASC)";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,
              [
                HOST_API_IMAGE.'get_img?file=',
                $data['uname'],
                $data['store_id'],
                $data['store_id'],
                $data['uname'],
                $data['hashtag'],
                $data['kdProv'],
                $data['uname'],
                $data['store_id']
              ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }



  public function view_emoney($data){
    $sql = "SELECT kode_provider,
       CASE
          WHEN SUBSTR (UPPER (img_file_name), 1, 4) = 'HTTP'
          THEN
             img_file_name
          ELSE
             ? || img_file_name
       END
          img_file_name
       FROM (SELECT DISTINCT
               kode_provider,
                  'icon_'
               || CASE
                     WHEN INSTR (kode_provider, ' ') <= 0
                     THEN
                        LOWER (kode_provider)
                     ELSE
                        LOWER (
                           SUBSTR (kode_provider,
                                   1,
                                   INSTR (kode_provider, ' ') - 1))
                  END
               || '.png'
                  img_file_name
          FROM t_nom
         WHERE hashtag = ? AND kode_provider IS NOT NULL)";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,
                                    [
                                      HOST_API_IMAGE.'get_img?file=',
                                      $data['hashtag']
                                    ]
                                );
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }




  public function view_detail_emoney($data){
    $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
                case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
                from
                (
                SELECT nom, denom, dsc, short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
                FROM (  SELECT a.*, get_myprice(?, ?, a.nom) price
                        FROM (SELECT DISTINCT
                                    t.opr_name,
                                    t.kode_provider,
                                    t.nom,
                                    t.img_url,
                                    t.short_dsc,
                                    t.is_active,
                                    trim(to_rp(get_denom (nom) * 1000)) denom,
                                    t.dsc,
                                    t.hashtag,
                                        'icon_'
                                    || case when INSTR (t.kode_provider, ' ') <= 0 then Lower (t.kode_provider) else LOWER (SUBSTR (t.kode_provider, 1, INSTR (t.kode_provider, ' ') - 1)) end
                                    || '.png'
                                        img_file_name
                                FROM t_nom t, t_provider p
                                where t.kode_provider = p.kode_provider(+)  ) a,
                                                            t_store_user b, l_detail_price_plan c
                      WHERE     NVL (a.is_active, 0) = 1
                            AND b.store_id = ?
                            AND b.user_name = ?
                            AND a.HASHTAG = ?
                            AND a.kode_provider = ?
                            and a.nom = c.nom
                            and c.kode_price_plan = get_my_price_plan(?, ?)
                    ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom)))
                   GROUP BY nom, denom, dsc, short_dsc, opr_name, price, img_file_name, nvl(img_url, img_file_name)
                   ORDER BY opr_name, price ASC)";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,
                                    [
                                      HOST_API_IMAGE.'get_img?file=',
                                      $data['uname'],
                                      $data['store_id'],
                                      $data['store_id'],
                                      $data['uname'],
                                      $data['hashtag'],
                                      $data['kdProv'],
                                      $data['uname'],
                                      $data['store_id']
                                    ]
                                );
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }


}


?>
