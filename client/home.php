<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>QBook | Ask & Answer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f2f2f2;
      color: #333;
    }

    .hero {
      background: linear-gradient(135deg, #5e17eb, #7c3aed);
      color: #fff;
      padding: 100px 20px;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #fff;
      color: #5e17eb;
      padding: 12px 25px;
      border: none;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #e6e6ff;
    }

    .features {
      display: flex;
      justify-content: center;
      gap: 40px;
      padding: 60px 20px;
      background-color: #fff;
      text-align: center;
    }

    .feature {
      max-width: 300px;
    }

    .feature i {
      font-size: 60px;
      color: #5e17eb;
      margin-bottom: 15px;
    }

    .feature h3 {
      font-size: 1.4rem;
      margin-bottom: 10px;
    }

    .footer {
      background: #222;
      color: #ccc;
      text-align: center;
      padding: 20px 0;
    }

    @media (max-width: 768px) {
      .features {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1>Welcome to QBook</h1>
    <p>Your platform to ask questions, share knowledge, and grow together.</p>
    <button class="btn-primary" onclick="window.location.href='index.php?signup=true'">Get Started</button>
  </div>

  <div class="features">
    <div class="feature">
      <i class="fas fa-question-circle"></i>
      <h3>Ask Anything</h3>
      <p>Have a doubt? Ask about any topic and get answers from experts or peers.</p>
    </div>
    <div class="feature">
      <i class="fas fa-comments"></i>
      <h3>Answer Freely</h3>
      <p>Help others by answering questions, sharing experience, and building trust.</p>
    </div>
    <div class="feature">
      <i class="fas fa-seedling"></i>
      <h3>Grow Together</h3>
      <p>Join a community of curious minds. Learn, connect, and thrive.</p>
    </div>
  </div>

  <div class="footer">
    &copy; 2025 QBook from Roonity | Built for curiosity, by curious minds.
  </div>

</body>
</html>
