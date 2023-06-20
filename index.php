<?php
require_once 'controller/userController.php';

$controllers = new userController();



//$controllers->createImage($_FILES);



if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action){
        case 'create';
            $controllers->create($_POST, $_FILES);
            break;
        case 'delete';
            $controllers->delete($_POST);
            break;
        case 'edit';
            $controllers->edit($_POST);
            break;
        case 'update';
            $controllers->update($_POST,$_FILES);
            break;
        default:
            $controllers->index();
            break;
    }
}
else
{
    $controllers->index();
}



