<?php

class M_products extends CI_Model {

  // public function get_product(){
  //     $query = "SELECT a.product_id, a.product_name, a.description, a.time_start, a.product_condition, a.weight, b.product_category_name,
  //               a.brand, a.price, a.discount, a.product_variant_id, a.image1, a.image2, a.image3, a.image4, a.viewer, a.stock
  //               FROM products a JOIN product_categories b ON a.product_category_id = b.product_category_id
  //               ORDER BY a.product_id DESC";
  //
  //     $this->st24apiv1->set_host(HOST_API_INTERNAL);
  //     $this->st24apiv1->set_query($query);
  //     $this->st24apiv1->set_secret(API_SECRET);
  //     $this->st24apiv1->run();
  //     return $this->st24apiv1->result();
  // }

    public function get_product(){
        $query = "SELECT a.product_id, a.product_name, a.description, a.time_start, a.product_condition, a.weight,
                  b.product_category_name, a.brand, a.price, a.discount, a.product_variant_id, a.image1, a.image2,
                  a.image3, a.image4, a.viewer, a.stock FROM products a JOIN product_categories b
                  ON a.product_category_id = b.product_category_id
                  ORDER BY a.product_id DESC";
        return $this->db->query($query)->result();
    }


    public function get_product_by_id($id){
      $query = "SELECT product_id, product_name, description, time_start, product_condition, weight, product_category_id,parent_category_id,  brand, price,
                discount, product_variant_id, image1, image2, image3, image4, viewer, stock FROM products
                WHERE product_id = ? ";
      return $this->db->query($query,[$id])->result();
    }

    public function get_image_by_id($id){
      $query = "SELECT image1, image2, image3, image4 FROM products
                WHERE product_id = ? ";
      return $this->db->query($query,[$id])->row();
    }


    public function detail_product_by_id($product_id){
      $query = "SELECT P.product_id, P.product_name, P.description, P.time_start, P.product_condition, P.weight, P.parent_category_id,
                C.product_category_name, P.brand, P.price, P.discount, P.product_variant_id, P.image1, P.image2, P.image3, P.image4,
                P.viewer FROM products P JOIN product_categories C ON P.product_category_id = C.product_category_id
                WHERE P.product_id = ? ";
      return $this->db->query($query,[$product_id]);
    }


    function get_product_by_category($category_id){
      $query = "SELECT product_id, product_name, description, time_start, product_condition, weight, product_category_name, brand, price,
                discount, product_variant_id, image1, image2, image3, image4, viewer FROM products p
                JOIN product_categories c ON p.product_category_id = c.product_category_id
                WHERE p.product_category_id = ? ORDER BY p.product_id DESC";
      return $this->db->query($query,[$category_id]);
    }

    // public function get_category_by_id($product_category_id){
    //   $query = "SELECT * FROM `product_categories` WHERE product_category_id = ? ORDER BY product_category_id DESC";
    //   return $this->db->query($query,[$product_category_id]);
    // }

    function get_list_category($category_id){
      $query = "SELECT product_category_id, product_category_name FROM `product_categories` WHERE parent_category_id = ? ORDER BY product_category_id DESC";
      return $this->db->query($query,[$category_id]);
    }

    public function get_related($parent_id){
        $query = "SELECT * FROM `products` WHERE parent_category_id = ? ";
        return $this->db->query($query,[$parent_id]);
    }

    public function get_news_product($offset){
        $query = "SELECT * FROM banner b LEFT JOIN banner_type bt ON bt.banner_type_id = b.banner_type_id WHERE bt.type = 'NEWS PRODUCT' ORDER BY b.banner_id ASC LIMIT 1 OFFSET ?";
        return $product = $this->db->query($query,[(int) $offset])->result();
    }

    public function update_product($id,$data){
      $this->db->where('product_id', $id);
      $this->db->update('products', $data);
      return $this->db->affected_rows();
    }
}
