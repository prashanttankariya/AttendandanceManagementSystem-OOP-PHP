<?php

class Attendance{
    
    
    public $batch;
    public $department;
    public $program;
    public $semester;
    public $month;
    public $list    = array();

    public function __construct($array = false){
        if($array){
            $this->batch                 =   $array['batchid'];
            $this->program               =   $array['programid'];
            $this->semester              =   $array['semesterid'];
            $this->department            =   $array['departmentid'];
           
            if($array['month']){
                $this->month   =   $array['month'];
            }
            
            $this->setlist();
        }
    }
    
    
    
    public function header() {
        
        $depertment = new Department();
        $depertment->setid($this->department);
        $depertment->execute();
        
        $program = new Program();
        $program->setid($this->program);
        $program->execute();
        
        $semester = new Semester();
        $semester->setid($this->semester);
        $semester->execute();
        
        $batch = new Batch();
        $batch->setid($this->batch);
        $batch->execute();
        
        $html = new Html();
        
        $html->div("container");
        $html->div("row");
        $html->table("table table-bordered");
        
        $html->row();
        $html->column(); ?><h3 class="text-center">Balconium University of Engineering & Technology</h3><?php       $html->closecolumn();
        $html->closerow();
         $html->row();
         $html->column(); ?><h4 class="text-center">Department: &nbsp;<?php echo $depertment->getname(); ?></h4><?php       $html->closecolumn();
         
        $html->closerow();
        
        $html->row();
         $html->column(); ?><h4 class="text-center">Over All Attendance Report For &nbsp;<?php echo $semester->gettitle(); ?> Semester <?php echo $program->gettitle(); ?> Batch(<?php echo $batch->gettitle(); ?>)</h4><?php       $html->closecolumn();
         
        $html->closerow();
        $html->closetable();
        $html->closediv();
        $html->closediv();
    }
    
    
      public function setlist(){
        $mysql = new Mysql();
        $query = "SELECT * FROM student where batchid = '$this->batch' && programid='$this->program' && departmentid ='$this->department'";
        $mysql->execute($query);
        while ($row = $mysql->fetch_array()){
            $this->list[] = $row;
            }
            array_unshift($this->list, "test");
            unset($this->list[0]);
    }
    
    
    
    
    
    
  
    public function display_id_name_and_rollno() {
        
        $html = new Html();
        $html->table("table table-bordered");
        
        $html->row("bg-primary");
        $html->column("line-height:9px;font-weight:bolder;");        echo 'S#';     $html->closecolumn();
        $html->column("line-height:9px;font-weight:bolder;");        echo 'Name';     $html->closecolumn();
        $html->column("line-height:9px;font-weight:bolder;");        echo 'Roll No';     $html->closecolumn();
        $html->closerow();
        foreach ($this->list as $key => $value) {
            $html->row();
            $html->column();            echo $key;        $html->closecolumn();
            $html->column();            echo $value['studentname'];        $html->closecolumn();
            $html->column();            echo $value['studentrollno'];        $html->closecolumn();
            $html->closerow();
        }
        
        
        $html->closetable();
    }
    
    
    /// display attendend
    
    
    public function display_subjects_top() {
        $query = " Select subjectname, sum(attendedclasses) from attendance as a, 
            subject as b where a.subjectid = b.subjectid && a.studentid={$this->list[1]['studentid']} && b.semesterid = '$this->semester' group by a.subjectid ";
    $mysql = new Mysql();
    $mysql->execute($query);
    
    $html = new Html();
    $html->table("","transform:rotate(270deg);width:300px;height:100%;border:1px solid #ccc;");
    while ($row = $mysql->fetch_array()){
        $html->row();
        $html->column("width:45px; border:1px solid #ccc; text-align:center;letter-spacing:4px;");        echo $row['subjectname'];          $html->closecolumn();
        $html->closerow();
    }
    
    $html->closetable();
    
    
    }
    
    public function display_heldclasses_by_subject() {
      $query = " Select subjectname, sum(heldclasses) as 'total' from attendance as a, 
            subject as b where a.subjectid = b.subjectid && a.studentid={$this->list[1]['studentid']} && b.semesterid = '$this->semester' group by a.subjectid ";   
    $mysql = new Mysql();
    $mysql->execute($query);
     $html = new Html();
    $html->table("","border:1px solid #ccc;");
    $html->row("bg-primary");
    while ($row = $mysql->fetch_array()){
        
        $html->column("width:45px; border:1px solid #ccc;text-align:center;font-weight:bolder;");        echo $row['total'];          $html->closecolumn();
        
    }
    $html->closerow();
    $html->closetable();
    
    
    }
    
     public function display_attendedclasses_by_subject() {
         $html = new Html();
         $mysql = new Mysql();
     $html->table("table table-bordered","border:1px solid #ccc;");
     foreach ($this->list as $key => $value) {
     $mysql->execute("Select subjectname, sum(attendedclasses)as 'total' from attendance as a, 
            subject as b where a.subjectid = b.subjectid && a.studentid = {$value['studentid']} && b.semesterid ='$this->semester' group by a.subjectid");
    
    
    
    $html->row();
    while ($row = $mysql->fetch_array()){
        
        $html->column("width:42px;border:1px solid #ccc; text-align:center;letter-spacing:4px;");        echo $row['total'];          $html->closecolumn();
        
    }
    $html->closerow();
    
    
    }
    $html->closetable();
    }
    
    
    public function display_total_attendedclasses() {
         $html = new Html();
         $mysql = new Mysql();
     $html->table("table table-bordered","border:1px solid #ccc;");
     $html->row("bg-primary");
     $html->column("line-height:9px;text-align:center;font-weight:bolder;");     echo "Attended Classes";         $html->closecolumn();
     $html->column("line-height:9px;text-align:center;font-weight:bolder;");     echo "Percentage";          $html->closecolumn();
     $html->closerow();
     foreach ($this->list as $key => $value) {
     $mysql->execute("Select subjectname, sum(attendedclasses) as 'total', sum(attendedclasses)/ sum(heldclasses) * 100 as 'percentage' from attendance as a, 
            subject as b where a.subjectid = b.subjectid && a.studentid = {$value['studentid']} && b.semesterid = '$this->semester'");
    
    
    
    $html->row();
    while ($row = $mysql->fetch_array()){
        
        $html->column("width:42px;border:1px solid #ccc; text-align:center;letter-spacing:4px;");        echo $row['total'];          $html->closecolumn();
        $html->column("width:42px;border:1px solid #ccc; text-align:center;letter-spacing:4px;");        echo (int)$row['percentage']."%";          $html->closecolumn();
        
    }
    $html->closerow();
    
    
    }
    $html->closetable();
    }
    
    
    
      public function display_total_heldclasses() {
      $query = " Select subjectname, sum(heldclasses) as 'total' from attendance as a, 
            subject as b where a.subjectid = b.subjectid && a.studentid={$this->list[1]['studentid']} && b.semesterid = '$this->semester'";   
    $mysql = new Mysql();
    $mysql->execute($query);
     $html = new Html();
    $html->table("table table-bordered","border:1px solid #ccc;","width:200px; margin:0 auto; padding-top:20px;");
    $html->row();
    while ($row = $mysql->fetch_array()){
        $html->column("");        echo 'Total Held Classes';          $html->closecolumn();
        $html->column("width:45px; border:1px solid #ccc;text-align:center;font-weight:bolder;");        echo $row['total'];          $html->closecolumn();
        
    }
    $html->closerow();
    $html->closetable();
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


























?>