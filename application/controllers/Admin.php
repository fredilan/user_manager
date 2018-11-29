<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		// Your own constructor code
    }

	public function index()
	{
		$data['active_menu'] = '';		
		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav', $data);
		$this->load->view('admin/main');
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}
	
	public function useradd()
	{
		$data['fields'] = $this->fields->get_entries(array('global_enable' => 1));		
		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav');
		$this->load->view('admin/user_input', $data);
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}	
	
	public function userdelete($id)
	{
		$this->user->delete_entry($id);
		$this->userview();
	}	
	
	public function userview()
	{
		
		$data['template'] = array(
				'table_open'            => '<table class="table">',

				'thead_open'            => '<thead>',
				'thead_close'           => '</thead>',

				'heading_row_start'     => '<tr>',
				'heading_row_end'       => '</tr>',
				'heading_cell_start'    => '<th>',
				'heading_cell_end'      => '</th>',

				'tbody_open'            => '<tbody>',
				'tbody_close'           => '</tbody>',

				'row_start'             => '<tr>',
				'row_end'               => '</tr>',
				'cell_start'            => '<td>',
				'cell_end'              => '</td>',

				'row_alt_start'         => '<tr>',
				'row_alt_end'           => '</tr>',
				'cell_alt_start'        => '<td>',
				'cell_alt_end'          => '</td>',

				'table_close'           => '</table>'
		);		
		
		$data['users'] = $this->user->get_entries();
		$data['active_menu'] = 'users';

		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav', $data);
		$this->load->view('admin/user_view', $data);
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}	
	
	public function fieldview()
	{
		
		$data['template'] = array(
				'table_open'            => '<table class="table">',

				'thead_open'            => '<thead>',
				'thead_close'           => '</thead>',

				'heading_row_start'     => '<tr>',
				'heading_row_end'       => '</tr>',
				'heading_cell_start'    => '<th>',
				'heading_cell_end'      => '</th>',

				'tbody_open'            => '<tbody>',
				'tbody_close'           => '</tbody>',

				'row_start'             => '<tr>',
				'row_end'               => '</tr>',
				'cell_start'            => '<td>',
				'cell_end'              => '</td>',

				'row_alt_start'         => '<tr>',
				'row_alt_end'           => '</tr>',
				'cell_alt_start'        => '<td>',
				'cell_alt_end'          => '</td>',

				'table_close'           => '</table>'
		);		
		
		$data['fields'] = $this->fields->get_entries();
		$data['active_menu'] = 'fields';
		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav', $data);
		$this->load->view('admin/fields_view', $data);
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}	
	
	public function fieldadd()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/top_nav');
		$this->load->view('partials/container_open');
		$this->load->view('partials/left_nav');
		$this->load->view('admin/fields_input');
		$this->load->view('partials/container_close');
		$this->load->view('partials/footer');
	}		
	
	public function sendemail($email_address, $code)
	{
		$this->email->from('fsamson@dukemfg.com', 'Website Administrator');
		$this->email->to($email_address);
		
		$this->email->subject('Verification Code');
		$this->email->message('This is a system generated message. To access your account, please click here and enter this code :' . $code);

		$this->email->send();		
	}

	public function usersave()
	{
		$email_address = $this->input->post('email_address');
		$code = $this->input->post('verification_code');		
		
		$result = $this->user->insert_entry();
		$this->sendemail($email_address, $code);
		
		echo $result;
	}	

	public function fieldedit()
	{
		$result = $this->fields->insert_entry();
		echo $result;
	}	

	public function fieldenable($id)
	{
		$this->fields->update_entry($id, array('global_enable' => 1));
		$this->fieldview();
	}
	
	public function fielddisable($id)
	{
		$this->fields->update_entry($id, array('global_enable' => 0));
		$this->fieldview();
	}	
	
	public function fielddelete($id)
	{
		$this->fields->delete_entry($id);
		$this->fieldview();
	}		
	
	public function fieldsave()
	{
		$result = $this->fields->insert_entry();
		echo $result;
	}	

	public function login()
	{
		$this->load->view('login_page');
	}	
	
	public function logout()
	{
		$this->fields->insert_entry();
	}	
}
