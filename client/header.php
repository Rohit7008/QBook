<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <a class="navbar-brand me-auto" href="index.php">
      <img src="./public/logo.png" alt="Logo" style="height: 40px;" />
    </a>

    <div class="flex-grow-1 d-flex justify-content-center">
      <form class="d-flex w-100" action="index.php" method="GET" style="max-width: 700px;">
        <input class="form-control me-2 rounded-pill shadow-sm flex-grow-1" type="search" name="search"
          placeholder="Search questions..." aria-label="Search">
        <button class="btn btn-outline-primary rounded-pill" type="submit">Search</button>
      </form>
    </div>

    <div class="d-flex align-items-center">
      <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end ms-3" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>

          <?php if (isset($_SESSION['user']['username'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="?ask=true">Ask A Question</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id']; ?>">My Questions</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?login=true">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?signup=true">Signup</a>
            </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="?latest=true">Feed</a>
          </li>

          <?php if (isset($_SESSION['user']['username'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo ucfirst($_SESSION['user']['username']); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">View Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item text-danger" href="./server/requests.php?logout=true">Logout</a>
                </li>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>