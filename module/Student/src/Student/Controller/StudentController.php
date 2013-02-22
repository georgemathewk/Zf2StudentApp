<?php
namespace Student\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StudentController extends AbstractActionController{
    public function indexAction(){
    	return new ViewModel(array(
    			'students'=>array(
    					array(
    							"name"=>"A Mitra",
    							"department"=>"Physics",
    							"marks"=>77
    					),
    					array(
    							"name"=>"Mukherjee P S",
    							"department"=>"Physics",
    							"marks"=>89
    					),
    					array(
    							"name"=>"Rani Mathew",
    							"department"=>"Computer Science",
    							"marks"=>91
    					),
    					array(
    							"name"=>"Rakesh Krishna",
    							"department"=>"Computer Science",
    							"marks"=>72
    					),
    					array(
    							"name"=>"Faisal Ahmed",
    							"department"=>"ComputerScience",
    							"marks"=>93
    					)
    			)
    	));
    }
}