<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 2:32 AM
 */

namespace Farija;

use PDO;
class Admin
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

    $query="SELECT * FROM `admins`";
    $stmt= $this->conn->prepare($query);
    $result=$stmt->execute();

    $admins=$stmt->fetchAll();
    return $admins;
}
public function show(){
    $_id=$_GET['id'];
//var_dump($_GET);

    $query="SELECT * FROM `admins` WHERE id=:id";
    $stmt= $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $result=$stmt->execute();

    $admin=$stmt->fetch();
    return $admin;
}
public function edit(){
    $_id=$_GET['id'];
//var_dump($_GET);

    $query="SELECT * FROM `admins` WHERE id=:id";
    $stmt= $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $result=$stmt->execute();

    $admin=$stmt->fetch();
    return $admin;
}
public function delete(){
    $_id=$_GET['id'];

//var_dump($_GET);

    $query="DELETE FROM `admins` WHERE `admins`.`id` =:id";
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
    /*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
    $_name=$_POST['name'];
//echo $_name;
    $_email=$_POST['email'];
//echo $_email;
    $_password=$_POST['password'];
//echo $_password;
    $_phone=$_POST['phone'];
//echo $_phone;


    $query="INSERT INTO `admins` ( `name`, `email`, `password`, `phone`) VALUES ( :name, :email , :password, :phone);";

    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':name',$_name);
    $stmt->bindParam(':email',$_email);
    $stmt->bindParam(':password',$_password);
    $stmt->bindParam(':phone',$_phone);
    $result=$stmt->execute();
    header("location:index.php");
}
public function update(){
    $_id=$_POST['id'];
    $_name=$_POST['name'];
    $_email=$_POST['email'];
    $_password=$_POST['password'];
    $_phone=$_POST['phone'];

    $query="UPDATE `admins` SET `id` = :id, `name` = :name, `email` = :email, `password` = :password, `phone` = :phone WHERE `admins`.`id` = :id;";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':name',$_name);
    $stmt->bindParam(':email',$_email);
    $stmt->bindParam(':password',$_password);
    $stmt->bindParam(':phone',$_phone);
    $result=$stmt->execute();
    header("location:index.php");
}
}