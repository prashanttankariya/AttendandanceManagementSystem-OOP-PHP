<?php

require 'header.php';


if(isset($_POST['addreport'])){
    
    $batchid            =           $_POST['batchid'];
    $programid          =           $_POST['programid'];
    $departmentid       =           $_POST['departmentid'];
    $semesterid         =           $_POST['semesterid'];
    
    
    $html = new Html();
    $html->div("container");
    $html->div("row","margin:0 auto;margin-top:30px;");
    $html->alert("message","Select Date Subject and Held Classes");
    $html->form("processattendance.php");
    
    //// hidden iput fields
    $html->input("","hidden","batchid",$batchid);
    $html->input("","hidden","programid",$programid);
    $html->input("","hidden","departmentid",$departmentid);
    
    $html->table("table table-responsive","width:500px;margin:0 auto;");
    
    $html->row();
    $html->column();    echo 'Select Subject';             $html->closecolumn();
    $html->column();      $html->selectsubject($departmentid, $semesterid, $programid);              $html->closecolumn();
    
    $html->closerow();
    
    $html->row();
    $html->column();        echo 'Select Date';             $html->closecolumn();
    $html->column();      $html->input("form-control date-picker","text","attendancedate","");              $html->closecolumn();
    
    $html->closerow();
    
    $html->row();
    $html->column();        echo 'Select Classes Held';             $html->closecolumn();
    $html->column();      $html->select("form-control","classesheld"); 
    
    $html->options("1","1");
    $html->options("2","2");
    $html->closeselect();              $html->closecolumn();
    $html->closerow();
    
    $html->row();
    $html->column();     $html->closecolumn();
    $html->column();     $html->input("btn btn-primary","submit","next","Next");       $html->closecolumn();
    $html->closerow();
   
    $html->closetable();
    $html->closeform();
    $html->closediv();
    $html->closediv();
    
}


if(isset($_POST['next'])){
    
    $classesheld    =    $_POST['classesheld'];
    $batchid        =    $_POST['batchid'];
    $programid      =    $_POST['programid'];
    $departmentid   =    $_POST['departmentid'];
    $date           =    $_POST['attendancedate'];
    $subjectid      =    $_POST['subjectid'];
    
    $mysql  = new Mysql();
    $mysql->execute("SELECT * FROM student where batchid = '$batchid'&& departmentid ='$departmentid' && programid = '$programid'");
    
    $html = new Html();
    
    $html->div("container");
    $html->div("row","margin-top:30px;");
    $html->table("table table-bordered","width:700px;margin:0 auto;");
    
    $html->row("bg-primary");
    $html->column();    echo 'Name';                             $html->closecolumn();
    $html->column();    echo 'Roll No';                          $html->closecolumn();
    $html->column();    echo 'Attended Classes';                 $html->closecolumn();
    $html->closerow();
    
    $html->form("processattendance.php");
    while($row = $mysql->fetch_object()){
        
        $html->row();
        $html->column();     echo $row->studentname;               $html->closecolumn();
        $html->column();     echo $row->studentrollno;               $html->closecolumn();
        $html->column();
        $html->input("","hidden","studentid[]",$row->studentid);
        $html->input("","hidden","heldclasses",$classesheld);
        $html->input("","hidden","attendancedate",$date);
        $html->input("","hidden","subjectid",$subjectid);
        
        $html->select("form-control","attendedclasses[]");
        $html->options($classesheld,$classesheld);
        $html->options("0","0");
        
        $html->closeselect();
        $html->closecolumn();
        $html->closerow();
    }
    
    $html->row();
    $html->column();    $html->input("btn btn-primary","submit","submitreport","Submit Report");            $html->closecolumn();
    $html->closerow();
    $html->closetable();        
    $html->closediv();
    $html->closediv();
    
    
    
    
}


if(isset($_POST['submitreport'])){
    
    $student                =   $_POST['studentid'];
    $heldclasses            =   $_POST['heldclasses'];
    $attendedclasses        =   $_POST['attendedclasses'];
    $date                   =   $_POST['attendancedate'];
    $subjectid              =   $_POST['subjectid'];
    
    $mysql = new Mysql();
        
        foreach ($student as $key => $value) {
        $query =  "INSERT INTO attendance VALUES ('','$date','$heldclasses','$attendedclasses[$key]','$student[$key]','$subjectid')";
        $mysql->execute($query);
    }
    if($mysql->result){
        $mysql->successMessage("Attendance Report Submitted Successfully");
        
    }
    
    
}


if(isset($_POST['viewreport'])){
    
    $attendance  =  new Attendance($_POST);
    $attendance->header();
    
    $html = new Html();
    $html->div("container");
    $html->div("row");
    
    
    $html->div("","width:35%; float:left; border:1px solid #ccc;height:300px;");
    $html->closediv();
    
    $html->div("","width:31%; float:left; border:1px solid #ccc;height:300px;");
    $attendance->display_subjects_top();
    $html->closediv();
    
    $html->div("","width:29%; float:left; border:1px solid #ccc;height:300px;");
    $attendance->display_total_heldclasses();
    $html->closediv();
    
    
    $html->closediv();
    
    $html->div("row");
    
    
    $html->div("","width:35%; float:left; border:1px solid #ccc;");
    $attendance->display_id_name_and_rollno();
    $html->closediv();
    
    $html->div("","width:31.1%; float:left; border:1px solid #ccc;");
    $attendance->display_heldclasses_by_subject();
    $attendance->display_attendedclasses_by_subject();
    $html->closediv();
    
    $html->div("","width:29%; float:left; border:1px solid #ccc;");
    $attendance->display_total_attendedclasses();
    $html->closediv();
    
    
    $html->closediv();
    
    $html->closediv();
    
}



















?>