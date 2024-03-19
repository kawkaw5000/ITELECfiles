<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $comments = $_POST['comments'];

    try {
        require_once "dbc.inc.php"; 
        $query = "INSERT INTO comments(comments, user_id)
                  VALUES(:comments, :user_id)";
  
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":user_id", $user);

        $stmt->bindParam(":comments", $comments);
        if(empty($comments)){
            echo "<script>alert('Empty Comment');window.location.href = '../comments.php';</script>";
            exit();
        }

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        
        echo "<script>alert('You comment');window.location.href = '../comments.php';</script>";

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
