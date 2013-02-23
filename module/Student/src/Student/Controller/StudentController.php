<?php
namespace Student\Controller;

use Student\Model\Student;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Student\Form\StudentForm;

class StudentController extends AbstractActionController{
    protected $studentTable;

    public function indexAction(){
        // Setting layout for this action
        $this->layout("layout/student_layout");

        return new ViewModel(array(
            // Fetching data from database
            'students'=>$this->getStudentTable()->fetchAll()
        ));
    }

    // Getting StudentTable object to do database operations
    public function getStudentTable(){
        if(!$this->studentTable){
            $sm = $this->getServiceLocator();
            $this->studentTable = $sm->get("Student\Model\StudentTable");
            return $this->studentTable;
        }
    }
    
    // Add action
    public function addAction(){
    
    	// Setting layout for this action
    	$this->layout("layout/student_layout");
    
    	// Creating html form for student insert
    	$form = new StudentForm();
    
    	// Getting a request object
    	$request = $this->getRequest();
    
    	// If it is a form submission,
    	// then request will be post
    	if($request->isPost()){
    			
    		// Creating a Student object
    		$student = new Student();
    			
    		// Setting data on form object from request object
    		$form->setData($request->getPost());
    			
    		if($form->isValid()){
    
    			// Setting data on student object from form object
    			$student->exchangeArray($form->getData());
    
    			// Inserting student data in the datbase table
    			$this->getStudentTable()->saveStudent($student);
    
    			// Redirecting to index action of student controller
    			return $this->redirect()->toRoute("student");
    		}
    	}
    
    	// If it is form request,
    	// then return the form
    	return array('form'=>$form);
    }
       
}