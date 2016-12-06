<?php

	/**
	* CatModel
	*/
	class ExamModel extends DModel{
		
		public function __construct() {
			parent::__construct();
		}

		public function examList($table) {
			$sql = "SELECT * FROM $table ORDER BY date DESC";
			return $this->db->select($sql);
		}

		public function createExam($table, $data) {
			return $this->db->insert($table, $data);
		}

		public function create($exam_id) {
			return $this->db->create($exam_id);
		}

		public function addQuestion($table, $data) {
			return $this->db->insert($table, $data);
		}

		public function getResult($tableStd, $std_id) {
			$sql = "SELECT * FROM $tableStd WHERE std_id = $std_id";
			return $this->db->select($sql);
		}

		public function teachersee($tableTeacher, $teacher_id) {
			$sql = "SELECT * FROM $tableTeacher WHERE teacher_id = $teacher_id ORDER BY exam_status DESC";
			return $this->db->select($sql);
		}

		public function Question($question_table, $teacher_table, $exam_id) {
			$sql = "SELECT * FROM $question_table INNER JOIN $teacher_table WHERE $teacher_table.exam_id = $exam_id";
			return $this->db->select($sql);
		}
	}

?>