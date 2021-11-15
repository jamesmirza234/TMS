<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Feedback extends CI_Model {
	function insert(
		$question,
		$answer
	) {
		$data = array(
			'Pertanyaan' => $question,
			'Jawaban' => $answer
		);
		
		$this->db->insert('feedback', $data); 
	}
	
	function update(
		$id,
		$question,
		$answer
	) {
		$data = array(
			'Pertanyaan' => $question,
			'Jawaban' => $answer
		);
		
		$this->db->where('ID', $id);
		$this->db->update('feedback', $data);
	}
	
	function delete(
		$id
	) {
		$this->db->where('ID', $id);
		$this->db->delete('feedback'); 
	}
}