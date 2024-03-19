<?php   

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="index.php">Home</a> |
    <a href="comments.php">Comments</a> |
    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Search comments..." />
        <button>Search</button>
        
    </form>
    <form action="includes/logout.php" method="post">
        <button>Logout</button>
        
    </form>

    

</body>

</html>