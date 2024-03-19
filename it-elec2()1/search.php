<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];

    try {
        require_once "includes/dbc.inc.php";

        $query = "SELECT * FROM comments WHERE comments LIKE :search;";

        $stmt = $pdo->prepare($query);

        $searchTerm = "%$search%";
        $stmt->bindParam(":search", $searchTerm, PDO::PARAM_STR);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Search Results:</h3>

    <?php if (empty($results)) : ?>
        <div>
            <p>There were no results!</p>
        </div>
    <?php else : ?>
        <?php foreach ($results as $row) : ?>
            <h2><?= htmlspecialchars($row['id']) ?></h2>
            <p><?= htmlspecialchars($row['comments']) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>