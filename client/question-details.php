<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("./common/db.php");

// Get question ID safely
$qid = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;
if (!$qid) {
    echo "<div class='alert alert-danger'>Invalid or missing question ID.</div>";
    exit;
}

// Fetch the question details using prepared statement
$stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->bind_param("i", $qid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<div class='alert alert-warning'>❌ Question not found.</div>";
    exit;
}

$cid = $row['category_id'];

// Fetch category name
$catStmt = $conn->prepare("SELECT name FROM category WHERE id = ?");
$catStmt->bind_param("i", $cid);
$catStmt->execute();
$catResult = $catStmt->get_result();
$categoryRow = $catResult->fetch_assoc();
if (!$categoryRow) {
    $categoryRow = ['name' => 'General'];
}
?>

<div class="container mt-5">
    <!-- Page Title -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">
            <i class="bi bi-chat-left-text-fill text-primary me-2"></i> Answer Question
        </h2>
        <hr class="w-25 mx-auto" style="height: 3px; background-color: #0d6efd; border: none;">
    </div>

    <div class="row">
        <!-- Left Content -->
        <div class="col-lg-8">
            <!-- Question Box -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-primary fw-bold mb-0">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h3>
                        <span class="badge bg-secondary fs-6">
                            <?php echo isset($categoryRow['name']) ? ucfirst(htmlspecialchars($categoryRow['name'])) : 'General'; ?>
                        </span>
                    </div>
                    <p class="text-muted fs-5 mb-0">
                        <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                    </p>
                </div>
            </div>

            <!-- Answer Form -->
            <?php if (isset($_SESSION['user'])): ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="mb-3 fw-semibold">Write your answer</h5>
                        <form id="answerForm" action="./server/requests.php" method="post" onsubmit="return confirmSubmit();">
                            <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                            <textarea name="answer_text" class="form-control mb-3" rows="4" placeholder="Your answer..." required></textarea>
                            <button type="submit" name="submit_answer" class="btn btn-primary">Submit Answer</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info">Please <a href="?login=true">log in</a> to write an answer.</div>
            <?php endif; ?>

            <!-- Include Answers -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold text-dark mb-3"></h5>
                    <?php include("answers.php"); ?>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="text-dark mb-3 fw-semibold">Related Questions</h5>
                    <div class="list-group">
                        <?php
                        $relatedStmt = $conn->prepare("SELECT id, title FROM questions WHERE category_id = ? AND id != ? ORDER BY id DESC LIMIT 5");
                        $relatedStmt->bind_param("ii", $cid, $qid);
                        $relatedStmt->execute();
                        $relatedResult = $relatedStmt->get_result();

                        if ($relatedResult->num_rows > 0) {
                            while ($relRow = $relatedResult->fetch_assoc()) {
                                $relId = $relRow['id'];
                                $relTitle = htmlspecialchars($relRow['title']);
                                echo "<a href='?q-id=$relId' class='list-group-item list-group-item-action'>$relTitle</a>";
                            }
                        } else {
                            echo "<div class='text-muted'>No related questions found.</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ JavaScript to alert only on submit (not on refresh) -->
<script>
    function confirmSubmit() {
        alert("✅ Answer submitted successfully!");
        return true; // continue with form submission
    }
</script>