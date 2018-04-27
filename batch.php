<?php

	require 'header.php';

           $batch = new Batch();
           $batch->showall();


   if(isset($_POST['addbatch'])){
            
            $batch = new Batch($_POST);
            $batch->add();
            
        }













?>





