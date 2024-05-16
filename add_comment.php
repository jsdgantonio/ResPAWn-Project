<?php
include("connection.php");
session_start();

if (isset($_POST['postid']) && isset($_POST['comment'])) {
    $postid = $_POST['postid'];
    $comment = $_POST['comment'];
    $userid = $_SESSION['userID'] ?? null;
    $orgid = $_SESSION['orgID'] ?? null;
    $username = '';

    if ($userid) {
        $stmt = $dbh->prepare("INSERT INTO comments (comment, comment_created_at, ucID, ucPostID) VALUES (:comment, NOW(), :ucID, :ucPostID)");
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':ucID', $userid, PDO::PARAM_INT);
        $stmt->bindParam(':ucPostID', $postid, PDO::PARAM_INT);
        $stmt->execute();

        $userStmt = $dbh->prepare("SELECT userFirstName, userLastName FROM user_tb WHERE userID = :userid");
        $userStmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $userStmt->execute();
        $user = $userStmt->fetch(PDO::FETCH_ASSOC);
        $username = htmlspecialchars($user['userFirstName']) . ' ' . htmlspecialchars($user['userLastName']);
    } else if ($orgid) {
        $stmt = $dbh->prepare("INSERT INTO comments (comment, comment_created_at, ocID, ocPostID) VALUES (:comment, NOW(), :ocID, :ocPostID)");
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':ocID', $orgid, PDO::PARAM_INT);
        $stmt->bindParam(':ocPostID', $postid, PDO::PARAM_INT);
        $stmt->execute();

        $orgStmt = $dbh->prepare("SELECT orgName FROM org_tb WHERE orgID = :orgid");
        $orgStmt->bindParam(':orgid', $orgid, PDO::PARAM_INT);
        $orgStmt->execute();
        $org = $orgStmt->fetch(PDO::FETCH_ASSOC);
        $username = htmlspecialchars($org['orgName']);
    }

    echo '<div class="comment">' . htmlspecialchars($comment) . ' - <strong>' . $username . '</strong> (Just now)</div>';
}
?>
