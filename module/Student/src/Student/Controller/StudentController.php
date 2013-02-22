<?php
namespace Student\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
}