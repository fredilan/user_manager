<?php

class Fields_model extends CI_Model {

        public $meta_key;
        public $meta_value;
        public $meta_fieldtype;
        public $options;
		
        public function get_entries($filter = array('1' => '1'))
        {
			$query = $this->db->get_where('custom_fields', $filter);
            return $query->result();
        }

        public function insert_entry()
        {
			$this->meta_key = $this->input->post('field_id');
			$this->meta_value = $this->input->post('field_label');
			$this->meta_fieldtype = $this->input->post('field_type');			
			$this->options = json_encode($this->input->post('field_option'));

			$this->db->insert('custom_fields', $this);
			
			return $this->db->insert_id();
        }

        public function update_entry($id, $data = array())
        {
            $this->db->update('custom_fields', $data, array('id' => $id));
        }

        public function delete_entry($id)
        {
            $this->db->delete('custom_fields', array('id' => $id));
        }		
}