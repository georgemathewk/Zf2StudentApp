<?php

return array(
    // Database connection details
    'db'=>array(
        'driver'=>'Pdo',
        'dsn'=>'mysql:dbname=zf2studentapp;host=localhost',
        'driver_options'=>array(
            PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES \'UTF8\''
        )
    ),

    'service_manager'=>array(
        'factories'=>array(
            'Zend\Db\Adapter\Adapter'=>'Zend\Db\Adapter\AdapterServiceFactory'
        )
    )
);