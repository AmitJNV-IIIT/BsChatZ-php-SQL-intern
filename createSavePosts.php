<?php

try {
    $conn = new mysqli("localhost", "root", "", "whatsapp");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
    $stmt->bindParam(1, $userId);
    $stmt->bindParam(2, $content);

    $userId = 1; // Example user ID
    $content = "This is a new post"; // Example post content

    $stmt->execute();
    echo "Post created and saved successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
