<?php

    class Schedule{

        public $from_loc;
        public $to_loc;
        public $date;
        public $capacity;
        public $ac_status;
        public $fare;
        private $conn;
        private $tableName = 'schedule';

        public function __construct($db){

            $this->conn = $db;

        }


      //  $query = "INSERT INTO " . $this->tableName.
       // " SET Bus_No=:bus_no, Author=:author, Total_capacity=:total_capacity";

        public function create(){

            $query = "INSERT INTO ".$this->tableName." SET 
            from_loc=:from_loc, to_loc=:to_loc, total_capacity=:capacity, ac_status=:ac_status,
              fare=:fare";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":from_loc", $this->form_loc);
            $stmt->bindParam(":to_loc", $this->to_loc);
            $stmt->bindParam(":ac_status", $this->ac_status);
            $stmt->bindParam(":bus_no", $this->busNo);
            $stmt->bindParam(":fare", $this->fare);


           echo $this->from_loc.'<br>';
           echo $this->to_loc.'<br>';
        //    echo $this->date.'<br>';
           echo $this->capacity.'<br>';
           echo $this->ac_status.'<br>';
           echo $this->fare.'<br>';
            


            if($stmt->execute()){
                //return true;

               // $stmt->debugDumpParams();
            }
            else{
                //$stmt->debugDumpParams();
                
               // print_r($stmt->errorInfo());
            }
            
        
        }


        public function allSchedule(){
            $query = "SELECT * FROM logical" ;
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;


            //$stmt = $this->conn->prepare($query);
            //print_r($stmt);
            //$stmt->execute();

        }


        public function  logicalSelectByID($id){

        
        }



    }


?>