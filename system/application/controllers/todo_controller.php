<?php

class Todo_controller extends Controller {

	function Todo_controller()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->model('Todo');
		$data['records'] = $this->Todo->getAll();
		$this->load->view('index', $data);
	}
	
	function insert_list() {
		$data = array(
			'title' => $this->input->post('title'),
			'desc' => $this->input->post('desc'),
			'post_date' => date('Y-m-d h:m:s')
		);
		$this->load->model('Todo');
		$this->Todo->add_record($data);
		redirect('', 'refresh');
	}	
	
	function delete() {
		$this->load->model('Todo');
		$this->Todo->delete_row();
		redirect('', 'refresh');
	}	
	
	function update_status_finish() {
		$this->load->model('Todo');
		$data = array(
			'status'=> '1'
		);		
		$this->Todo->update_record_finish($data);		
		redirect('', 'refresh');
	}	
	function update_status_notfinish() {
		$this->load->model('Todo');
		$data = array(
			'status'=> '0'
		);		
		$this->Todo->update_record_notfinish($data);		
		redirect('', 'refresh');
	}		
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */