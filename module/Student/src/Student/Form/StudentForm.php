<?php
namespace Student\Form;

use Zend\Form\Form;

class StudentForm extends Form{
	public function __construct($name=null){
		parent::__construct('student');
		
		// Setting post method for this form
		$this->setAttribute("method", "post");
		
		// Adding Hidden element to the form for ID
		$this->add(array(
					"name"=>"id",
					"attributes"=>array(
							"type"=>"hidden"
							)
				));

		// Adding a text element to the form for Name
		$this->add(array(
					"name"=>"name",
					"attributes"=>array(
								"type"=>"text"
							),
					"options"=>array(
								"label"=>"Name"
							)
				));

		// Adding a select element to the form for Department
		$this->add(array(
				"name"=>"department",
				"type"=>"Zend\Form\Element\Select",				
				"options"=>array(
						"label"=>"Department",
						"options"=>array("Computer Science"=>"Computer Science",
										 "Physics"=>"Physics",
										 "MBA"=>"MBA"
								),						
				)
		));
		
		// Adding a text element to the form for Marks
		$this->add(array(
				"name"=>"marks",
				"attributes"=>array(
						"type"=>"text"
				),
				"options"=>array(
						"label"=>"Marks"
				)
		));
		
		// Adding Submit button to the form 
		$this->add(array(
				"name"=>"submit",				
				"attributes"=>array(
						"type="=>"submit",
						"value"=>"Add"
				),				
				
		));
	}
}