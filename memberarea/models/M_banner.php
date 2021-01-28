<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_banner extends CI_Model {

  // function __construct(){
  //   parent::__construct();
  // }

  public function view(){
    return $this->db->get('T_BANNER')->result();
  }


  public function view_by($rowid){
    $this->db->where('rowid', $rowid);
    return $this->db->get('T_BANNER')->row();
  }


  public function validation($mode){
    $this->load->library('form_validation');

    if($mode == "save")
      $this->form_validation->set_rules('url', 'required');
      $this->form_validation->set_rules('illustration', 'illsutration', 'required|max_length[50]');

    if($this->form_validation->run())
      return TRUE;
    else
      return FALSE;
  }


  public function save(){
    $data = array(
      "nis" => $this->input->post('url'),
      "url" => $this->input->post('url'),
      "illustration" => $this->input->post('illustration')

    );
    $this->db->insert('banner', $data);
  }


  public function edit($rowid){
    $data = array(
      "url" => $this->input->post('url'),
      "illustration" => $this->input->post('illustration'),
    );

    $this->db->where('rowid', $rowid);
    $this->db->update('banner', $data);
  }


  public function delete($rowid){
    $this->db->where('rowid', $rowid);
    $this->db->delete('banner');
  }

  public function list_banner($data) {
    $sql = "SELECT * FROM T_BANNER ORDER BY IMG_NAME";

    return $this->db->query($sql)->result();
  }

}
?>
