<?php
    if ($_SESSION["getData"] == 0) {//user not logged
        require_once '../libraries/start.php';
        require_once '../models/user.php';
        require_once '../helpers/session_helper.php';
    }else{
        require_once 'libraries/start.php';
        require_once 'models/user.php';
        require_once 'helpers/session_helper.php';
    }

//phpinfo();
    class Product extends sys_utils
    {
        private $productModel;

        public function __construct(){
            $this->productModel = new Product;
        }
        ### UPLOAD IMAGE
        public function uploadImage($id_p){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $file = $_FILES['img_p'];
                $filename = $file['name'];
                $file_TmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType  = $file['type'];
                $fileExt = explode('.',$filename);
                $fileActualExp = strtolower(end($fileExt));

                $allowed = array('jpg');
                if (in_array($fileActualExp, $allowed)){
                    if ($fileError === 0){
                        if ($fileSize < 10000000){
                            $fileDestination = "";###add destination
                            move_uploaded_file($file_TmpName, $fileDestination);
                        }else{
                            echo "File is to big!";
                        }
                    }else{
                        echo "Error uploading file!";
                    }
                }else{
                    echo "Wrong file type!";
                }
            }            
        }
        
        ### ADD PRODUCTS

        public function addProduct(){

            ### GET DATA FROM PRODUCTS
            if (isset($_POST['addproduct-btn'])){
                ### SANITIZE POST DATA
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                ### INIT DATA
                $data = [
                    'name_p'             => trim($_POST['name_p']),
                    'description_p'      => trim($_POST['description_p' ]),
                    'category_p'         => trim($_POST['category_p']),
                    'buy_price_p'        => trim($_POST['buy_price_p']),
                    'sell_price_p'       => trim($_POST['sell_price_p']),
                    'stock_p'            => trim($_POST['stock_p']),
                    'availability_p'     => trim($_POST['availability_p'])
                ];
            
                ### VALIDATING INPUTS
                if (empty($data['name_p']) || empty($data['description_p']) || empty($data['category_p'])){
                     flash("addProduct", "Please fill the required fields");
                }
                if (!preg_match("/^[a-zA-Z0-9]*$/", $data['name_p'])) {
                    flash("addProduct", "Invalid firstname");   
                }
                if (!preg_match("/^[a-zA-Z0-9]*$/", $data['description_p'])) {
                    flash("addProduct", "Invalid description");   
                }
                if (!preg_match("/^[a-zA-Z0-9]*$/", $data['category_p'])) {
                    flash("addProduct", "Invalid category");  
                }
                if (str_replace("#[,]#",".", $data['buy_price_p'])  || //replaces "," with "."
                    preg_replace("#(^[0-9]{1,3}$)#","$1.00", $data['buy_price_p']) || //replaces 5 with 5.00 or 34 with 34.00
                    str_replace("#(^[0-9]{1,3})(\.[0-9]{1}$)#","$1$2 0", $data['buy_price_p'])) { //replaces 2.3 with 2.30 or 23.5 with 23.50
                        $pricecheckpattern	= "#^[0-9]{1,3}\.[0-9]{2}$#";
                        if (preg_match($pricecheckpattern, $data['buy_price_p']) == 0) {
                            flash("addProduct", "Invalid price format");                            
                        }
                }
                if (str_replace("#[,]#",".", $data['sell_price_p'])  || //replaces "," with "."
                    preg_replace("#(^[0-9]{1,3}$)#","$1.00", $data['sell_price_p']) || //replaces 5 with 5.00 or 34 with 34.00
                    str_replace("#(^[0-9]{1,3})(\.[0-9]{1}$)#","$1$2 0", $data['sell_price_p'])) { //replaces 2.3 with 2.30 or 23.5 with 23.50
                        $pricecheckpattern	= "#^[0-9]{1,3}\.[0-9]{2}$#";
                        if (preg_match($pricecheckpattern, $data['sell_price_p']) == 0) {
                            flash("addProduct", "Invalid price format");                            
                        }else if ($data['sell_price_p'] < $data['buy_price_p']) {
                            flash("addProduct", "Attention, sell price is lower than buy price");
                        }
                }
                if (!is_numeric($data['stock_p'])) {
                    flash("addProduct", "Invalid price format"); 
                }
                if (!preg_match("/^[0-1]{0,2}$/", $data['availability_p'])) {
                    flash("addProduct", "Invalid price format"); 
                }
                ### CHECK IF PRODUCT ALREADY EXISTS

                
            }
        }
    }
