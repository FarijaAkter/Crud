<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 9:00 PM
 */

namespace Farija;

use PDO;
class Category
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

    $query = "SELECT * FROM `categories`";

    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute();

    $categorys = $stmt->fetchAll();
    return $categorys;
}
public function delete(){

    $_id = $_GET['id'];


    $query = "DELETE FROM `categories` WHERE `category`.`id` = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $_id);

    $result = $stmt->execute();

//var_dump($result);

    if ($result){
        $_SESSION['message'] = "Category is deleted successfully";
    }else{
        $_SESSION['message'] = "Category is not deleted";
    }

// this is for the location set to store.php to main home page index.php
    header("location:index.php");
}
public function edit(){
    $_id = $_GET['id'];


    $query = "SELECT * FROM `categories` WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $_id);

    $result = $stmt->execute();

    $category = $stmt->fetch();
    return $category;
}
public function show(){
    $_id = $_GET['id'];

    $query = "SELECT * FROM `categories` WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $_id);

    $result = $stmt->execute();

    $category = $stmt->fetch();
    return  $category ;
}
public function store(){

    if (array_key_exists('is_draft', $_POST)) {
        $_is_draft = $_POST['is_draft'];
    } else {
        $_is_draft = 0;
    }
    $_name = $_POST['name'];
    $_link = $_POST['link'];
//echo $_name;
    $_created_at = date('Y-m-d h:i:s', time());

    $query = "INSERT INTO `categories` ( `name`, `link`,`is_draft`,`created_at`) VALUES ( :name, :link, :is_draft, :created_at);";

    $stmt = $this->conn->prepare($query);

    $result = $stmt->execute(array(
        ':name' => $_name,
        ':link' => $_link,
        ':is_draft' => $_is_draft,
        ':created_at' => $_created_at
    ));

//$result = $stmt->execute();

//var_dump($result);


    if ($result){
        $_SESSION['message'] = "Category is added successfully";
    }else{
        $_SESSION['message'] = "Category is not added";
    }

// this is for the location set to store.php to main home page index.php
    header("location:index.php");
}
public function update(){

    if (array_key_exists('is_draft', $_POST)) {
        $_is_draft = $_POST['is_draft'];
    } else {
        $_is_draft = 0;
    }
    $_id = $_POST['id'];
    $_name = $_POST['name'];
    $_link = $_POST['link'];
//echo $_name;

    $_modified_at = date('Y-m-d h:i:s', time());

    $query = "UPDATE `categories` SET `name` = :name, `link`= :link , `is_draft`= :is_draft ,`modified_at`= :modified_at WHERE `categories`.`id` = :id";

    $stmt =$this->conn->prepare($query);

    $stmt->bindParam(':name', $_name);
    $stmt->bindParam(':id', $_id);
    $stmt->bindParam(':link', $_link);
    $stmt->bindParam(':is_draft', $_is_draft);
    $stmt->bindParam(':modified_at', $_modified_at);
    $result = $stmt->execute();

//var_dump($result);

    if ($result){
        $_SESSION['message'] = "Category is updated successfully";
    }else{
        $_SESSION['message'] = "Category is not updated";
    }

// this is for the location set to store.php to main home page index.php
    header("location:index.php");
}

}