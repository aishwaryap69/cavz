<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Master_m extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->user = get_userdata("self_pro_loggedin");
        $this->load->library("pagination");
    }
    public function category_submit($data, $id)
    {
        if ($id == "") {
            $this->db->insert('category', $data);
        } else {
            $this->db->where('cat_id', $id);
            $this->db->update('category', $data);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    public function getRecordcategory($rowno, $rowperpage, $data = [])
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by("cat_id", "desc");
        if (isset($data['keyword']) && $data['keyword'] != "") {
            $this->db->where('cat_name', $data['keyword']);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getRecord_categoryCount($data = [])
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('category');
        $this->db->order_by("cat_id", "desc");
        if (isset($data['keyword']) && $data['keyword'] != "") {
            $this->db->where('cat_name', $data['keyword']);
        }
        $this->db->order_by("cat_id", "desc");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }
    public function delete_category($id)
    {
        $this->db->where('cat_id', $id);
        $query = $this->db->delete('category');
        return $query;
    }
    public function edit_category($id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('cat_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
        } else {
            $data = array();
        }
        return $data;
    }
}
