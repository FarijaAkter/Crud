<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 2:43 AM
 */

namespace Farija;

use PDO;
class User
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

    $query = "SELECT * FROM `users` WHERE is_deleted = 0";
    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}
public function delete(){

    $_id=$_GET['id'];
//var_dump($_GET);

    $query="DELETE FROM `users` WHERE `users`.`id` = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);

    $result = $stmt->execute();
    if($result){
        $_SESSION['message']="The User is deleted successfully.";
    }else{
        $_SESSION['message']="The User is not deleted successfully.";
    }
    header("location:index.php");
}
public function edit(){
    $_id =$_GET['id'];

//var_dump($_GET);

//insert a QUERY

    $query="SELECT * FROM `users` WHERE id=:id";
    $stmt= $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);

    $result = $stmt->execute();
    $user = $stmt->fetch();
    return $user;
}
public function show(){
    $_id =$_GET['id'];

//var_dump($_GET);
//insert a QUERY

    $query="SELECT * FROM `users` WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);

    $result = $stmt->execute();
    $user = $stmt->fetch();
    return $user;
}
public function store(){

//echo $_SERVER['DOCUMENT_ROOT'].'/crud/';
//die();

    $_fullname = $_POST['fullname'];
    $_username = $_POST['username'];
    $_email = $_POST['email'];
    $_phone = $_POST['phone'];
    $_password = $_POST['password'];


    if(array_key_exists('is_deleted', $_POST)){
        $_is_deleted  = $_POST['is_deleted'];
    }else{
        $_is_deleted = 0;
    }

    $_created_at =date('Y-m-d H:i:s',time());

//INSERT QUERY
    $query = "INSERT INTO `users` ( `fullname`, `username`, `email`, `phone`, `password`, `is_deleted`, `created_at`) VALUES ( :fullname, :username, :email, :phone, :password, :is_deleted, :created_at);";

    $stmt=$this->conn->prepare($query);

    $stmt->bindParam(':fullname', $_fullname);
    $stmt->bindParam(':username', $_username);
    $stmt->bindParam(':email', $_email);
    $stmt->bindParam(':phone', $_phone);
    $stmt->bindParam(':password', $_password);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':created_at', $_created_at);


    $result = $stmt->execute();

    if($result){
        $_SESSION['message']="The Product is added successfully.";
    }else{
        $_SESSION['message']="The Product is not added successfully.";
    }
    header("location:index.php");
}
public function update()
{

    $_id = $_POST['id'];
    $_fullname = $_POST['fullname'];
    $_username = $_POST['username'];
    $_email= $_POST['email'];
    $_phone= $_POST['phone'];
    $_password= $_POST['password'];
    if(array_key_exists('is_deleted', $_POST)){
        $_is_deleted = $_POST['is_deleted'];
    }else{
        $_is_deleted  = 0;
    }
    $_modified_at =date('Y-m-d H:i:s',time());


//INSERT QUERY
    $query = "UPDATE `users` SET `id` = :id, `fullname` = :fullname, `username` = :username, `email` = :email, `phone` = :phone, `password` = :password,`modified_at` = :modified_at WHERE `users`.`id` = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $_id);
    $stmt->bindParam(':fullname', $_fullname);
    $stmt->bindParam(':username', $_username);
    $stmt->bindParam(':email', $_email);
    $stmt->bindParam(':phone', $_phone);
    $stmt->bindParam(':password', $_password);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':modified_at', $_modified_at);

    $result = $stmt->execute();
    if($result){
        $_SESSION['message']="The User is updated successfully.";
    }else{
        $_SESSION['message']="The User is not updated successfully.";
    }
    header("location:index.php");
}
public function trash(){

    $_id=$_GET['id'];
    $_is_deleted = 1;
//var_dump($_GET);
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=localhost;dbname=ecommerce", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $query = "UPDATE `users` SET `is_deleted` = :is_deleted WHERE `users`.`id` =:id;";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);

    $result = $stmt->execute();
    if($result){
        $_SESSION['message']="The User is successfully in trash .";
    }else{
        $_SESSION['message']="The User is not in trash.";
    }
    header("location:index.php");
}
public function trash_index(){

    $query = "SELECT * FROM `users` WHERE is_deleted=1 ";
    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}
public function restore(){

    $_id=$_GET['id'];
    $_is_deleted = 0;
//var_dump($_GET);

    $query = "UPDATE `users` SET `is_deleted` = :is_deleted WHERE `users`.`id` =:id;";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->bindParam(':is_deleted',$_is_deleted);

    $result = $stmt->execute();
    if($result){
        $_SESSION['message']="The User is restored successfully .";
    }else{
        $_SESSION['message']="The User can not be restored .";
    }
    header("location:index.php");
}
}