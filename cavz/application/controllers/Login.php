<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
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
			$this->load->view('login');
		}
	}
	public function login_admin()
	{
		$this->form_validation->set_rules('uname', 'Username', 'required');

		$this->form_validation->set_rules('paswd', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)

			$this->index();

		else {

			$username = $this->input->post('uname');

			$password = md5($this->input->post('paswd'));

			$return1 = $this->Login_m->login_user($username, $password);

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
	//logout
	public function signout()
	{
		$this->user = get_userdata("self_pro_loggedin");
		$id = $this->user['uid'];
		$this->session->unset_userdata('self_pro_loggedin');
		redirect('Login');
	}
	public function getcredentials()
	{
		$a = $this->input->post('id');
		$return1 = $this->Login_m->getcredentials($a);
		if (!empty($return1)) {
			$this->session->unset_userdata('self_pro_loggedin');
			$session_array = array();
			$session_array = array(
				'uid' => $return1[0]->uid,
				'name' => $return1[0]->name,
				'username' => $return1[0]->username,
			);
			$this->session->set_userdata('self_pro_loggedin', $session_array);
			echo json_encode(1);
		}
	}
}
