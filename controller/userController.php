<?php
require 'model/userModel.php';

class userController{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index(){
        $allData = $this->userModel->fetch();
        require 'view/list.php';
    }
    public function createImage($Files){
        $this->userModel->createImage($Files['product_image']);
    }
    public function create($data){
        $this->userModel->create($data['product_name'],$data['sku'],$data['price'],$data['brand'],$data['date'],$data['available_stock'],$data['product_image']);
    }
    public function delete($deleteId){
$this->userModel->delete($deleteId['deleteId']);
    }
    public function edit($editId){
        $editFetchData = $this->userModel->edit($editId['editId']);
        require 'view/editView.php';

    }
    public function update($editedData)
    {
        $this->userModel->update($editedData['editedId'],$editedData);
        header("location:/");
    }
}