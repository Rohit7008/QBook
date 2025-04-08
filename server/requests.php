<?php
session_start();
include("../common/db.php");

if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

// Handle SignUp
if (isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password']; // You should hash this in production

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $result = $stmt->execute();

    if ($result) {
        $user_id = $stmt->insert_id;
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        $_SESSION["success"] = "Account created successfully ✅";
        header("Location: /qbook");
        exit();
    } else {
        $_SESSION["error"] = "User not registered ❌";
        header("Location: /qbook/signup.php");
        exit();
    }
}

// Handle Login
else if (isset($_POST['login'])) {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if ($user['password'] === $password) {
            $_SESSION["user"] = [
                "username" => $user['username'],
                "email" => $user['email'],
                "user_id" => $user['id']
            ];
            $_SESSION["success"] = "Logged in successfully ✅";
            header("Location: /qbook");
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password ❌";
            header("Location: /qbook/login.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "No user found with that email ❌";
        header("Location: /qbook/login.php");
        exit();
    }
}

// Handle Ask a Question
else if (isset($_POST["ask"])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category_id = intval($_POST['category']);
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO questions (title, description, category_id, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION["success"] = "Question posted successfully ✅";
        header("Location: /qbook");
        exit();
    } else {
        $_SESSION["error"] = "❌ Question not submitted.";
        header("Location: /qbook");
        exit();
    }
}

// Handle Answer Submission
else if (isset($_POST["submit_answer"])) {
    $answer = trim($_POST['answer_text']);
    $question_id = intval($_POST['question_id']);
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO answers (answer, question_id, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION["success"] = "Answer submitted successfully ✅";
        header("Location: /qbook?q-id=$question_id");
        exit();
    } else {
        $_SESSION["error"] = "❌ Answer not submitted.";
        header("Location: /qbook?q-id=$question_id");
        exit();
    }
}

// Handle Question Delete
else if (isset($_GET["delete"])) {
    $qid = intval($_GET["delete"]);

    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $qid);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION["success"] = "Deleted successfully ✅";
    } else {
        $_SESSION["error"] = "❌ Question not deleted.";
    }

    // Redirect back to page user came from
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '/qbook';
    header("Location: $redirect");
    exit();
}

// Handle Logout
else if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /qbook");
    exit();
}
