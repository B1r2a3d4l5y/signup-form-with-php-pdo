<?php
include("database.php");


function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;

}
    
// request made when the button is submiited
if($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $password = $_POST["password"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

    
    
    if(empty($name|| $email|| $password) ) {
        header("Location:../index.html?signin=please fill in the fields");
        exit;
    } else if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../index.html?email=invalidEmail");
        exit;
        
    } else {
       
        try {
            $Sql  = "INSERT INTO users(:username, :email, :password)VALUES(:username, :email, :password)  ";
            $statement = $db->prepare($Sql);
            $data = [
                ':username ' => $name,
                ':email' => $email,
                ':password' => $password


            ];
            $statement->execute($data);
            header("location:../index.html?signup=success");
            exit;


        } catch(PDOException $error) {
            $errorMessage = $error->getMessage();
            echo $errorMessage;


        }
     
     
        }
    }
   

    


?>