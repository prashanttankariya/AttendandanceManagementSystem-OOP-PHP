<?php

	require 'header.php';

        $semester = new Semester();
        $semester->showall();
        
        
        
        if(isset($_POST['addsemester'])){
            
            $semester = new Semester($_POST);
            $semester->insert();
            
        }














?>



