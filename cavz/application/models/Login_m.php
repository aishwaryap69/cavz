<?php
class Login_m extends CI_Model
{

    public function login_user($user_name, $password)
    {

        $this->db->select('*');

        $this->db->from('users');

        $this->db->where('username', $user_name);

        $this->db->where('password', $password);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return 0; // Invalid credentials

        }
    }

    public  function getcredentials($a)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("uid", $a);
        $query = $this->db->get();

        if (!empty($query)) {
            return $query->result();
        } else {
            return 0;
        }
    }
}
