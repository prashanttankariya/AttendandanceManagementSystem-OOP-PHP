<?php



	class Html {


		// html table

		public function table($class, $style=""){

			?>
	<table class="<?php echo $class; ?>" style="<?php echo $style; ?>">

				<?php 	


		}

	public function closetable(){

			?></table><?php

	}		

		// form

		public function form($action){

			?><form action="<?php echo $action; ?>" method="post" >
			<?php  


		}

	// close form 
	
		public function closeform(){

			?></form><?php 

		}

	/// table rows
	

		public function row($class = ""){

				?> <tr class="<?php echo $class; ?>"  >
				<?php

		}	

		// close rows


		public function closerow(){

			?></tr><?php 

		}

	/// table rows
	

		public function column($style="",$class=""){

				?> <td class="<?php echo $class; ?>" style="<?php echo $style; ?>">
				<?php

		}	

		// close rows


		public function closecolumn(){

			?></td><?php 

		}


		/// html input
		public function input($class,$type,$name,$value){

			?> <input class="<?php echo $class;?>" type="<?php echo $type; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
			<?php 

		}	

		// html div

		public function div($class,$style=""){
			?><div class="<?php echo $class; ?>" style="<?php echo $style; ?>"><?php
		}

		// close div

		
			public function closediv(){

					?> </div><?php

			}

	/// select for html		
		public function select($class,$name){
			?><select class="<?php echo $class; ?>" name="<?php echo $name; ?>"><?php
		}


	/// option for html		
		public function options($value,$name){
			?>
			<option value="<?php echo $value; ?>"><?php echo $name; ?></option>
			<?php
		}

	/// close select
	
		public function closeselect(){
			?></select><?php

		}		


                    
         /// select semester
                
         public function selectSemester(){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM semester");
             $this->select("form-control","semesterid");
             while ($row = $mysql->fetch_array()){
                 $this->options($row['semesterid'],$row['semestertitle']);
                 
             }
             $this->closeselect();
         }

         
            // select batch
            public function selectbatch(){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM batch");
             $this->select("form-control","batchid");
             while ($row = $mysql->fetch_array()){
                 $this->options($row['batchid'],$row['batchtitle']);
                 
             }
             $this->closeselect();
         }
          // select program
            public function selectdepartment(){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM department");
             $this->select("form-control","departmentid");
             while ($row = $mysql->fetch_array()){
                 $this->options($row['departmentid'],$row['departmentname']);
                 
             }
             $this->closeselect();
         }

   // select program
            public function selectprogram(){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM program");
             $this->select("form-control","programid");
             while ($row = $mysql->fetch_array()){
                 $this->options($row['programid'],$row['programtitle']);
                 
             }
             $this->closeselect();
         }

         /// alert
         
         public function alert($option="",$msg){
             $style = "";
             if($option == "error"){
                 $style = "alert alert-warning text-center";
             }
             elseif($option=="success"){
                 $style = "alert alert-success text-center";
                         
             }
             elseif($option=="message"){
                 $style = "alert alert-primary bg-primary text-center";
                         
             }
             ?> <h3 class="<?php echo $style; ?>"><?php echo $msg; ?></h3>
                <?php
        }
         
        public function Message($msg){
            ?><h4 class="bg-primary text-center"><?php echo $msg; ?></h4>
             <?php
        }
    
         
        
            // select batch with selected value
            public function selectbatchwithselectedvalue($id){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM batch");
             $this->select("form-control","batchid");
             $batch = new Batch();
             $batch->setid($id); $batch->execute();
             $this->options($batch->getid(),$batch->gettitle());
             while ($row = $mysql->fetch_array()){
                 $this->options($row['batchid'],$row['batchtitle']);
                 
             }
             $this->closeselect();
         }
        
        
         // select department with selected value
            public function selectdepartmentwithselectedvalue($id){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM department");
             $this->select("form-control","departmentid");
             $d = new Department(); $d->setid($id); $d->execute();
                $this->options($d->getid(),$d->getname());
             while ($row = $mysql->fetch_array()){
                
                 $this->options($row['departmentid'],$row['departmentname']);
                 
             }
             $this->closeselect();
         }
        
        
        // select program
            public function selectprogramwithselectedvalue($id){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM program");
             $this->select("form-control","programid");
             $program = new Program();
             $program->setid($id); $program->execute();
             $this->options($program->getid(),$program->gettitle());
             while ($row = $mysql->fetch_array()){
                 $this->options($row['programid'],$row['programtitle']);
                 
             }
             $this->closeselect();
         }
        
        
          // select program
            public function selectsemesterwithselectedvalue($id){
             $mysql = new Mysql();
             $mysql-> execute("SELECT * FROM semester");
             $this->select("form-control","semesterid");
             $semester = new Semester();
             $semester->setid($id); $semester->execute();
             $this->options($semester->getid(),$semester->gettitle());
             while ($row = $mysql->fetch_array()){
                 $this->options($row['semseterid'],$row['semestertitle']);
                 
             }
             $this->closeselect();
         }
        
        

         public function selectsubject($departmentid,$semesterid,$programid){
             $this->select("form-control","subjectid");
             $mysql = new Mysql();
             $mysql->execute("SELECT * FROM subject where departmentid='$departmentid' && semesterid='$semesterid' && programid='$programid'");
             while ($row = $mysql->fetch_array()){
                 $this->options($row['subjectid'],$row['subjectname']);
             }
             	
             $this->closeselect();
         }
         
         
         
 }

























?>