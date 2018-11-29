<?php

class User_model extends CI_Model {

        public $email_address;
        public $first_name;
        public $middle_name;
        public $last_name;
        public $company;
        public $channel_manager;
        public $rates;
        public $verification_code;
        public $is_verified;
		
        public function get_entries($filter = array('1' => '1'))
        {
			$query = $this->db->get_where('users', $filter);
            return $query->result();
        }

        public function get_entry($filter = array('1' => '1'))
        {
			$query = $this->db->get_where('users', $filter);
            return $query->row();
        }		

        public function get_usermeta_entries($filter = array('1' => '1'))
        {
			$query = $this->db->get_where('user_metadata', $filter);
            return $query->result();
        }
		
		public function verify_user()
		{
			$query = $this->db->get_where('users', array('verification_code' => trim($this->input->post('verification_code'))));
            return $query->row();			
		}
		
        public function insert_entry()
        {
			$this->email_address = $this->input->post('email_address');
			$this->first_name = $this->input->post('first_name');			
			$this->middle_name = $this->input->post('middle_name');
			$this->last_name = $this->input->post('last_name');
			$this->company = $this->input->post('company');
			$this->channel_manager = $this->input->post('channel_manager');			
			$this->rates = $this->input->post('rates');
			$this->verification_code = $this->input->post('verification_code');
			$this->is_verified = 0;
			
			$this->db->insert('users', $this);

			$user_id = $this->db->insert_id();
			
			foreach($this->input->post('custom') as $key=>$val) {
				$metadata = array(
					'user_id' => $user_id,
					'meta_key' => $key,
					'meta_value' => json_encode($val)
				);
				
				$this->db->insert('user_metadata', $metadata);				
			}
			
			echo json_encode($this->input->post('custom'));
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }		
		
        public function delete_entry($id)
        {
                $this->db->delete('users', array('id' => $id));
                $this->db->delete('user_metadata', array('user_id' => $id));				
        }

}