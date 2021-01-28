<?php
class M_produk extends CI_Model{

  function getProduk(){
    // $sql = "SELECT DISTINCT opr, kode_provider FROM (SELECT CASE WHEN instr(a.dsc, ' ') = 0 THEN trim(a.dsc) else trim(substr(a.dsc,1, instr(a.dsc,' '))) end opr, kode_provider, a.nom, b.level_4 price
    //         FROM t_nom a, (SELECT * FROM l_detail_price_plan WHERE kode_price_plan = (SELECT val FROM t_param WHERE param_name = 'WEB_DEFAULT_PRICE_PLAN')) b
    //         WHERE a.nom = b.nom ORDER BY get_opr(nom), to_number(get_denom(nom)))
    //         ORDER BY opr, kode_provider";

    //return $this->db->query($sql)->result();

    $sql = "SELECT DISTINCT kode_provider FROM (SELECT CASE WHEN instr(a.dsc, ' ') = 0 THEN trim(a.dsc) else trim(substr(a.dsc,1, instr(a.dsc,' '))) end opr, kode_provider, a.nom, b.level_4 price
    FROM t_nom a, (SELECT * FROM l_detail_price_plan WHERE kode_price_plan = (SELECT val FROM t_param WHERE param_name = 'WEB_DEFAULT_PRICE_PLAN')) b
    WHERE a.nom = b.nom AND a.kode_provider is not null ORDER BY get_opr(nom), to_number(get_denom(nom)))
    ORDER BY kode_provider";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();

  }

  function getJenisProduk($kode_provider, $opr_name){
    // $sql = "SELECT * FROM (SELECT CASE WHEN instr(a.dsc, ' ') = 0 THEN trim(a.dsc) ELSE trim(substr(a.dsc,1, instr(a.dsc,' '))) end opr, a.nom, a.dsc, b.level_4 price, a.hashtag, b.FEE
    // from t_nom a, (SELECT * FROM l_detail_price_plan WHERE kode_price_plan = (SELECT val FROM t_param WHERE param_name = 'WEB_DEFAULT_PRICE_PLAN')) b
    // where a.nom = b.nom) WHERE opr = ? AND hashtag = ? AND NOM NOT LIKE 'TAG%' ORDER BY get_opr(nom), to_number(get_denom(nom))";
    //return $this->db->query($sql, [$kode_provider,$opr_name])->result();

    $sql = "SELECT * FROM (
      SELECT CASE
                WHEN INSTR (a.dsc, ' ') = 0 THEN TRIM (a.dsc)
                ELSE TRIM (SUBSTR (a.dsc, 1, INSTR (a.dsc, ' ')))
             END
                opr,
             a.kode_provider,
             a.opr_name,
             a.nom,
             b.level_4 price,
             a.hashtag, b.FEE,a.dsc,a.short_dsc
        FROM t_nom a,
             (SELECT *
                FROM l_detail_price_plan
               WHERE kode_price_plan =
                        (SELECT val
                           FROM t_param
                          WHERE param_name = 'WEB_DEFAULT_PRICE_PLAN')) b
       WHERE a.nom = b.nom AND a.kode_provider =? AND OPR_NAME = ? AND A.NOM NOT LIKE 'TAG%' AND A.NOM NOT LIKE 'CEKPLN%'
      ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom))
      )";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[$kode_provider,$opr_name]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  function getTitleProduk($kode_provider){
    // $sql = "SELECT distinct OPR FROM (select * from (
    // Select case when instr(a.dsc, ' ') = 0 then trim(a.dsc) else trim(substr(a.dsc,1, instr(a.dsc,' '))) end opr, a.nom, a.dsc, b.level_4 price, a.hashtag
    // from t_nom a, (select * from l_detail_price_plan where kode_price_plan = (select val from t_param where param_name = 'WEB_DEFAULT_PRICE_PLAN')) b
    // where a.nom = b.nom
    // )
    // where opr = ?
    // order by get_opr(nom), to_number(get_denom(nom)))";
    // return $this->db->query($sql, $data['oper'])->result();

    $sql = "SELECT DISTINCT OPR_NAME, case when substr(upper(img_file_name),1,4) = 'HTTP' then img_file_name else ? ||img_file_name  end img_file_name
            FROM (  SELECT CASE
                              WHEN INSTR (a.dsc, ' ') = 0 THEN TRIM (a.dsc)
                              ELSE TRIM (SUBSTR (a.dsc, 1, INSTR (a.dsc, ' ')))
                           END
                              opr,
                           a.kode_provider,
                           a.opr_name,
                           a.nom,
                           b.level_4 price,
                           nvl(c.img_url, ('icon_'||LOWER(c.kode_provider)||'.png')) img_file_name
                      FROM t_nom a,
                           (SELECT *
                              FROM l_detail_price_plan
                             WHERE kode_price_plan =
                                      (SELECT val
                                         FROM t_param
                                        WHERE param_name = 'WEB_DEFAULT_PRICE_PLAN')) b,
                           t_provider c
                     WHERE     a.nom = b.nom
                           AND a.KODE_PROVIDER = c.kode_provider
                           AND a.kode_provider = ?
                  ORDER BY get_opr (nom), TO_NUMBER (get_denom (nom)))";

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->is_debug(false);
    $this->st24apiv1->set_query($sql,[HOST_API_IMAGE."get_img?file=",$kode_provider]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }


}
