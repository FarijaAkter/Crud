<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/18/2022
 * Time: 3:21 AM
 */

namespace Farija;

use PDO;
class Contact
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

     $query = "SELECT * FROM `contacts`";

     $stmt = $this->conn->prepare($query);

     $result = $stmt->execute();

     $contacts = $stmt->fetchAll();
     return $contacts;
 }
 public function delete(){

     $_id = $_GET['id'];

     $query = "DELETE FROM `contacts` WHERE `contacts`.`id` = :id";

     $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $_id);

     $result = $stmt->execute();

//var_dump($result);

     if ($result){
         $_SESSION['message'] = "Contact is deleted successfully";
     }else{
         $_SESSION['message'] = "Contact is not deleted";
     }

// this is for the location set to store.php to main home page index.php
     header("location:index.php");
 }
 public function edit(){
     $_id = $_GET['id'];


     $query = "SELECT * FROM `contacts` WHERE id = :id";

     $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $_id);

     $result = $stmt->execute();

     $contact = $stmt->fetch();
     return $contact;

 }
 public function show(){
     $_id = $_GET['id'];

     $query = "SELECT * FROM `contacts` WHERE id = :id";

     $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $_id);

     $result = $stmt->execute();

     $contact = $stmt->fetch();
     return $contact;
 }
 public function store(){

     $_name = $_POST['name'];
     $_email = $_POST['email'];
     $_phone = $_POST['phone'];
     $_subject = $_POST['subject'];
//echo $_title;

     $query = "INSERT INTO `contacts` ( `name`, `email`,`phone`, `subject`) VALUES (:name, :email, :phone, :subject)";

     $stmt = $this->conn->prepare($query);

     $result = $stmt->execute(array(
         ':name' => $_name,
         ':email' => $_email,
         ':phone' => $_phone,
         ':subject' => $_subject
     ));

//$result = $stmt->execute();

//var_dump($result);


     if ($result){
         $_SESSION['message'] = "Contact is added successfully";
     }else{
         $_SESSION['message'] = "Contact is not added";
     }

// this is for the location set to store.php to main home page index.php
     header("location:index.php");
 }
 public function update(){

     $_id = $_POST['id'];
     $_name = $_POST['name'];
     $_email = $_POST['email'];
     $_phone = $_POST['phone'];
     $_subject = $_POST['subject'];
//echo $_name;

     $query = "UPDATE `contacts` SET `name` = :name, 
                               `email` = :email, 
                               `phone` = :phone,
                               `subject` = :subject
          WHERE `contacts`.`id` = :id";

     $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $_id);
     $stmt->bindParam(':name', $_name);
     $stmt->bindParam(':email', $_email);
     $stmt->bindParam(':phone', $_phone);
     $stmt->bindParam(':subject', $_subject);

     $result = $stmt->execute();

//var_dump($result);

     if ($result){
         $_SESSION['message'] = "Contact is updated successfully";
     }else{
         $_SESSION['message'] = "Contact is not updated";
     }

// this is for the location set to store.php to main home page index.php
     header("location:index.php");
 }
}