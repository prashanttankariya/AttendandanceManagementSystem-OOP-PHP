<?php


class Subject{
    
    
    protected $id;
    protected $name;
    protected $code;
    protected $semester;
    protected $department;
    protected $program;
    
    
    
    public function __construct($array=false) {
        
        if($array){
        $this->id                   =  $array['subjectid'];
        $this->name                 =  $array['subjectname'];
        $this->code                 =  $array['subjectcode'];
        $this->semester             =  $array['semesterid'];
        $this->department           =  $array['departmentid'];
        $this->program              =  $array['programid'];
    }
    }
    
    public function setid($id) {
        $this->id  = $id;
    }
    
     public function setname($name) {
        $this->name  = $name;
    }
    
     public function setcode($code) {
        $this->code  = $code;
    }
    
     public function setsemester($semester) {
        $this->semester  = $semester;
    }
    
     public function setdepartment($department) {
        $this->department  = $department;
    }
    
    public function setprogram($program) {
        $this->program  = $program;
    }
    
    public function execute(){
        $mysql = new Mysql();
        $mysql->execute("SELECT * FROM subject where subjectid = '$this->id'");
        while ($row = $mysql->fetch_array()){
            $this->id                  =   $row['subjectid'];
            $this->name                =   $row['subjectname'];
            $this->code                =   $row['subjectcode'];
            $this->department          =   $row['departmentid'];
            $this->semester            =   $row['semesterid'];
            $this->program             =   $row['programid'];
            
            
        }
        
     }
    
     public function getid() {
         return $this->id;
     }
    
     public function getname() {
         return $this->name;
     }
     
     public function getcode() {
         return $this->code;
     }
     
     public function getdepartment() {
         return $this->department;
     }
     
     public function getsemester() {
         return $this->semester;
     }
     
     public function getprogram() {
         return $this->program;
     }
    
     public function form() {
         $html  = new Html();
         
         $html->form("processsubject.php");
         $html->div("container");
         $html->input("","hidden","subjectid","");
         $html->div("row","margin-top:30px;");
         $html->alert("message","Add New Subject");
         $html->table("table table-bordered","width:500px;margin:0 auto;");
         
         $html->row();
         $html->column();         echo 'Subject Name'; $html->closecolumn();
         $html->column();   $html->input("form-control","text","subjectname",""); $html->closecolumn();
         $html->closerow();
         
         
          $html->row();
         $html->column();         echo 'Subject Code'; $html->closecolumn();
         $html->column();   $html->input("form-control","text","subjectcode",""); $html->closecolumn();
         $html->closerow();
         
         
         $html->row();
         $html->column();         echo 'Department'; $html->closecolumn();
         $html->column();   $html->selectdepartment(); $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Semester'; $html->closecolumn();
         $html->column();   $html->selectSemester(); $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Program'; $html->closecolumn();
         $html->column();   $html->selectprogram(); $html->closecolumn();
         $html->closerow();
          
           $html->row();
         $html->column(); $html->closecolumn();
         $html->column();   $html->input("btn btn-primary","submit","addsubject","Add"); $html->closecolumn();
             
         $html->closerow();
         
         $html->closediv();
         $html->closediv();
         $html->closeform();
     }
     
     public function insert(){
         
         $mysql = new Mysql();
         $query = " INSERT INTO subject VALUES
             ('','$this->name','$this->code','$this->semester','$this->department','$this->program')";
         
            $mysql->execute($query);
            if($mysql->result){
                $mysql->successMessage("Record Added Successfully");
            }
             
     
     }
     
     
     /// search method
     
     protected $type;
     protected $term;
     
     public function settype($type) {
         $this->type       = $type;
         
     }
    
     public function setterm($term) {
         $this->term       = $term;
         
     }
     
     public function search($option="") {
         $query = "";
         if($option== "typeandterm"){
             
             $query = "SELECT * from subject where {$this->type} like '%" .$this->term."%'";
             
         }
         
          elseif($option== "options"){
             
           $query = "SELECT * from subject where semesterid ='$this->semester' && programid ='$this->program' && departmentid = '$this->department'";
             
         }
         
         
         
         $mysql = new Mysql(); 
         $mysql->execute($query);
         
         $html = new Html();
         $html->div("container");
         $html->div("row","margin-top:30px;");
         
         $html->table("table table-bordered");
         
         $html->row("bg-primary");
         $html->column(); echo "Subject Name"; $html->closecolumn();
         $html->column(); echo "Subject Code"; $html->closecolumn();
         $html->column(); echo "Department"; $html->closecolumn();
         $html->column(); echo "Program"; $html->closecolumn();
         $html->column(); echo "Semester"; $html->closecolumn();
         $html->column(); echo "Edit"; $html->closecolumn();
         $html->column(); echo "Delete"; $html->closecolumn();
         $html->closerow();
         
         $html->closediv();
         
         $html->closediv();
         
         
         $d     = new Department();
         $s     = new Semester();
         $pr    = new Program();
         while ($row = $mysql->fetch_array()){
             
         $html->row("");
         $html->column(); echo $row['subjectname']; $html->closecolumn();
         $html->column(); echo $row['subjectcode']; $html->closecolumn();
         $html->column(); $d->setid($row['departmentid']); $d->execute(); echo $d->getname(); $html->closecolumn();
         $html->column(); $pr->setid($row['programid']); $pr->execute(); echo $pr->gettitle(); $html->closecolumn();
         $html->column(); $s->setid($row['semesterid']); $s->execute(); echo $s->gettitle(); $html->closecolumn();
         $html->column(); ?><a class="btn btn-sm btn-group" href="processsubject.php?editid=<?php echo $row['subjectid']; ?>"><span class="glyphicon glyphicon-edit"></span></a> <?php $html->closecolumn();
         $html->column(); ?><a class="btn btn-sm btn-group" href="processsubject.php?deleteid=<?php echo $row['subjectid']; ?>"><span class="glyphicon glyphicon-trash"></span></a> <?php $html->closecolumn();
         $html->closerow();
         }
         
     }
     
     

     /// update 
     
     public function update() {
         $mysql = new Mysql();
         
         $query ="UPDATE subject set
                                      subjectname = '$this->name',  
                                      subjectcode = '$this->code',
                                     departmentid = '$this->department',
                                       semesterid = '$this->semester',
                                       programid  = '$this->program'
                                  where subjectid = '$this->id'";
         $mysql->execute($query);
         if($mysql->result){
             $mysql->successMessage("Successfully Updated");
         }
             
     }
     
     
     

/// edit 
          
     public function edit() {
         
         $html = new Html();
         $html->div("container");
         $html->form("processsubject.php");
         $html->div("row","margin-top:30px;");
         $html->alert("message","Edit Subject");
         $html->table("table table-bordered","width:500px;margin:0 auto;");
         
         $html->input("","hidden","subjectid","$this->id");
         $html->row();
         $html->column();         echo 'Subject Name';        $html->closecolumn();
         $html->column();         $html->input("form-control","text","subjectname",  $this->name);    $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Subject Code';        $html->closecolumn();
         $html->column();         $html->input("form-control","text","subjectcode",  $this->code);    $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Department';        $html->closecolumn();
         $html->column();         $html->selectdepartmentwithselectedvalue($this->department);    $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Program';        $html->closecolumn();
         $html->column();         $html->selectprogramwithselectedvalue($this->program);    $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();         echo 'Semester';        $html->closecolumn();
         $html->column();         $html->selectsemesterwithselectedvalue($this->semester);    $html->closecolumn();
         $html->closerow();
         
         $html->row();
         $html->column();               $html->closecolumn();
         $html->column();         $html->input("btn btn-primary","submit","update","Update");    $html->closecolumn();
         $html->closerow();
         $html->closediv();
         $html->closeform();
         $html->closediv();
     }
     
     
     
     /// delete method
     
     public function delete() {
         $mysql = new Mysql();
         $mysql->execute("DELETE from subject where subjectid = '$this->id' ");
         if($mysql->result){
             $mysql->successMessage("Successfully Deleted");
         }
             
     }
     
     
     
     
     
     
    
    
}























?>