<?php
include("connection.php");
session_start();

if (isset($_GET['postid'])) {
    $postid = $_GET['postid'];

    $stmt = $dbh->prepare("
        SELECT 
            c.comment, 
            c.comment_created_at, 
            u.userFirstName AS firstName, 
            u.userLastName AS lastName, 
            o.orgName AS orgName 
        FROM comments c
        LEFT JOIN user_tb u ON c.ucID = u.userID
        LEFT JOIN org_tb o ON c.ocID = o.orgID
        WHERE c.ucPostID = :postid OR c.ocPostID = :postid
        ORDER BY c.comment_created_at ASC
    ");
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comments as $comment) {
        if (!empty($comment['orgName'])) {
            $name = htmlspecialchars($comment['orgName']);
        } else {
            $name = htmlspecialchars($comment['firstName']) . ' ' . htmlspecialchars($comment['lastName']);
        }

        $formattedDate = date('Y-m-d', strtotime($comment['comment_created_at']));
        echo '<div class="comment"> <strong>' . $name . '</strong>, (' . htmlspecialchars($formattedDate) . ')<br>' . htmlspecialchars($comment['comment']) . '</div>';
    }
}
?>
