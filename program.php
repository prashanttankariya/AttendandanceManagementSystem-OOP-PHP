<?php

	require 'header.php';


        $program = new Program();
        $program->showall();
        
        
        if(isset($_POST['addprogram'])){
            $program = new Program($_POST);
            $program->add();
        }













?>




