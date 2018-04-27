<?php


class Department {
    
    protected $id;
    protected $name;
    
    
    
    
    public function __construct($array = false){
        if($array){
            $this->id               = $array['departmentid'];
            $this->name             = $array['departmentname'];
            
        }
    }
    
    
   
    public function setid($id) {
        $this->id   = $id;
    }
    
    public function setname($name) {
        $this->name = $name;
    }
    
    public function execute() {
        $mysql = new Mysql();
        $mysql->execute("SELECT * FROM department where departmentid = '$this->id'");
        while($row  = $mysql->fetch_array()){
        
        $this->id       = $row['departmentid'];               
        $this->name     = $row['departmentname'];
        }
    
    }
    
    public function getid(){
        return $this->id;
    }
    
    public function getname(){
        return $this->name;
    }
    
    
     public function showall() {
         $html = new Html();
         $mysql = new Mysql();
         $mysql->execute("SELECT * FROM department");
         $html->div("container");
         $html->div("row","margin-top:30px;");
         
         $html->table("table table-bordered table-hover","width:500px;margin:0 auto;text-align:center;");
         $html->row("bg-primary");
         
         $html->column();         echo 'Department Title';        $html->closecolumn();
         
         $html->closerow();
         
         while ($row = $mysql->fetch_array()){
             $html->row();
              $html->column();        echo $row['departmentname'];        $html->closecolumn();
             $html->closerow();
         }
         
         $html->form("department.php");
         
         $html->row();
         $html->input("","hidden","departmentid",""); //  a hidden field 
         $html->column();      $html->input("form-control","text","departmentname","");             $html->closecolumn();
         $html->column();      $html->input("btn btn-primary","submit","adddepartment","Add");             $html->closecolumn();
         $html->closerow();
         $html->closeform();
        
     }


    
       /// insert method
     
     public function insert() {
         $mysql = new Mysql();
         $mysql->execute("INSERT into department values ('','$this->name')"); 
         if($mysql->result){
             $mysql->successMessage("Successfully Added");
         }
     }



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}






























?>