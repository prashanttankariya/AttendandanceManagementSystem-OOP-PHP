<?php


class Program {
    
    protected $id;
    protected $title;
    
    
    
    
    public function __construct($array = false){
        if($array){
            $this->id               = $array['programid'];
            $this->title             = $array['programtitle'];
            
        }
    }
    
    
   
    public function setid($id) {
        $this->id   = $id;
    }
    
    public function settitle($title) {
        $this->title = $title;
    }
    
    public function execute() {
        $mysql = new Mysql();
        $mysql->execute("SELECT * FROM program where programid = '$this->id'");
        while($row = $mysql->fetch_array()){
        
        $this->id       = $row['programid'];               
        $this->title    = $row['programtitle'];
       }  
    
    }
    
    public function getid(){
        return $this->id;
    }
    
    public function gettitle(){
        return $this->title;
    }
    
    
    
    
     
    
    // show all program method
    
    
  public function showall() {
         $html = new Html();
         $mysql = new Mysql();
         $mysql->execute("SELECT * FROM program");
         $html->div("container");
         $html->div("row","margin-top:30px;");
         
         $html->table("table table-bordered table-hover","width:500px;margin:0 auto;text-align:center;");
         $html->row("bg-primary");
         
         $html->column();         echo 'Program Title';        $html->closecolumn();
         
         $html->closerow();
         
         while ($row = $mysql->fetch_array()){
             $html->row();
              $html->column();        echo $row['programtitle'];        $html->closecolumn();
             $html->closerow();
         }
         
         $html->form("program.php");
         
         $html->row();
         $html->input("","hidden","programid",""); //  a hidden field 
         $html->column();      $html->input("form-control","text","programtitle","");             $html->closecolumn();
         $html->column();      $html->input("btn btn-primary","submit","addprogram","Add");             $html->closecolumn();
         $html->closerow();
         $html->closeform();
        
     }


    
   
         public function add(){
        $mysql = new Mysql();
        $mysql->execute("INSERT INTO program value ('','$this->title')");
        if($mysql->result){
            $mysql->successMessage("Successfully Added");
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}






























?>	