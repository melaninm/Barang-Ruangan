<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mo_login');
		$this->load->library('session');
	}

	public function index()
	{	
		$level = $this->session->userdata('role_id');
		if($level == 1){
			redirect('admin/index' , 'refresh');
		}
		if($level == 2){
			redirect('admin/index_user' , 'refresh');
		}

		else{
			$this->load->view("auth/login");
		}
		
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('Login/index');
	}

	public function submit_login(){

		$login = $this->Mo_login->login($this->input->post('username'), $this->input->post('password'));


        if($login == "ok"){
        	$level = $this->session->userdata('role_id');
            if($level == 1){
            	$message = "Login Admin Berhasil !";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            	redirect('admin/index' , 'refresh');
            }
            else{
            	$message = "Login User Berhasil !";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            	redirect('admin/index_user' , 'refresh');
            }
        }

        else{
            $message = "Login Gagal !";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('Login/masuk' , 'refresh');
            
        }
	}
}
