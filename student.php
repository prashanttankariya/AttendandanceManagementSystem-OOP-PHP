<?php

	require 'header.php';

        
       $html = new Html();
       
       $html->div("container");
       $html->alert("message","Search Student");
       $html->form("processstudent.php");
       
       
       
       
       $html->div("row","margin-top:30px;");
       $html->div("col-sm-2");
       $html->closediv();
       $html->div("col-sm-2");
       $html->select("form-control","type");
       $html->options("studentname","by Name");$html->options("studentrollno","by Roll No");
       $html->closeselect();
       $html->closediv();
       
       $html->div("col-sm-4");
       $html->input("form-control","text","searchterm","");
       $html->closediv();
       
       $html->div("col-sm-2");
       $html->input("btn btn-primary form-control","submit","searchbutton","Search");
       $html->closediv();
        $html->closediv();
       
        $html->div("row","bg-primary","margin-top:30px;");
        $html->alert("message","Search Student by Batch, Program and Department.");       

        
        $html->div("col-sm-2"); $html->closediv();
        $html->div("col-sm-2"); $html->selectbatch();  $html->closediv();
        $html->div("col-sm-2"); $html->selectdepartment();  $html->closediv();
        $html->div("col-sm-2"); $html->selectprogram();  $html->closediv();
        $html->div("col-sm-2"); $html->input("btn btn-primary form-control","submit","searchbyoption","Search");  
        
        $html->closeform();
         
         $html->closediv();
         $html->closediv();

        $html->div("row","margin-top:30px;");
        $html->alert("message","Add New Student.");
        $html->div("col-sm-5");$html->closediv();
        $html->div("col-sm-2");?><a class="btn btn-primary form-control" href="addstudent.php">Add New Student</a><?php
        $html->closediv();
         
        
        
        // close container 
        
        $html->closediv();
            


?>



