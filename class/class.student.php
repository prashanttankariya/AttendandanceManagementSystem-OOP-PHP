<?php

// student class

class Student {
    
    protected $id;
    protected $name;
    protected $fathername;
    protected $rollno;
    protected $batch;
    protected $department;
    protected $program;
    
    
    
    
    //// construct method
    
    
    public function __construct($student=false){
        if($student){
            $this->id                       =$student['studentid'];
            $this->name                     =$student['studentname'];
            $this->fathername               =$student['studentfathername'];
            $this->rollno                   =$student['studentrollno'];
            $this->batch                    =$student['batchid'];
            $this->department               =$student['departmentid'];
            $this->program                  =$student['programid'];
            
            
        }
            
    }
    
    /// set id
    
    public function setid($id){
        $this->id = $id;
    }
    
    public function setname($name){
        $this->name = $name;
    }
    
    public function setrollno($rollno){
        $this->rollno = $rollno;
    }
    
    public function setbatch($batch){
        $this->batch  = $batch;
    }
    
    public function setDepartment($department){
        $this->department = $department;
    }
          
    public function setprogram($program){
        $this->program = $program;
    }
    
    /// execute query by id
    
    public function execute(){
        $mysql = new Mysql();
        $mysql->execute("SELECT * FROM student where studentid ='$this->id'");
        $row = $mysql->fetch_object();
        
        $this->id               =$row->studentid;
        $this->name             =$row->studentname;
        $this->fathername       =$row->studentfathername;
        $this->rollno           =$row->studentrollno;
        $this->batch            =$row->batchid;
        $this->department       =$row->departmentid;
        $this->program          =$row->programid;
        
    }
    
    // get id
    public function getid(){
       return $this->id;
    }

        // get name
    public function getname(){
       return $this->name;
    }
    // get fname
    public function getfathername(){
       return $this->fathername;
    }
    // get roll no
    public function getrollno(){
       return $this->rollno;
    }
        // get batch
    public function getbatch(){
       return $this->batch;
    }
    
        // get program
    public function getprogram(){
       return $this->program;
    }

        // get department
    public function getdepartment(){
       return $this->department;
    }

        
// insert form
    
    public function form(){
        $html = new Html();
        
        $html->div("row");
        $html->alert("message","Add New Student");    
        $html->form("processstudent.php");
        
        
        $html->table("table table-bordered","width:500px;margin:0 auto;margin-top:30px;");
        $html->row();
        $html->column();echo 'Name';$html->closecolumn();
        $html->column();$html->input("form-control","text","studentname",null);$html->closecolumn();
        $html->closerow();
        
        $html->input("","hidden","studentid","");
        $html->row();
        $html->column();echo 'Father\'s Name';$html->closecolumn();
        $html->column();$html->input("form-control","text","studentfathername",null);$html->closecolumn();
        $html->closerow();
        
        $html->row();
        $html->column();echo 'Roll No';$html->closecolumn();
        $html->column();$html->input("form-control","text","studentrollno",null);$html->closecolumn();
        $html->closerow();
        
        $html->row();
         $html->column();echo 'Batch';$html->closecolumn();
        $html->column();$html->selectbatch(); $html->closecolumn();
        $html->closerow();
        
         $html->row();
         $html->column();echo 'Department';$html->closecolumn();
        $html->column();$html->selectdepartment(); $html->closecolumn();
        $html->closerow();
        
        $html->row();
        $html->column();echo 'Program';$html->closecolumn();
        $html->column();$html->selectprogram(); $html->closecolumn();
        $html->closerow();
        
        $html->closerow();
        
        $html->column();$html->closecolumn();$html->column();$html->input("btn btn-primary","submit","addstudent","Add"); $html->closecolumn();
        
        
        $html->closetable();
        $html->closeform();
        $html->closediv();
    }
    
    


        /// add new student method
    
        
        public function add(){
            $mysql = new Mysql();
            $query = "INSERT INTO student 
            VALUES ('','$this->name','$this->fathername','$this->rollno','$this->batch','$this->program','$this->department')";
            $mysql->execute($query);
            if($mysql->result)
                $mysql->successMessage("Successfully Inserted data");
        }
    
    
        
       /// search method
        
       public $type;
       public $term;
       
       
       public function search ($option = ""){
           $qeury = "";
           
           if($option =="bytypeandterm"){
               $query = "SELECT * FROM student where {$this->type} like '%".$this->term."%'";
             }
             
             elseif ($option == "byoption") {
              $query = "SELECT * FROM student where batchid = {$this->batch} && programid ='$this->program' && departmentid = '$this->department'";
             }
             
             $mysql      = new Mysql();
             $mysql      ->execute($query);
             
             $html =  new Html();
             if($mysql->countRows() > 0){
                 $html->alert("message","result found (".$mysql->countRows().")");
             }
                 
             elseif($mysql->countRows() < 1){
                 $html->alert("error","No Record found");
                 return;
             }
             
             $html->div("container");
             $html->div("row","margin-top:30px;");
             $html->table("table table-bordered","margin:0 auto;");
             
             $html->row("bg-primary");
             $html->column();echo 'Name';               $html->closecolumn();
             $html->column();echo 'Father Name';        $html->closecolumn();
             $html->column();echo 'Roll No';            $html->closecolumn();
             $html->column();echo 'Department';         $html->closecolumn();
             $html->column();echo 'Batch';              $html->closecolumn();
             $html->column();echo 'Program';            $html->closecolumn();
             $html->column();echo 'Edit';               $html->closecolumn();
             $html->column();echo 'Delete';            $html->closecolumn();
             $html->closerow();
             
             $program              = new Program();
             $batch                = new Batch();
             $department           = new Department();
             
             while($row = $mysql->fetch_array()) {
             $html->row();
             $html->column();echo $row['studentname'];                      $html->closecolumn();
             $html->column();echo $row['studentfathername'];                $html->closecolumn();
             $html->column();echo $row['studentrollno'];                    $html->closecolumn();
             $html->column();$department->setid($row['departmentid']); $department->execute(); echo $department->getname(); $html->closecolumn();
             $html->column();$batch->setid($row['batchid']); $batch->execute(); echo $batch->gettitle();           $html->closecolumn();
             $html->column(); $program->setid($row['programid']); $program->execute(); echo $program->gettitle(); $html->closecolumn();
             $html->column(); ?><a class="btn btn-group btn-sm" href="processstudent.php?editid=<?php echo $row['studentid'];?>"><span class="glyphicon glyphicon-edit"></span></a> <?php $html->closecolumn();
             $html->column(); ?><a class="btn btn-group btn-sm" href="processstudent.php?deleteid=<?php echo $row['studentid'];?>"><span class="glyphicon glyphicon-trash"></span></a> <?php $html->closecolumn();
             $html->closerow();
             }
             
                     
             $html->closetable();
             $html->closediv();
             $html->closediv();
       }
        
       // update
       
       public function Update(){
           $mysql = new Mysql();
           $query = " UPDATE student SET studentname        =  '$this->name',
                                         studentfathername  =  '$this->fathername',
                                         studentrollno      =  '$this->rollno',       
                                         batchid            =  '$this->batch',
                                         programid          =  '$this->program',
                                         departmentid       =  '$this->department'
                                         
                                          
                                         where studentid  = '$this->id' ";
            
           
           $mysql->execute($query);
           if($mysql->result){
               $mysql->successMessage("Successfully Updated");
           }
        }




        // delete  id got 
        
        public function delete(){
            $mysql = new Mysql();
            $mysql->execute("DELETE FROM student where studentid = '$this->id'");
            if($mysql->result){
                $mysql->successMessage("Successfully Deleted");
            }
            
        }










        /// edit 
       
        public function edit() {
           $html  = new Html();
            
           $html->form("processstudent.php");
           $html->div("row","margin-top:20px;");
           $html->alert("message","Edit Student.");
           $html->table("table table-bordered","width:500px;margin:0 auto;");
           
           $html->input("","hidden","studentid",$this->id);
                   
           $html->row();
           $html->column();  echo 'Name';   $html->closecolumn();
           $html->column();  $html->input("form-control","text","studentname",$this->name);
           $html->closerow();
           
           
            $html->row();
           $html->column();  echo 'Father Name';   $html->closecolumn();
           $html->column();  $html->input("form-control","text","studentfathername",$this->fathername);
           $html->closerow();
           
           
           $html->row();
           $html->column();  echo 'Roll No';   $html->closecolumn();
           $html->column();  $html->input("form-control","text","studentrollno",$this->rollno);
           $html->closerow();
           
           $html->row();
           $html->column();  echo 'Department';   $html->closecolumn();
           $html->column();  $html->selectdepartmentwithselectedvalue($this->department); $html->closecolumn();
           $html->closerow();
           
            $html->row();
           $html->column();  echo 'Batch';   $html->closecolumn();
           $html->column();  $html->selectbatchwithselectedvalue($this->batch); $html->closecolumn();
           $html->closerow();
           
            $html->row();
           $html->column();  echo 'Program';   $html->closecolumn();
           $html->column();  $html->selectprogramwithselectedvalue($this->program); $html->closecolumn();
           $html->closerow();
           
           $html->row();
           $html->column();     $html->closecolumn();
           $html->column();     $html->input("btn btn-primary","submit","updatestudent","Update"); $html->closecolumn();
           $html->closerow();
           
           $html->closetable();
           $html->closerow();
           $html->closerow();
           
           }

           
           

           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
        }
       
      
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    





















?>