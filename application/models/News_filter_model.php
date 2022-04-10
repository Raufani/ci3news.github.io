<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_filter_model extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->like('id', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('reporter_name', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('id_news', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get('report')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('ci_news'); // Untuk menghitung semua data siswa
  }
  public function count_filter($search){
    $this->db->like('id', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('reporter_name', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('id_news', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get('reporter')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function count_all_en_lang(){
    $this->db->where('ne_lang', 'en');
    return $this->db->count_all_results('admin');
  }
}