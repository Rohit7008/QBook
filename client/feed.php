<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container my-5">
    <h2 class="mb-4 text-primary fw-bold">🧠 Explore Questions</h2>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                {$_SESSION['success']}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        unset($_SESSION['success']);
    }
    ?>

    <div class="row">
        <div class="col-md-8">
            <?php
            include("./common/db.php");

            $cid = isset($_GET["c-id"]) ? intval($_GET["c-id"]) : null;
            $uid = isset($_GET["u-id"]) ? intval($_GET["u-id"]) : null;
            $search = isset($_GET["search"]) ? mysqli_real_escape_string($conn, $_GET["search"]) : null;

            if ($cid) {
                $query = "SELECT * FROM questions WHERE category_id=$cid";
            } elseif ($uid) {
                $query = "SELECT * FROM questions WHERE user_id=$uid";
            } elseif (isset($_GET["latest"])) {
                $query = "SELECT * FROM questions ORDER BY id DESC";
            } elseif ($search) {
                $query = "SELECT * FROM questions WHERE `title` LIKE '%$search%'";
            } else {
                $query = "SELECT * FROM questions";
            }

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                foreach ($result as $row) {
                    $title = htmlspecialchars($row['title']);
                    $desc = htmlspecialchars(substr($row['description'], 0, 120)) . "...";
                    $id = $row['id'];
                    $category_id = $row['category_id'];
                    $question_user_id = $row['user_id'];

                    // Get category name
                    $catQuery = "SELECT name FROM category WHERE id=$category_id";
                    $catResult = $conn->query($catQuery);
                    $categoryName = $catResult && $catResult->num_rows > 0 ? $catResult->fetch_assoc()['name'] : 'General';

                    // Show delete link if user owns question
                    $deleteLink = '';
                    if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['user_id'] == $question_user_id) {
                        $redirect = urlencode($_SERVER['REQUEST_URI']);
                        $deleteLink = "
                            <a href='./server/requests.php?delete=$id&redirect=$redirect' 
                               class='btn btn-outline-danger btn-sm rounded-pill px-3 py-1 mt-2 d-inline-flex align-items-center gap-1' 
                               onclick=\"return confirm('Are you sure you want to delete this question?')\">
                               <i class='bi bi-trash'></i> Delete
                            </a>
                        ";
                    }

                    echo "
                    <div class='card mb-3 shadow-sm border border-light rounded-4'>
                        <div class='card-body d-flex justify-content-between align-items-start'>
                            <div>
                                <h5 class='card-title mb-1'>
                                    <a href='?q-id=$id' class='text-decoration-none text-dark fw-semibold'>
                                        $title
                                    </a>
                                </h5>
                                <p class='card-text text-muted small mb-2'>$desc</p>
                                $deleteLink
                            </div>
                            <span class='badge bg-secondary px-3 py-2'>$categoryName</span>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "<p class='text-muted'>No questions found.</p>";
            }
            ?>
        </div>

        <div class="col-md-4">
            <div class="sticky-top" style="top: 80px;">
                <?php include('categorylist.php'); ?>
            </div>
        </div>
    </div>
</div>