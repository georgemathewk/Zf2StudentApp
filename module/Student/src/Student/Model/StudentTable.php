<?php
namespace Student\Model;

use Zend\Db\TableGateway\TableGateway;

// A table class for the database table student
class StudentTable{

	// This table class does database operations using $tableGateway
	protected $tableGateway;

	// Service manager injects TableGateway object into this class
	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
	}

	// Fetching all the student table rows
	public function fetchAll(){
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
}
