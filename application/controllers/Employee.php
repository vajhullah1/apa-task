<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
    }

	public function index() {
		$data['employees'] = $this->employee_model->get_employees();
		$this->load->view('employee_list', $data);
	}

	public function add() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Mobile ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('dob', 'Date', 'trim|required');
		
		if($this->form_validation->run() == TRUE){
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->employee_model->add_employee($data);
			$this->session->set_flashdata('msg', 'Employee has been added successfully!');
		} 
		$this->load->view('employee_add');
	}

	public function edit($id) {
		if(!empty($id)){
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Mobile ', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('dob', 'Date', 'trim|required');
			
			if($this->form_validation->run() == TRUE){
				$id = $this->input->post('id');
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
					'updated_at' => date('Y-m-d H:i:s')
				);
				$this->employee_model->update_employee($data, $id);
				$this->session->set_flashdata('msg', 'Employee has been updated successfully!');
			} 
			$data['employee'] = $this->employee_model->get_employee_by_id($id);
			$this->load->view('employee_edit', $data);
		} else{
            redirect('/employee');
        }
	}

	public function view($id) {
		if(!empty($id)){
            $data['employee'] = $this->employee_model->get_employee_by_id($id);
            $this->load->view('employee_view', $data);
        } else{
            redirect('/employee');
        }
	}

	public function delete($id){
        if($id){
            $delete = $this->employee_model->delete_employee($id);
            if($delete){
            	$this->session->set_flashdata('msg', 'Employee has been removed successfully.!');
            }else{
            	$this->session->set_flashdata('msg', 'Some problems occurred, please try again.!');
            }
        }
        redirect('/employee');
    }
}
