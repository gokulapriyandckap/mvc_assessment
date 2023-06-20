<?php

class  Database{
    public $db;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=mvc_assessment',
            'admin',
            'welcome');
        }
        catch (Exception $e){
            die($e->getMessage()."db didn't connected");
        }
    }
}
class userModel extends Database
{
    public function fetch(){
        $fetch = $this->db->PREPARE("SELECT * FROM products ");
        $fetch->execute();
        $fetchAll = $fetch->fetchAll(PDO::FETCH_OBJ);
        return $fetchAll;
    }
    public function edit($editId){

        $edit = $this->db->prepare("SELECT * from products where id = $editId ");
        $edit->execute();
        $ediDatas = $edit->fetchAll(PDO::FETCH_OBJ);
        return $ediDatas;
    }
    public function create($product_name,$sku,$price,$brand,$date,$available_stock,$product_image){
        $filePath = "uploads/".$product_image["name"];
        move_uploaded_file($product_image["tmp_name"],"$filePath");


        $this->db->query("INSERT INTO products(product_name,product_image,sku,price,brand,manufacure_date,available_stock) VALUES ('$product_name','$filePath','$sku','$price','$brand','$date','$available_stock')");
        header("location:/");
    }


    public function delete($deleteID){
$this->db->query("DELETE FROM products WHERE id = '$deleteID'");
    }

    public function update($updateId,$editedData,$editimg){

        $updateImg = $editimg["edited_product_image"];
        $filePath = "uploads/".$updateImg["name"];
        move_uploaded_file($updateImg["tmp_name"],"$filePath");
        $this->db->query("UPDATE products set product_name='$editedData[edited_product_name]', product_image='$filePath', sku='$editedData[edited_sku]', price='$editedData[edited_price]', brand='$editedData[edited_brand]', available_stock='$editedData[edited_available_stock]' where id ='$updateId' ");
    }

}
