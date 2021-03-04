<?php

require_once('checkCookies.php');




class products {

     public $db;
     function __constructor(){
            $this->db = $db;
     }

            function connectdb(){
                $dsn = "mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";

                define("dbuser","root");
                define("dbpassword","");
                try
                {$this->db=new PDO($dsn,dbuser,dbpassword);
                $this->db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                    die ("error couldnt connect". $e -> getMessage());
                }
    }

    function showhotdrinks(){
        $data = array();
        $selectquery = "SELECT * FROM products where category='hot drinks'" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }

    function showcolddrinks(){
        $data = array();
        $selectquery = "SELECT * FROM products where category='cold drinks'" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }

    function showdesserts(){
        $data = array();
        $selectquery = "SELECT * FROM products where category='desserts'" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }

    function showothers(){
        $data = array();
        $selectquery = "SELECT * FROM products where category NOT IN('desserts','cold drinks','hot drinks')" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }

    function selectlastorder(){
        $data = array();
        // $currentuser = $_SESSION['currentuser'];
        $selectquery = "SELECT op.Quantity,p.Pname,p.PPicPath from `order-product` op ,orders o,products p where o.OID=op.OID AND p.PID=op.PID AND op.OID=(SELECT OID FROM orders order by OrderDate DESC LIMIT 1)" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }

    function systemusers(){
        $data = array();
        // $currentuser = $_SESSION['currentuser'];
        $selectquery = "select name ,uid from systemuser" ;
        $statement = $this->db->prepare($selectquery);
        $statement -> execute();
        $allproducts = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $allproducts;
    }




}


