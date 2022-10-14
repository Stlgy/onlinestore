<?php
    //require_once '../libraries/start.php';
    if ($_SESSION["getData"] == 0) {
        require_once '../libraries/start.php';
        include('../libraries/class_utils.php');
    }else{
        require_once 'libraries/start.php';
    }


    class Product extends sys_utils
    {
        public function uploadImage($file){

            $res =SQL::run("INSERT INTO " . BDPX . "_products_onlinestore WHERE img_p='$file'" );
            if($res){
                return true;
            }else{
                return false;
            }
        }
        public function findProduct(){
            
        }
        public function findProducts(){

            $result = [];
            $res = SQL::run("SELECT *FROM " . BDPX . "_products_onlinestore ORDER BY name_p ASC");

            if($res && $res->num_rows > 0){
                $result = $res->fetch_assoc();
            }
            return $result;
        }
        public function addProduct(){

        }
    }
?>
