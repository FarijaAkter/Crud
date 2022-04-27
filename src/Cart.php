<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 2:09 AM
 */

namespace Farija;

use PDO;
class Cart
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

    $query="SELECT * FROM `carts` WHERE is_deleted=0";
    $stmt=$this->conn->prepare($query);
    $result=$stmt->execute();

    $carts=$stmt->fetchAll();
    return $carts;
}
public function delete(){
    $_id=$_GET['id'];
    var_dump($_GET);


    $query= "DELETE FROM `carts` WHERE `carts`.`id` = :id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message'] = "Cart is deleted successfully";
    }else{
        $_SESSION['message'] = "Cart is not deleted successfully";
    }
    header("location:index.php");
}
public function show(){
    $webroot="http://localhost/crud/";
    /*echo "<pre>";
    print_r($_GET);
    echo "<pre>";*/
    $_id=$_GET['id'];
//var_dump($_GET);


    $query="SELECT * FROM `carts` WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $result=$stmt->execute();
    $cart=$stmt->fetch();
    return $cart;
}
public function edit(){
    $webroot="http://localhost/crud/";
    $_id=$_GET['id'];
//var_dump($_GET);

    $query="SELECT * FROM `carts` WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $result=$stmt->execute();
    $cart=$stmt->fetch();
    return $cart;
}
public function store(){
    $approot=$_SERVER['DOCUMENT_ROOT'].'/crud/';
    /*echo"<pre>";
    print_r($_POST);
    echo"</pre>";*/
    $_sid=$_POST['sid'];
//echo $_sid;
    $_product_id=$_POST['product_id'];
//echo $_product_id;
    $_product_title=$_POST['product_title'];
//echo $_product_title;

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
    $_qty=$_POST['qty'];
//echo $_qty;
    $_unite_price=$_POST['unite_price'];
    $_total_price= ($_unite_price* $_qty);

    $filename='IMG_'.time().'_'.$_FILES['picture']['name'];
    $target= $_FILES['picture']['tmp_name'];
    $destination=$approot."uploads/".$filename;
    $is_file_moved= move_uploaded_file($target,$destination);

    if($is_file_moved){
        $_picture=$filename;
    }else{
        $_picture= null;
    }


    $query= "INSERT INTO `carts` ( `sid`, 
                                `product_id`, 
                                `product_title`,
                                `is_deleted`,
                                 `qty`,
                                 `unite_price`,
                                 `total_price`,
                                 `picture`)
                          VALUES ( :sid,
                           :product_id, 
                           :product_title,
                           :is_deleted,
                            :qty, 
                            :unite_price,
                             :total_price,
                             :picture)";

    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':sid',$_sid);
    $stmt->bindParam(':product_id', $_product_id);
    $stmt->bindParam(':product_title', $_product_title);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':qty', $_qty);
    $stmt->bindParam(':unite_price', $_unite_price);
    $stmt->bindParam(':total_price', $_total_price);
    $stmt->bindParam(':picture', $_picture);

    $result=$stmt->execute();

    if($result){
        $_SESSION['message'] = "Cart is added successfully";
    }else{
        $_SESSION['message'] = "Cart is not added successfully";
    }
    header("location:index.php");
}
public function update(){

    $approot=$_SERVER['DOCUMENT_ROOT'].'/crud/';
    /*echo"<pre>";
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
    $_id = $_POST['id'];
    $_sid = $_POST['sid'];
    $_product_id= $_POST['product_id'];
    $_product_title= $_POST['product_title'];

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
    $_qty=$_POST['qty'];
    $_unite_price=$_POST['unite_price'];
    $_total_price=$_POST['unite_price']*$_POST['qty'];

//INSERT QUERY
    $query = "UPDATE `carts` SET `id` = :id, 
                            `sid` = :sid,
                             `product_id` = :product_id,
                             `product_title` = :product_title,
                             `is_active` = :is_active,
                             `is_deleted` = :is_deleted,
                             `qty` = :qty,
                             `unite_price` = :unite_price,
                             `total_price` = :total_price,
                             `picture` = :picture
                              WHERE `carts`.`id` =:id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $_id);
    $stmt->bindParam(':sid', $_sid);
    $stmt->bindParam(':product_id', $_product_id);
    $stmt->bindParam(':product_title', $_product_title);
    $stmt->bindParam(':is_active', $_is_active);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':qty', $_qty);
    $stmt->bindParam(':unite_price', $_unite_price);
    $stmt->bindParam(':total_price', $_total_price);
    $stmt->bindParam(':picture', $_picture);

    $result = $stmt->execute();
    var_dump($result);
    if($result){
        $_SESSION['message']="The cart is updated successfully.";
    }else{
        $_SESSION['message']="The cart is not updated successfully.";
    }
    header("location:index.php");
}
public function trash(){
    $_id=$_GET['id'];
    $_is_deleted = 1;
    var_dump($_GET);

    $query=  "UPDATE `carts` SET `is_deleted` = :is_deleted        
                              WHERE `carts`.`id` =:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message'] = "Cart is deleted successfully";
    }else{
        $_SESSION['message'] = "Cart is not deleted successfully";
    }
    header("location:index.php");
}
public function trash_index(){
    session_start();
//Connect to Database using PDO

    $query="SELECT * FROM `carts` WHERE is_deleted=1";
    $stmt=$this->conn->prepare($query);
    $result=$stmt->execute();

    $carts=$stmt->fetchAll();
    return $carts;
}
public function restore(){
    $_id=$_GET['id'];
    $_is_deleted = 0;
    var_dump($_GET);


    $query=  "UPDATE `carts` SET `is_deleted` = :is_deleted        
                              WHERE `carts`.`id` =:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);
    $result=$stmt->execute();
    if($result){
        $_SESSION['message'] = "Cart is deleted successfully";
    }else{
        $_SESSION['message'] = "Cart is not deleted successfully";
    }
    header("location:index.php");

}
}