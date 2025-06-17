<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    $sql = "INSERT INTO stories (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: myjournal-index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Story</title>
    <link rel="stylesheet" href="myjournal-style.css">
</head>
<body>
    <header>
        <div class="nav-left">
            <a href="myjournal-index.php" class="logo">My Journal</a>
        </div>
        <div class="nav-right">
            <a href="myjournal-add.php" class="btn">➕ Add New Story</a>
        </div>
    </header>

    <main>
        <h2>Add a New Story</h2>
        <form method="post">
            <input type="text" name="title" placeholder="Story Title" required><br>
            <textarea name="content" placeholder="Write your story..." required></textarea><br>
            <button type="submit">Save</button>
        </form>
    </main>
</body>
</html>
