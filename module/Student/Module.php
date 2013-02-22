<?php
namespace Student;

use Student\Model\Student;
use Student\Model\StudentTable;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class Module{
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    // Automatically invoked by service manager
    public function getServiceConfig(){
        return array(
            'factories' => array(
                // Instantiating StudentTable class by injecting TableGateway
                'Student\Model\StudentTable'=>function($sm){
                    $tableGateway = $sm->get('StudentTableGateway');
                    $table = new StudentTable($tableGateway);
                    return $table;
                },
                //Instantiating TableGateway to inject to StudentTable class
                'StudentTableGateway'=>function($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Student());
                    return new TableGateway('student', $dbAdapter,null,$resultSetPrototype);
                }
            )
        );
    }
}