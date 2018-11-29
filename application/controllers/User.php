<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('verification_page');
	}
	
	public function verify()
	{
		$user_data = $this->user->verify_user();
		if(isset($user_data)) {
			$session_data = array(
				'is_loggedin' => true,
				'user_id' => $user_data->id,
				'is_admin' => false
			);
			$this->session->set_userdata($session_data);
			redirect('/user/main', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'value');
			redirect('/user/index', 'refresh');
		}
	}	
	
	public function main()
	{
		if(!$this->session->has_userdata('is_loggedin')) {
			redirect('/user/index', 'refresh');
		}
		
		$data['is_admin'] = $this->session->is_admin;		
		$data['user_data'] = $this->user->get_entry(array('id' => $this->session->user_id));
		$data['user_metadata'] = $this->user->get_usermeta_entries(array('user_id' => $this->session->user_id));		
		
		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav');
		$this->load->view('user_edit', $data);
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/user/index', 'refresh');
	}		
}
