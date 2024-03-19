<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbc.inc.php";

        $query = "SELECT username, pwd FROM users WHERE username = :username and pwd = :pwd";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        
        $stmt->execute();
        $results = $stmt->fetch();

        if(empty($username) && empty($pwd)){
            echo "<script>alert('Username and Password are empty');window.location.href = '../login.php';</script>";
            // header("Location: ../login.php?error=Username_and_Password_is_Empty");
            exit();
        }

        else if ($results) {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $username;
                  
                header("Location: ../AccountHome.php?Successfully_Login");
                exit(); 
        } else {
           
            // header("Location: ../login.php?error=user_not_found");
            echo "<script>alert('Please enter a valid account');window.location.href = '../login.php';</script>";
            exit();
        }
    } catch (PDOException $e) {
        
        die("Query failed: " . $e->getMessage());
    }
} else {
    
    header("Location: ../index.php");
    exit();
}
?>
