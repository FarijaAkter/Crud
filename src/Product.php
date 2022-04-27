<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 12:37 AM
 */

namespace Farija;

use PDO;
class Product
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


     $query = "SELECT * FROM `products` WHERE is_deleted = 0";
     $stmt =  $this->conn->prepare($query);

     $result = $stmt->execute();
     $products = $stmt->fetchAll();
     return $products;
 }
 public function show(){
     $webroot="http://localhost/crud/";
     $_id =$_GET['id'];

//var_dump($_GET);
//insert a QUERY

     $query="SELECT * FROM `products` WHERE id=:id";
     $stmt= $this->conn->prepare($query);
     $stmt->bindParam(':id',$_id);

     $result = $stmt->execute();
     $product = $stmt->fetch();
     return $product;
 }
 public function edit(){
     $webroot="http://localhost/crud/";
     $_id =$_GET['id'];

//var_dump($_GET);
//insert a QUERY

     $query="SELECT * FROM `products` WHERE id=:id";
     $stmt= $this->conn->prepare($query);
     $stmt->bindParam(':id',$_id);

     $result = $stmt->execute();
     $product = $stmt->fetch();
     return $product;

 }
 public function delete(){
     $_id=$_GET['id'];
//var_dump($_GET);
     $username = "root";
     $password = "";


     $query="DELETE FROM `products` WHERE `products`.`id` = :id";
     $stmt =$this->conn->prepare($query);
     $stmt->bindParam(':id',$_id);

     $result = $stmt->execute();
     if($result){
         $_SESSION['message']="The Product is deleted successfully.";
     }else{
         $_SESSION['message']="The Product is not deleted successfully.";
     }
     header("location:index.php");
 }
 public function store(){

//echo $_SERVER['DOCUMENT_ROOT'].'/crud/';
//die();
     $approot= $_SERVER['DOCUMENT_ROOT'].'/crud/';
//$_picture = $_POST['picture'];

     $filename='IMG_'.time().'_'.$_FILES['picture']['name'];

     $target= $_FILES['picture']['tmp_name'];
     $destination= $approot."uploads/".$filename;

     $is_file_moved=move_uploaded_file($target,$destination);

     if($is_file_moved){
         $_picture = $filename;
     }else{
         $_picture = null;
     }

     $_title = $_POST['title'];
     if(array_key_exists('is_draft', $_POST)){
         $_is_draft = $_POST['is_draft'];
     }else{
         $_is_draft = 0;
     }
     $_description = $_POST['description'];
     $_is_active = $_POST['is_active'];

     $_created_at =date('Y-m-d H:i:s',time());

     if(array_key_exists('is_active', $_POST)){
         $_is_active = $_POST['is_active'];
     }else{
         $_is_active = 0;
     }
     if(array_key_exists('is_deleted', $_POST)){
         $_is_deleted  = $_POST['is_deleted'];
     }else{
         $_is_deleted = 0;
     }
;
//INSERT QUERY
     $query = "INSERT INTO `products` (`title`,`is_draft`,`description`,`is_active`,`is_deleted`,`picture`,`created_at`) VALUES (:title , :is_draft ,:description, :is_active, :is_deleted , :picture, :created_at );";
     $stmt=$this->conn->prepare($query);

     $stmt->bindParam(':title', $_title);
     $stmt->bindParam(':is_draft', $_is_draft);
     $stmt->bindParam(':description', $_description);
     $stmt->bindParam(':is_active', $_is_active);
     $stmt->bindParam(':is_deleted', $_is_deleted);
     $stmt->bindParam(':picture', $_picture);
     $stmt->bindParam(':created_at', $_created_at);


     $result = $stmt->execute();

     if($result){
         $_SESSION['message']="The Product is added successfully.";
     }else{
         $_SESSION['message']="The Product is not added successfully.";
     }
     header("location:index.php");

 }
 public function update(){

     $approot= $_SERVER['DOCUMENT_ROOT'].'/crud/';
     $filename='IMG_'.time().'_'.$_FILES['picture']['name'];

     if($_FILES['picture']['name'] != ''){
         $target= $_FILES['picture']['tmp_name'];
         $destination= $approot."uploads/".$filename;

         $is_file_moved=move_uploaded_file($target,$destination);

         if($is_file_moved){
             $_picture = $filename;
         }else{
             $_picture = null;
         }
     }else{
         $_picture = $_POST['old-picture'];
     }

     $_id = $_POST['id'];
     $_title = $_POST['title'];
     if(array_key_exists('is_draft', $_POST)){
         $_is_draft = $_POST['is_draft'];
     }else{
         $_is_draft = 0;
     }
     $_description = $_POST['description'];
//$_picture = $_POST['picture'];
     $_modified_at =date('Y-m-d H:i:s',time());
     if(array_key_exists('is_active', $_POST)){
         $_is_active = $_POST['is_active'];
     }else{
         $_is_active = 0;
     }
     if(array_key_exists('is_deleted', $_POST)){
         $_is_deleted = $_POST['is_deleted'];
     }else{
         $_is_deleted  = 0;
     }



//INSERT QUERY
     $query = "UPDATE `products` SET `id` = :id, `title` = :title, `is_draft` = :is_draft,`description` = :description,`is_active` = :is_active,`is_deleted` = :is_deleted,`picture` = :picture, `modified_at` = :modified_at  WHERE `products`.`id` =:id;";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(':id', $_id);
     $stmt->bindParam(':title', $_title);
     $stmt->bindParam(':is_draft', $_is_draft);
     $stmt->bindParam(':description', $_description);
     $stmt->bindParam(':is_active', $_is_active);
     $stmt->bindParam(':is_deleted', $_is_deleted);
     $stmt->bindParam(':picture', $_picture);
     $stmt->bindParam(':modified_at', $_modified_at);

     $result = $stmt->execute();
     if($result){
         $_SESSION['message']="The Product is updated successfully.";
     }else{
         $_SESSION['message']="The Product is not updated successfully.";
     }
     header("location:index.php");
 }
 public function trash(){

     $_id=$_GET['id'];
     $_is_deleted = 1;
//var_dump($_GET);




     $query = "UPDATE `products` SET `is_deleted` = :is_deleted WHERE `products`.`id` =:id;";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(':id',$_id);
     $stmt->bindParam(':is_deleted',$_is_deleted);

     $result = $stmt->execute();
     if($result){
         $_SESSION['message']="The Product is successfully in trash .";
     }else{
         $_SESSION['message']="The Product is not in trash.";
     }
     header("location:index.php");
 }
 public function trash_index(){

     $query = "SELECT * FROM `products` WHERE is_deleted=1 ";
     $stmt = $this->conn->prepare($query);

     $result = $stmt->execute();
     $products = $stmt->fetchAll();
     return $products;
 }
 public function restore(){

     $_id=$_GET['id'];
     $_is_deleted = 0;
//var_dump($_GET);


     $query = "UPDATE `products` SET `is_deleted` = :is_deleted WHERE `products`.`id` =:id;";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(':id',$_id);
     $stmt->bindParam(':is_deleted',$_is_deleted);

     $result = $stmt->execute();
     if($result){
         $_SESSION['message']="The Product is restored successfully .";
     }else{
         $_SESSION['message']="The Product can not be restored .";
     }
     header("location:index.php");
 }


}