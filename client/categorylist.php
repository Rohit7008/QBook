<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary text-center">
        📚 Explore Categories
    </h2>
    <div class="row g-3">
        <?php
        include('./common/db.php');

        $query = "SELECT * FROM category";
        $result = $conn->query($query);

        $icons = ['bi-lightbulb', 'bi-code-slash', 'bi-brush', 'bi-cpu', 'bi-graph-up-arrow', 'bi-globe2', 'bi-puzzle', 'bi-terminal', 'bi-rocket'];
        $i = 0;

        foreach ($result as $row) {
            $name = ucfirst($row['name']);
            $id = $row['id'];
            $icon = $icons[$i % count($icons)];
            $i++;

            echo "
            <div class='col-12'>
                <a href='?c-id=$id' class='text-decoration-none'>
                    <div class='card shadow-sm border-0 hover-effect'>
                        <div class='card-body d-flex align-items-center'>
                            <i class='bi $icon fs-3 text-primary me-3'></i>
                            <h5 class='mb-0 fw-semibold text-dark'>$name</h5>
                        </div>
                    </div>
                </a>
            </div>
            ";
        }
        ?>
    </div>
</div>

<!-- Hover effect -->
<style>
    .hover-effect:hover {
        transform: translateY(-2px);
        transition: 0.3s ease-in-out;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
</style>