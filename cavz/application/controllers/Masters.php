<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Masters extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Master_m", "", TRUE);
		$this->load->library('form_validation');
		$this->user = get_userdata("self_pro_loggedin");
	}
	public function index()
	{
		if ($this->user) {
			$this->load->view('category');
		} else {
			redirect("Login");
		}
	}
	public function getcategory()
	{
		$data = $this->Master_m->getcategory();
		echo json_encode($data);
	}
	public function category_submit()
	{
		$ts = date('Y-m-d H:i:s');
		$id = $this->input->post("id");
		if ($id == "") {
			$data = array(
				"cat_name" => $this->input->post("cat"),
				"created_by" => $this->user['uid'],
				"created_at" => $ts,
			);
		} else {
			$data = array(
				"cat_name" => $this->input->post("cat"),
				"updated_by" => $this->user['uid'],
				"updated_at" => $ts,
			);
		}
		$result = $this->Master_m->category_submit($data, $id);
		echo json_encode($result);
	}
	public function get_category($record = 0)
	{
		$request = $this->input->post();
		$recordPerPage = 10;
		if ($record != 0) {
			$record = ($record - 1) * $recordPerPage;
		}
		$recordCount = $this->Master_m->getRecord_categoryCount($request);
		$empRecord = $this->Master_m->getRecordcategory($record, $recordPerPage, $request);
		$config['base_url'] = base_url() . 'Masters/get_category';
		$config['use_page_numbers'] = TRUE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li class="page-item m-1">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active m-1"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item previous disabled m-1"><a href="#" class="page-link"><i class="previous"></i></a></li>';
		$config['prev_tag_close'] = '';
		$config['next_tag_open'] = '<li class="page-item next m-1"><a href="#" class="page-link"><i class="next"></i></a></li>';
		$config['next_tag_close'] = '';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['empData'] = $empRecord;
		echo json_encode($data);
	}
	public function delete_category()
	{
		$id = $this->input->post("id");
		$data1 = $this->Master_m->delete_category($id);
		echo json_encode($data1);
	}
	public function edit_category()
	{
		$id = $this->input->post("id");
		$data1 = $this->Master_m->edit_category($id);
		echo json_encode($data1);
	}
}
