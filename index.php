<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QBook</title>
    <?php include('./client/commonFiles.php'); ?>
</head>

<body>
    <?php
    session_start();
    include('./client/header.php');

    // Signup route
    if (isset($_GET['signup']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include('./client/signup.php');

        // Login route
    } else if (isset($_GET['login']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include('./client/login.php');

        // Ask a question
    } else if (isset($_GET['ask']) && $_GET['ask']) {
        include('./client/ask.php');

        // Question details view
    } else if (isset($_GET['q-id']) && $_GET['q-id']) {
        $qid = $_GET['q-id'];
        include('./client/question-details.php');

        // Questions by category
    } else if (isset($_GET['c-id']) && $_GET['c-id']) {
        $cid = $_GET['c-id'];
        include('./client/feed.php');

        // Questions by user
    } else if (isset($_GET['u-id']) && $_GET['u-id']) {
        $uid = $_GET['u-id'];
        include('./client/feed.php');

        // Latest questions feed
    } else if (isset($_GET['latest']) && $_GET['latest']) {
        include('./client/feed.php');

        // Search results
    } else if (isset($_GET['search']) && $_GET['search']) {
        $search = $_GET['search'];
        include('./client/feed.php');

        // Default fallback – show questions feed
    } else {
        include('./client/home.php');
    }
    ?>
</body>

</html>