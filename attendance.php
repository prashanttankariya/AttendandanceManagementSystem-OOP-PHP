	<?php

	require 'header.php';


        $html = new Html();
        $html->div("container");
        $html->form("processattendance.php");
        $html->div("row");
         $html->alert("message","Add and View Attendance Reports");
        $html->div("col-sm-2"); echo "Select Department"; $html->closediv();
        $html->div("col-sm-2"); echo "Select Program"; $html->closediv();
        $html->div("col-sm-2"); echo "Select Batch"; $html->closediv();
        $html->div("col-sm-2"); echo "Select Semester"; $html->closediv();
        $html->div("col-sm-3"); echo "Select Month ";  $html->closediv();

        $html->closediv();
        
        
        
        $html->div("row");
                
        
        $html->div("col-sm-2"); $html->selectdepartment(); $html->closediv();
        $html->div("col-sm-2"); $html->selectprogram(); $html->closediv();
        $html->div("col-sm-2"); $html->selectbatch(); $html->closediv();
        $html->div("col-sm-2"); $html->selectsemester(); $html->closediv();
        $html->div("col-sm-3"); $html->input("form-control datepicker","text","month","");    $html->closediv();
        
        $html->closediv();
        
        $html->div("row","margin-top:30px;");
        $html->div("col-sm-3");  $html->closediv();
        $html->div("col-sm-2"); $html->input("btn btn-primary form-control","submit","addreport","Add Report");    $html->closediv();
        $html->div("col-sm-2"); $html->input("btn btn-primary form-control","submit","viewreport","View Report");    $html->closediv();
        $html->div("col-sm-3"); $html->input("btn btn-primary form-control","submit","viewreportbymonth","View Report By Month");    $html->closediv();
        $html->closediv();
        $html->closeform();
        $html->closediv();






?>





