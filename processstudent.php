<?php

require 'header.php';


/// if add button clicked

if(isset($_POST['addstudent']))
    
{
    $student = new Student($_POST);
    $student->add();
}

// IF search by terms button clicked

if(isset($_POST['searchbutton'])){
    
    $type           = $_POST['type'];
    $term           = $_POST['searchterm'];
    
    $student        = new Student();
    $student->term  =$term;  
    $student->type  =$type;
    $student->search("bytypeandterm");
    
}



// IF search by option button clicked

if(isset($_POST['searchbyoption'])){
    
    $batch            = $_POST['batchid'];
    $department       = $_POST['departmentid'];
    $program          = $_POST['programid'];
    
    
    
    $student        = new Student();
    $student->setbatch($batch);
    $student->setprogram($program);
    $student->setdepartment($department);
    $student    ->search("byoption");
    
}
  
/// if edit id got

if(isset($_GET['editid'])){
    $student = new Student();
    $student->setid($_GET['editid']);
    $student->execute();
    $student->edit();
    
}
    
    
// if update button clicked 

if(isset($_POST['updatestudent'])){
    
    $student = new Student($_POST);
    
    $student->update();
}



if(isset($_GET['deleteid'])){
    
    $student = new Student();
    $student->setid($_GET['deleteid']);
    $student->delete();
}

















?>

