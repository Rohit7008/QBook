<div class="signup-wrapper">
  <div class="container signup-box">
    <h1 class="heading signup-title">Signup</h1>

    <form method="post" action="./server/requests.php">
      <div class="margin-bottom-15">
        <label for="username" class="form-label">User Name</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="enter user name">
      </div>

      <div class="margin-bottom-15">
        <label for="email" class="form-label">User Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="enter user email">
      </div>

      <div class="margin-bottom-15">
        <label for="password" class="form-label">User Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="enter user password">
      </div>

      <div class="margin-bottom-15 text-center">
        <button type="submit" name="signup" class="btn btn-primary">Signup</button>
      </div>
    </form>
     <p class="text-center">
      Already have an account?
      <a href="index.php?login=true">Login</a>
    </p>
  </div>
</div>
