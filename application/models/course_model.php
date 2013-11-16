<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class course_model extends CI_Model {

	public function getDetailsOfCourse() {
		return $this -> db -> get('course') -> result();
	}

	public function getDetailsByCourse($courseCode) {
		$this -> db -> where('courseCode', $courseCode);
		return $this -> db -> get('course') -> result();
	}

	public function addCourse($data) {
		if (isset($data)) {
			return $this -> db -> insert('course', $data);
		}
		return false;
	}

	public function updateCourse($data, $courseCode) {
		if (isset($data)) {
			$this -> db -> where('courseCode', $courseCode);
			return $this -> db -> update('course', $data);
		}
		return false;
	}

	public function deleteCourse($courseCode) {
		if (isset($courseCode)) {
			$this -> db -> where('courseCode', $courseCode);
			$this -> db -> delete('course');
			return true;
		}
		return false;
	}

}
?>
