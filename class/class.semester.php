<?php

class Semester{
    
    
    protected $id;
    protected $title;
    
    
    
    public function __construct($array=false) {
        
        
        $this->id                   =  $array['semesterid'];
        $this->title                 =  $array['semestertitle'];
        
    }
    
    
    public function setid($id) {
        $this->id  = $id;
    }
    
     public function settitle($title) {
        $this->title  = $title;
    }
    
   
    public function execute(){
        $mysql = new Mysql();
        $mysql->execute("SELECT * FROM semester where semesterid = '$this->id'");
        while ($r = $mysql->fetch_array()){
            $this->id                  =   $r['semesterid'];
            $this->title                =   $r['semestertitle'];
           
            
            
        }
        
     }
    
     public function getid() {
         return $this->id;
     }
    
     public function gettitle() {
         return $this->title;
     }
     
     public function showall() {
         $html = new Html();
         $mysql = new Mysql();
         $mysql->execute("SELECT * FROM semester");
         $html->div("container");
         $html->div("row","margin-top:30px;");
         
         $html->table("table table-bordered table-hover","width:500px;margin:0 auto;text-align:center;");
         $html->row("bg-primary");
         
         $html->column();         echo 'Semester Title';        $html->closecolumn();
         
         $html->closerow();
         
         while ($row = $mysql->fetch_array()){
             $html->row();
              $html->column();        echo $row['semestertitle'];        $html->closecolumn();
             $html->closerow();
         }
         
         $html->form("semester.php");
         
         $html->row();
         $html->input("","hidden","semesterid",""); //  a hidden field 
         $html->column();      $html->input("form-control","text","semestertitle","");             $html->closecolumn();
         $html->column();      $html->input("btn btn-primary","submit","addsemester","Add");             $html->closecolumn();
         $html->closerow();
         $html->closeform();
        
     }


     /// insert method
     
     public function insert() {
         $mysql = new Mysql();
         $mysql->execute("INSERT into semester values ('','$this->title')"); 
         if($mysql->result){
             $mysql->successMessage("Successfully Added");
         }
     }






}

















?>