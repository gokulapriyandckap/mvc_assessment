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
    public function create($product_name,$sku,$price,$brand,$date,$available_stock){
         $this->db->query("INSERT INTO products(product_name,sku,price,brand,manufacure_date,available_stock) VALUES ('$product_name','$sku','$price','$brand','$date','$available_stock')");
        header("location:/");
    }
    public function createImage($image){
        if ($image['name'] !=='' && $image['tmp_name']){
        $filePath = "uploads/".$image['name'];
        move_uploaded_file($image['tmp_name'],"$filePath");
        $this->db->query("INSERT INTO images(image) values ('$filePath')");
        }
    }

    public function delete($deleteID){
$this->db->query("DELETE FROM products WHERE id = '$deleteID'");
header("location:/");
    }

    public function update($updateId,$editedData){
        $this->db->query("UPDATE products set product_name='$editedData[edited_product_name]',sku='$editedData[edited_sku]',price='$editedData[edited_price]',brand='$editedData[edited_brand],'available_stock='$editedData[edited_available_stock]' where id ='$updateId' ");
    }

}
