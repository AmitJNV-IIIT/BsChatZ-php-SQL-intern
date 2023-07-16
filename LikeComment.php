<?php

try {
    $conn = new mysqli("localhost", "root", "", "whatsapp");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO likes (post_id, user_id) VALUES (?, ?)");
    $stmt->bindParam(1, $postId);
    $stmt->bindParam(2, $userId);

    $postId = 1; // Example post ID
    $userId = 1; // Example user ID

    $stmt->execute();
    echo "Post liked successfully!";

    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $postId);
    $stmt->bindParam(2, $userId);
    $stmt->bindParam(3, $content);

    $postId = 1; // Example post ID
    $userId = 1; // Example user ID
    $content = "This is a comment"; // Example comment content

    $stmt->execute();
    echo "Comment added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
