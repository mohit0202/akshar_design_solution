<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

	public function index() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentattendance() {
		$data['title'] = "ADS | Student Attendance";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/event');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function search() {
		$data['title'] = "ADS | Search";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/search_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/search');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/search_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function staff() {
		$data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/staff');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function inquiry() {
		$data['title'] = "ADS | Inquiry";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/inquiry_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/inquiry');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/inquiry_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function branch() {
		$data['title'] = "ADS | Branch";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/branch_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/branch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/branch_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function batch() {
		$data['title'] = "ADS | Batch";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/batch_css');
		$this -> load -> view('backend/master_page/header');
		//Logic of getting Branch Id. Here I am assuming id = 1.
		$branchId = 1;
		//Assuming the role ID of Faculty is 3.
		$roleId = 3;
		if(isset($_SERVER['register'])) {
			$this -> load -> library("form_validation");
			$this->form_validation->set_rules('course_id', 'Course Name', 'required|trim');
			$this->form_validation->set_rules('faculty_id', 'Faculty Name', 'required|trim');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required|trim');
			$this->form_validation->set_rules('strength', 'Strength', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				
			}
		}
		$this -> load -> model("course_model");
		$courses = $this->course_model->getAllDetails();
		$this->load->model('user_model');
		$facultyName = $this->user_model->getDetailsByBranch($branchId, $roleId);
		$this->load->model('batch_model');
		$batch_data = $this -> batch_model -> getDetailsByBranch($branchId);
		$this -> load -> model("batch_timing_model");
		$weekdays = array();
		foreach ($batch_data as $key) {
			$weekdays[$key -> batchId] = $this -> batch_timing_model -> getWeekDays($key -> batchId);
		}
		$data['batch_list'] = $batch_data;
		$data['weekdays'] = $weekdays;
		$data['course'] = $courses;
		$data['faculty'] = $facultyName;
		$this -> load -> view('backend/branch_manager/batch', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/batch_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_batch($batchId) {
		$this->load->model('batch_model');
		$this->batch_model->deleteBatch($batchId);
		redirect(base_url() . "branch_manager/batch");
	}

}
?>