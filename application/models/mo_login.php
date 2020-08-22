<?php 
 
class Mo_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	// pending
	public function load_pend()
	{
		$query = $this->db->query('select * from tbl_pinjambarang where status="Pending"');
		return $query->result();
	}

	public function load_conf()
	{
		$query = $this->db->query('select * from tbl_pinjambarang  where status="Diterima"');
		return $query->result();
	}

	public function load_cancel()
	{
		$query = $this->db->query('select * from tbl_pinjambarang  where status="Ditolak"');
		return $query->result();
	}

	 public function login($username, $password){
        $result = "no";
        $query = $this->db->query("select * from tbl_login WHERE username = '".$this->db->escape_like_str($username)."' AND password = '".$this->db->escape_like_str($password)."'");

        $row = $query->row();

        if ($query->num_rows() > 0){
            $result = "ok"; 
            $user['id'] = $row->id;
            $user['username'] = $row->username;
            $user['password'] = $row->password;
            $user['role_id'] = $row->role_id;
            $this->session->set_userdata($user);
        }   
        
        return $result;
    }
}