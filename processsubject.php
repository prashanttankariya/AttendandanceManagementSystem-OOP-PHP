<?php

require 'header.php';


if(isset($_POST['addsubject'])){
    $subject = new Subject($_POST);
    $subject->insert();
}



if(isset($_POST['searchbutton'])){
    
    $subject = new Subject();
    $subject->settype($_POST['type']);
    $subject->setterm($_POST['searchterm']);
    $subject->search("typeandterm");
     
}


if(isset($_POST['searchbyoptions'])){
    
    $subject = new Subject();
    $subject->setsemester($_POST['semesterid']);
    $subject->setdepartment($_POST['departmentid']);
    $subject->setprogram($_POST['programid']);
    $subject->search("options");
     
}

if(isset($_GET['editid'])){
    
    $subject = new Subject();
    $subject->setid($_GET['editid']);
    $subject->execute();
    $subject->edit();
    
}

if(isset($_POST['update'])){
    
    $subject = new Subject($_POST);
    $subject->update();
}

if(isset($_GET['deleteid'])){
    
    $subject = new Subject($_GET['deleteid']);
    $subject->delete();
}










?>