<?php

	require 'header.php';

           $department = new Department();
            $department->showall();
        
        
        
        if(isset($_POST['adddepartment'])){
            
            $department = new Department($_POST);
            $department->insert();
            
        }














?>



