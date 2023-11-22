<?php
class Database{
    private function connect(){
        try{
            $string = "mysql:host=localhost;dbname=hopit_express";
            $con = new PDO($string,"root","");
        }catch(PDOException $e){
            if($_SERVER['HTTP_HOST']=="localhost"){
                die ($e->getMessage());
            }else{
                die ("Cannot connect to the database...?");
            }
        }
        return $con;
    }
    public function getConnection(){
        $con=$this->connect();
        return $con;
    }
        public function db_read($query,$data=array()){
        $con=$this->connect();
         $stm = $con->prepare($query);
         if($stm){
            $check = $stm->execute($data);
            if($check){
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                if(is_array($result) && count($result)>0){
                    return $result;
                }
            }
         }
    }
    public function db_check($query,$data=array()){
        $con=$this->connect();
         $stm = $con->prepare($query);
         if($stm){
            $check = $stm->execute($data);
            if($check){
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                if(is_array($result) && count($result)>0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
         }else{
            return false;
         }
    }
    public function db_multi_write($query1,$data1=array(),$query2,$data2=array(),$query3,$data3=array()){
        $con=$this->connect();
         $stm = $con->prepare($query1);
         if($stm){
            $check = $stm->execute($data1);
            if($check){
                $stm = $con->prepare($query2);
                if($stm){
                   $check = $stm->execute($data2);
                   if($check){
                    $stm = $con->prepare($query3);
                    if($stm){
                       $check = $stm->execute($data3);
                       if($check){
                               return true;
                       }
                    }
                   }
                }
            }
         }
    }
    
    public function db_write($query,$data=array()){
        $con=$this->connect();
         $stm = $con->prepare($query);
         if($stm){
            $check = $stm->execute($data);
            if($check){
                    return $check;
            }
         }
    }
}

?>