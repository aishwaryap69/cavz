<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->user = get_userdata("self_pro_loggedin");
    }
    public function index()
    {
        if ($this->user) {
            $this->load->view('dashboard');
        } else {
            redirect("Login");
        }
    }
}
