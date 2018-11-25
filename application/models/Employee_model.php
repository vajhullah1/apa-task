<?php

class Employee_model extends CI_Model {
	public function get_employees() {
		$query = $this->db->select('id, name, email, phone, dob, created_at, updated_at')->get('employees');
       	return $query->result();
	}

	public function add_location($data) {
		$this->db->insert('employees', $data);
	}

	public function add_employee($data) {
		if(!empty($data)) {
			$this->db->insert('employees',$data);
		}
	}

	public function get_employee_by_id($id) {
		$query = $this->db->get_where('employees', array('id' => $id));
        return $query->row_array();
	}

	public function update_employee($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('employees', $data, array('id'=>$id));
            return $update ? true : false;
        }else{
            return false;
        }
    }

	public function delete_employee($id){
        $delete = $this->db->delete('employees',array('id'=>$id));
        return $delete ? true : false;
    }
}