<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Answers</title>

    <!-- ✅ Bootstrap (optional for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Font Awesome CDN (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mb-4 mt-4">
        <h5 class="fw-bold mb-3 text-dark">
            <i class="fas fa-comment-dots me-2 text-primary"></i>Answers:
        </h5>

        <?php
        include("./common/db.php");

        $qid = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;

        $query = "
        SELECT a.answer, u.username 
        FROM answers a
        LEFT JOIN users u ON a.user_id = u.id
        WHERE a.question_id = $qid 
        ORDER BY a.id DESC
    ";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $answer = nl2br(htmlspecialchars($row['answer']));
                $user = isset($row['username']) ? htmlspecialchars($row['username']) : "Anonymous";

                echo "
            <div class='card shadow-sm border-0 mb-3'>
                <div class='card-body'>
                    <div class='d-flex align-items-center mb-2'>
                        <i class='fas fa-user-circle fs-3 text-secondary me-2'></i>
                        <div class='fw-semibold text-dark'>$user</div>
                    </div>
                    <p class='mb-0 fs-5 text-dark'>$answer</p>
                </div>
            </div>";
            }
        } else {
            echo "<div class='text-muted'>No answers yet. Be the first to answer!</div>";
        }
        ?>
    </div>

</body>

</html>