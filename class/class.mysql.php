<?php 
// data base class

class Mysql {

	protected $host;
	protected $user;
	protected $password;
	protected $dbname;
	protected $connection;
	public     $result;

	public function __construct(){

			$this->host ="localhost";
			$this->user ="root";
			$this->password ="";
			$this->dbname = "ams";
			$this->connection =mysqli_connect($this->host,$this->user,$this->password,$this->dbname);
			if (!$this->connection) {
                            $this->errorMessage(mysqli_error($this->connection));	

			}
                        
                    }

	
// get error message
	public function errorMessage($message){
		?><h3 class="alert alert-warning text-center"><?php echo $message;  ?></h3><?php  

	}
	// get success message
	public function successMessage($msg){
		?><h3 class="alert alert-success text-center"><?php echo $msg;  ?></h3><?php  

	}


	public function execute($query){

			$this->result = mysqli_query($this->connection,$query);
			if(!$this->result) {
                             $this->errorMessage(mysqli_error($this->connection));
			}

	}

	// fetch result as array

		public function fetch_array(){
			return mysqli_fetch_array($this->result);

		}


	// fetch result as object

		public function fetch_object(){
			return mysqli_fetch_object($this->result);

		}


	// count rows
	
	public function countRows(){

		return mysqli_num_rows($this->result);

	}	

            
       /// 
        
       public function escape_string($data){
           return mysqli_real_escape_string($data);
       }









} 



















 ?>