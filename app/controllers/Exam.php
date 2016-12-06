<?php

	/**
	* Exam Controller
	*/
	class Exam extends Dcontroller {
		
		public function __construct() {
			parent::__construct();
		}

		public function examList() {
			$data 			= array();
			$table 			= "teacher_table";
			$examModel 		= $this->load->model("ExamModel");
			$data['exam'] 	= $examModel->examList($table);
			$this->load->view("examlist", $data);
		}

		public function createExam() {
			$this->load->view("teacher_create");
		}

		public function addQuestion() {
			$this->load->view("qsExam");
		}

		public function Question() {
			$this->load->view("question");
		}

		public function details() {
			$this->load->view("details");
		}

		public function update() {
			$this->load->view("update");
		}
	}

?>