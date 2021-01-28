<?php
Class M_belanja extends CI_Model {


  public function cariprodukbyprefix($data) {
        $sql = "SELECT nom, denom, dsc, short_dsc, price, opr_name,
                case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? || img_file_name end img_file_name
                from
                (
                SELECT nom, denom, dsc, short_dsc || ' (' || nom || ')' short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
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
                                    || LOWER (SUBSTR (opr_name, 1, INSTR (opr_name, ' ') - 1))
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
            SELECT nom, denom, dsc, short_dsc || ' (' || nom || ')' short_dsc, price, opr_name, nvl(img_url, img_file_name) img_file_name
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
                                || LOWER (SUBSTR (opr_name, 1, INSTR (opr_name, ' ') - 1))
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
                        and c.kode_price_plan = get_my_price_plan(?,?)
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


  public function detailprodukbyNom($data) {
    $sql = "SELECT a.*, c.level_4 price
    FROM (SELECT DISTINCT

                 t.nom,
                 t.is_active,
                 trim(to_rp (get_denom (nom) * 1000)) denom,
                 t.dsc,
                 t.hashtag,
                    'icon_'
                 || LOWER (SUBSTR (dsc, 1, INSTR (dsc, ' ') - 1))
                 || '.png'
                    img_file_name,
                 TRIM (REGEXP_SUBSTR (t.prefix_list,
                                      '[^,]+',
                                      1,
                                      levels.COLUMN_VALUE))
                    AS prefix
                      FROM t_nom t,
                          TABLE (
                              CAST (
                                MULTISET (
                                        SELECT LEVEL
                                          FROM DUAL
                                    CONNECT BY LEVEL <=
                                                    LENGTH (
                                                      REGEXP_REPLACE (
                                                          t.prefix_list,
                                                          '[^,]+'))
                                                  + 1) AS SYS.OdciNumberList)) levels) a,
                  t_store_user b,
                  l_detail_price_plan c
            WHERE  a.prefix IS NOT NULL
                  AND NVL (a.is_active, 0) = 1
                  AND a.nom = c.nom
                  AND b.kode_price_plan = c.kode_price_plan
                  AND b.store_id = ?
                  AND b.user_name = ?
                  AND prefix = ?
                  AND a.denom = ?
                  AND a.HASHTAG = ?
          ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom))";

    //return $this->db->query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]])->result();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }


  public function cariprodukpaketdatabyprefixOLD($data) {
    $sql = "SELECT a.*, c.level_4 price
    FROM (SELECT DISTINCT
                 t.nom,
                 t.is_active,
                 trim(to_rp (get_denom (nom) * 1000)) denom,
                 t.dsc,
                 t.hashtag,
                    'icon_'
                 || LOWER (SUBSTR (dsc, 1, INSTR (dsc, ' ') - 1))
                 || '.png'
                    img_file_name,
                 TRIM (REGEXP_SUBSTR (t.prefix_list,
                                      '[^,]+',
                                      1,
                                      levels.COLUMN_VALUE))
                    AS prefix
                      FROM t_nom t,
                          TABLE (
                              CAST (
                                MULTISET (
                                        SELECT LEVEL
                                          FROM DUAL
                                    CONNECT BY LEVEL <=
                                                    LENGTH (
                                                      REGEXP_REPLACE (
                                                          t.prefix_list,
                                                          '[^,]+'))
                                                  + 1) AS SYS.OdciNumberList)) levels) a,
                  t_store_user b,
                  l_detail_price_plan c
            WHERE  a.prefix IS NOT NULL
                  AND NVL (a.is_active, 0) = 1
                  AND a.nom = c.nom
                  AND b.kode_price_plan = c.kode_price_plan
                  AND b.store_id = ?
                  AND b.user_name = ?
                  AND prefix = ?
                  AND a.HASHTAG = ?
          ORDER BY get_opr (a.nom), TO_NUMBER (get_denom (a.nom))";

    //return $this->db->query($sql,[$data['store_id'],$data['uname'],$data['prefix'], $data["nom"], $data["hashtag"]])->result();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[$data['store_id'],$data['uname'],$data['prefix'],  $data["hashtag"]]);
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
                              CASE
                                  WHEN TRIM (img) = 'PEMBAYARAN'
                                  THEN
                                    TRIM (img) || nom
                                  ELSE
                                    TRIM (img)
                              END
                                  img,
                              fee,
                              discount
                          FROM (SELECT NVL (Level_?, level_4) Price,
                                      'Rp. ' || To_Rp (NVL (Level_?, NVL (level_4, 0)))
                                          DISCOUNT,
                                      'Rp. ' || To_rp (NVL (A.Fee, 0)) FEE,
                                      B.HASHTAG TAG,
                                      A.NOM,
                                      B.DSC KET,
                                          'Rp. '
                                      || TO_RP (
                                            NVL (Level_?, level_4) + (NVL (fee, 0)))
                                      || Get_Tag_price (a.nom, 2)
                                          HARGA,
                                      CASE
                                          WHEN NVL (B.IS_ACTIVE, 0) = 1 THEN 'OPEN'
                                          ELSE 'CLOSE'
                                      END
                                          STATUS,
                                          TRIM (
                                                'icon_'
                                            || LOWER (
                                                  CASE
                                                      WHEN DSC IS NULL
                                                      THEN
                                                        GET_OPR (A.NOM)
                                                      WHEN TRIM (DSC) = ''
                                                      THEN
                                                        GET_OPR (A.NOM)
                                                      WHEN INSTR (DSC, ' ') > 0
                                                      THEN
                                                        REPLACE (
                                                            SUBSTR (DSC,
                                                                    1,
                                                                    INSTR (DSC, ' ')),
                                                            '+',
                                                            '_')
                                                      ELSE
                                                        REPLACE (DSC, '+', '_')
                                                  END))
                                      || '.png'
                                          IMG
                                  FROM L_DETAIL_PRICE_PLAN A,
                                      (SELECT *
                                          FROM T_NOM
                                        WHERE NVL (IS_ACTIVE, 0) = 1) B
                                WHERE     TRUNC (SYSDATE) BETWEEN TRUNC (start_date)
                                                              AND TRUNC (end_date)
                                      AND A.Kode_price_plan = ?
                                      AND B.HASHTAG = ?
                                      AND B.DSC like ?
                                      AND A.NOM = B.NOM
                                      AND ( (   NVL (product_type, 'N') <> 'B'
                                              OR (    NVL (product_type, 'N') = 'B'
                                                  AND a.nom NOT LIKE 'TAG%'))))) A)
        --WHERE Row_num >= 1 AND Row_num <= 40
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
        (int)$data['level'],
        (int)$data['level'],
        (int)$data['level'],
        $data['kode_price_plan'],
        $data['hashtag'],
        $keyword.'%'
        ]);
      $this->st24apiv1->set_secret(API_SECRET);
      $this->st24apiv1->run();
      return $this->st24apiv1->result();
  }

  public function kategori_produk_by_hashtag($hashtag){
    $sql = "SELECT DISTINCT name
    FROM (SELECT CASE
                    WHEN INSTR (dsc, ' ') <> 0
                    THEN
                       SUBSTR (dsc, 0, INSTR (dsc, ' '))
                    ELSE
                       dsc
                 END
                    NAME
            FROM t_nom
           WHERE hashtag = ?)
    ORDER BY name";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[$hashtag]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }


}


?>
