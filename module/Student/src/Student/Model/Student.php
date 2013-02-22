<?php
namespace Student\Model;

class Student{
	public $id;
	public $name;
	public $department;
	public $marks;

	public function exchangeArray($data){
		$this->id = (isset($data['id']))?$data['id']:null;
		$this->name = (isset($data['name']))?$data['name']:null;
		$this->department = (isset($data['department']))?$data['department']:null;
		$this->marks = (isset($data['marks']))?$data['marks']:null;
	}
}