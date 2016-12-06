<?php

	/**
	* Index Controlller
	*/
	class Index extends Dcontroller {
		
		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$this->load->view("index");
		}

		public function home() {
			$this->load->view("home_body");
		}

		public function exams() {
			$data 				= array();
			$table 				= "teacher_table";
			$examModel 			= $this->load->model("ExamModel");
			$data['examlist'] 	= $examModel->examList($table);
			$this->load->view("examlist", $data);
		}

		public function success() {
			$this->load->view("success");
		}

		public function results($std_id) {
			$data 				= array();
			$tableStd 			= "std_table";
			$examModel 			= $this->load->model("ExamModel");
			$data['result'] 	= $examModel->getResult($tableStd, $std_id);
			$this->load->view("resultlist", $data);
		}

		public function teacherhome() {
			$this->load->view("teacher_home");
		}

		public function teachercreate() {
			$this->load->view("teacher_create");
		}

		public function teachersee($teacher_id) {
			$data 				= array();
			$tableTeacher 		= "teacher_table";
			$examModel 			= $this->load->model("ExamModel");
			$data['teacherlist']= $examModel->teachersee($tableTeacher, $teacher_id);
			$this->load->view("teacher_list", $data);
		}

		public function logview() {
			$this->load->view("login");
		}

		public function signview() {
			$this->load->view("signup");
		}

		public function teacherlogin() {
			$this->load->view("teacher_login");
		}

		public function teachersignup() {
			$this->load->view("teacher_signup");
		}

		public function forgot() {
			$this->load->view("forgot");
		}

		public function teacherforgot() {
			$this->load->view("teacher_forgot");
		}

		public function style() {
			header('Content-type: text/css');
			$files = array(
			    'inc/main1.css'
			);
			foreach ($files as $file)
			{
			    readfile($file);
			}
		}

		public function image1() {
			header('Content-Type: image/jpeg');
			$img = array(
				'inc/ny.jpg'
			);

			foreach ($img as $pic) {
				readfile($pic);
			}
		}

		public function image2() {
			header('Content-Type: image/jpeg');
			$img = array(
				'inc/chicago.jpg'
			);

			foreach ($img as $pic) {
				readfile($pic);
			}
		}

		public function image3() {
			header('Content-Type: image/jpeg');
			$img = array(
				'inc/la.jpg'
			);

			foreach ($img as $pic) {
				readfile($pic);
			}
		}

		public function logout() {
			$this->load->view("logout");
		}

		public function teacherlogout() {
			$this->load->view("teacherlogout");
		}

		public function check_availability() {
			$this->load->view("check_availability");
		}
	}

?>