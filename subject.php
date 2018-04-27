<?php

	require 'header.php';

        $h = new Html();
        $h->div("container");
        $h->form("processsubject.php");
        $h->div("row","margin-top:30px;");

        $h->alert("message","Search Subject By name or Code");
        $h->div("col-sm-1");    $h->closediv();
        $h->div("col-sm-2");    
        
        $h->select("form-control","type");
        
        $h->options("subjectname","By name");
        $h->options("subjectcode","By Code");
        
        $h->closeselect();
        $h->closediv();
        $h->div("col-sm-5");    $h->input("form-control","text","searchterm","");   $h->closediv();
        $h->div("col-sm-2");    $h->input("form-control btn btn-primary","submit","searchbutton","Search");   $h->closediv();
        $h->closediv();

        $h->div("row","margin-top:30px;");
        $h->alert("message","View Subject By Department , Program and Semester");
        $h->div("col-sm-2"); $h->closediv(); 
        $h->div("col-sm-2"); $h->selectdepartment();    $h->closediv();
        $h->div("col-sm-2");  $h->selectprogram();   $h->closediv();
        $h->div("col-sm-2");  $h->selectsemester();   $h->closediv();
        $h->div("col-sm-2");  $h->input("form-control btn btn-primary","submit","searchbyoptions","Search");   $h->closediv();
        $h->closediv();
        
        $h->closeform();
        
        $h->div("row","margin-top;30px;");
        
        $h->alert("message","Add New Subject");
        
        $h->div("col-sm-5"); $h->closediv();
        $h->div("col-sm-2"); ?><a class="btn btn-primary form-control" href="addsubject.php">Add New Subject</a> <?php $h->closediv();
        $h->closediv();






?>




