<?php  


// batch class

	class Batch {
	protected $id;
	protected $title;


      public function __construct($array = false){
        if($array){
            $this->id               = $array['batchid'];
            $this->title             = $array['batchtitle'];
            
        }
    }   
        
        

// set id

	public function setid($id)	{

		$this->id = $id;
	}


// set title

public function settitle($title)	{

		$this->title = $title;
	}


//// execute method

	public function execute() {

		$mysql = new mysql();
		$mysql ->execute("SELECT * FROM batch where batchid ='$this->id'");
	while($row  =  $mysql->fetch_array()){
		$this ->id  	= $row['batchid'];
		$this ->title 	= $row['batchtitle'];
            }
	}

	public function getid(){

			return $this->id;

	}

	public function gettitle(){

			return $this->title;

	}

 public function showall() {
         $html = new Html();
         $mysql = new Mysql();
         $mysql->execute("SELECT * FROM batch");
         $html->div("container");
         $html->div("row","margin-top:30px;");
         
         $html->table("table table-bordered table-hover","width:500px;margin:0 auto;text-align:center;");
         $html->row("bg-primary");
         
         $html->column();         echo 'Batch Title';        $html->closecolumn();
         
         $html->closerow();
         
         while ($row = $mysql->fetch_array()){
             $html->row();
              $html->column();        echo $row['batchtitle'];        $html->closecolumn();
             $html->closerow();
         }
         
         $html->form("batch.php");
         
         $html->row();
         $html->input("","hidden","batchid",""); //  a hidden field 
         $html->column();      $html->input("form-control","text","batchtitle","");             $html->closecolumn();
         $html->column();      $html->input("btn btn-primary","submit","addbatch","Add","required");             $html->closecolumn();
         $html->closerow();
         $html->closeform();
        
     }


      /// insert method
     
     public function add() {
         $mysql = new Mysql();
         $mysql->execute("INSERT into batch values ('','$this->title')"); 
         if($mysql->result){
             $mysql->successMessage("Successfully Added");
         }
     }






}


?>