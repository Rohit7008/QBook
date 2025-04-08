<style>
    body {
        background: #f8f9fc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ask-container {
        max-width: 720px;
        margin: 60px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .ask-container:hover {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .ask-container h1 {
        text-align: center;
        font-size: 2.4rem;
        font-weight: 700;
        color: #1e1e2f;
        margin-bottom: 30px;
    }

    .form-label {
        font-weight: 600;
        color: #4b4b5a;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #ced4da;
        padding: 12px 16px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 0.15rem rgba(99, 102, 241, 0.25);
    }

    .btn-ask {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 12px 0;
        border: none;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
        transition: background 0.3s ease;
    }

    .btn-ask:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
</style>

<div class="container ask-container">
    <h1>Ask A Question</h1>

    <form action="./server/requests.php" method="post">
        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="e.g., How to use async/await in JavaScript?" required>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Explain your question in detail..." ></textarea>
        </div>

        <div class="mb-4">
            <label for="category" class="form-label">Category</label>
            <?php
            include("category.php"); // dropdown or checkbox options here
            ?>
        </div>

        <div>
            <button type="submit" name="ask" class="btn btn-ask">🚀 Ask Question</button>
        </div>
    </form>
</div>