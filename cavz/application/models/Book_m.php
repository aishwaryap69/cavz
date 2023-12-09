<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Book_m extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
    $this->user = get_userdata("self_pro_loggedin");
    $this->load->library("pagination");
  }
  public function get_category()
  {
    $this->db->select('cat_id,cat_name');
    $this->db->from('category');
    $query = $this->db->get();
    return  $query->result();
  }
  public function getbook_details($id)
  {
    $this->db->select('book.*,category.cat_id,category.cat_name,users.uid,users.name');
    $this->db->from('book');
    $this->db->join("category", "category.cat_id=book.book_category");
    $this->db->join("users", "users.uid=book.book_created_by");
    $this->db->where("book.book_id", $id);
    $query = $this->db->get();
    return  $query->result();
  }
  public function insertbook($data)
  {
    $this->db->insert("book", $data);
    return $this->db->insert_id();
  }
  public function updatebook($id, $data)
  {
    $this->db->where('book_id', $id);
    $this->db->update('book', $data);
  }
  public function getRecordbook($rowno, $rowperpage, $data = [])
  {
    $this->db->select('book.*,category.cat_id,category.cat_name,users.uid,users.name');
    $this->db->from('book');
    $this->db->join("category", "category.cat_id=book.book_category");
    $this->db->join("users", "users.uid=book.book_created_by");
    $this->db->order_by("book.book_id", "desc");
    if (isset($data['keyword']) && $data['keyword'] != "") {
      $this->db->like('book.book_title', $data['keyword']);
      $this->db->or_like("book.book_author", $data['keyword']);
    }
    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getRecord_bookCount($data = [])
  {
    $this->db->select('count(*) as allcount');
    $this->db->from('book');
    $this->db->join("category", "category.cat_id=book.book_category");
    $this->db->join("users", "users.uid=book.book_created_by");

    if (isset($data['keyword']) && $data['keyword'] != "") {
      $this->db->like('book.book_title', $data['keyword']);
      $this->db->or_like("book.book_author", $data['keyword']);
    }
    $this->db->order_by("book.book_id", "desc");
    $query = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }
}
