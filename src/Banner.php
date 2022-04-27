<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 1:47 AM
 */

namespace Farija;

use PDO;
class Banner
{
    public $id=null;
    public $conn=null;
    public function __construct()
    {

//connect to database
        $this->conn= new PDO("mysql:host=localhost;dbname=ecommerce", $username = "root", $password = "");
// set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
   public function index(){


    $query="SELECT * FROM `banners` WHERE is_deleted=0";
    $stmt=$this->conn->prepare($query);

    $result=$stmt->execute();
    $banners=$stmt->fetchAll();
    return $banners;
}
    public function show(){
    $webroot="http://localhost/crud/";
//$_id=1;
    $_id=$_GET['id'];
//var_dump($_GET);

    $query="SELECT * FROM `banners`  WHERE id=:id";
//$query="SELECT * FROM `banners` WHERE id=1";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);

    $result=$stmt->execute();
    $banner=$stmt->fetch();
    return $banner;
}
    public function edit(){
        $webroot="http://localhost/crud/";
        $_id=$_GET['id'];
//var_dump($_GET);

        $query="SELECT * FROM `banners`  WHERE id=:id";
//$query="SELECT * FROM `banners` WHERE id=1";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);

        $result=$stmt->execute();
        $banner=$stmt->fetch();
        return $banner;
    }
    public function delete(){
//$_id=1;
        $_id=$_GET['id'];
//var_dump($_GET);

        $query= "DELETE FROM `banners` WHERE `banners`.`id` = :id";
//$query= "DELETE FROM `banners` WHERE `banners`.`id` = 1";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);

        $result=$stmt->execute();
        if($result){
            $_SESSION['message']="The Banner is deleted successfully.";
        }else{
            $_SESSION['message']="The Banner is not deleted successfully.";
        }
        header("location:index.php");
    }
    public function store(){

//echo $_SERVER['DOCUMENT_ROOT'].'/crud/';
    $approot=$_SERVER['DOCUMENT_ROOT'].'/crud/';
//die();

    /* echo"<pre>";
     print_r($_POST);
     echo"</pre>";*/
    $_title=$_POST['title'];
    $_created_at = date('Y-m-d H:i:s', time());

    if(array_key_exists('is_active',$_POST)){
        $_is_active=$_POST['is_active'];
    }else{
        $_is_active=0;
    }
    if(array_key_exists('is_deleted',$_POST)){
        $_is_deleted=$_POST['is_deleted'];
    }else{
        $_is_deleted=0;
    }
//var_dump($_POST);
    $filename='IMG_'.time().'_'.$_FILES['picture']['name'];
    $target= $_FILES['picture']['tmp_name'];
    $destination=$approot."uploads/".$filename;
    $is_file_moved= move_uploaded_file($target,$destination);

    if($is_file_moved){
        $_picture=$filename;
    }else{
        $_picture= null;
    }

    $query="INSERT INTO `banners` (`title`,`is_active`,`is_deleted`,`created_at`,`picture`) VALUES ( :title, :is_active, :is_deleted, :created_at, :picture);";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':title',$_title);
    $stmt->bindParam(':is_active',$_is_active);
    $stmt->bindParam(':is_deleted',$_is_deleted);
    $stmt->bindParam(':created_at',$_created_at);
    $stmt->bindParam(':picture',$_picture);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message']="The Banner is added successfully.";
    }else{
        $_SESSION['message']="The Banner is not added successfully.";
    }
    header("location:index.php");
}
public function update(){

    $approot=$_SERVER['DOCUMENT_ROOT'].'/crud/';
//die();

    /* echo"<pre>";
     print_r($_POST);
     echo"</pre>";*/

    $filename='IMG_'.time().'_'.$_FILES['picture']['name'];
//var_dump($_POST);
    if($_FILES['picture']['name'] != '' ){
        $target= $_FILES['picture']['tmp_name'];
        $destination=$approot."uploads/".$filename;
        $is_file_moved= move_uploaded_file($target,$destination);

        if($is_file_moved){
            $_picture=$filename;
        }else{
            $_picture= null;
        }
    }else{
        $_picture=$_POST['old-picture'];
    }
    $_id=$_POST['id'];
    $_title=$_POST['title'];

    if(array_key_exists('is_active',$_POST)){
        $_is_active=$_POST['is_active'];
    }else{
        $_is_active =0;
    }

    if(array_key_exists('is_deleted',$_POST)){
        $_is_deleted=$_POST['is_deleted'];
    }else{
        $_is_deleted =0;
    }

    $_modified_at=date('Y-m-d H:i:s', time());


    $query="UPDATE `banners` SET `id` = :id, `title` = :title ,`is_active` = :is_active, `is_deleted` = :is_deleted,`modified_at` = :modified_at, `picture` = :picture  WHERE `banners`.`id` = :id;";

    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':title', $_title);
    $stmt->bindParam(':is_active', $_is_active);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':modified_at', $_modified_at);
    $stmt->bindParam(':picture', $_picture);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message']="The Banner is updated successfully.";
    }else{
        $_SESSION['message']="The Banner is not updated successfully.";
    }
    header("location:index.php");
}
public function trash(){

//$_id=1;
    $_id=$_GET['id'];
//var_dump($_GET);
    $_is_deleted = 1;


    $query= "UPDATE `banners` SET  `is_deleted` = :is_deleted  WHERE `banners`.`id` = :id;";
//$query= "DELETE FROM `banners` WHERE `banners`.`id` = 1";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message']="The Banner is deleted successfully.";
    }else{
        $_SESSION['message']="The Banner is not deleted successfully.";
    }
    header("location:index.php");
}
public function trash_index(){

    $query="SELECT * FROM `banners` WHERE is_deleted=1";
    $stmt=$this->conn->prepare($query);

    $result=$stmt->execute();
    $banners=$stmt->fetchAll();
    return $banners;
}
public function restore(){

//$_id=1;
    $_id=$_GET['id'];
//var_dump($_GET);
    $_is_deleted = 0;

    $query= "UPDATE `banners` SET  `is_deleted` = :is_deleted  WHERE `banners`.`id` = :id;";
//$query= "DELETE FROM `banners` WHERE `banners`.`id` = 1";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message']="The Banner is Trashed successfully.";
    }else{
        $_SESSION['message']="The Banner is not Trashed successfully.";
    }
    header("location:index.php");
}

}