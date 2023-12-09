<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Login_m", "", TRUE);
		$this->load->library('form_validation');
		$this->user = get_userdata("self_pro_loggedin");
	}
	public function index()
	{
		if ($this->user) {
			redirect('Dashboard');
		} else {
			$this->load->view('Register');
		}
	}
	public function register()
	{
		$ts = date('Y-m-d H:i:s');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		if ($name != "" && $email != "" && $password != "") {
			$data = array(
				"name" => $name,
				"username" => $email,
				"password" => $password,
				"created_at" => $ts,
			);
			$this->db->insert('users', $data);
			$this->db->trans_complete();
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				echo json_encode("0");
			} else {
				$this->db->trans_commit();
				$return1 = $this->Login_m->login_user($email, $password);
				if (!empty($return1)) {
					$session_array = array();
					$session_array = [
						'uid' => $return1[0]->uid,
						'name' => $return1[0]->name,
					];
					$this->session->set_userdata('self_pro_loggedin', $session_array);
					echo json_encode("1");
				} else {

					echo json_encode("0");
				}
			}
		}
	}
}
