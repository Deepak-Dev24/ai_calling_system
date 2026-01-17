<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Syne', sans-serif;
      background: #f0f0f0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 16px;
      overflow: hidden;
    }

    /* Animated background blobs */
    .blob {
      position: absolute;
      width: 420px;
      height: 420px;
      border-radius: 50%;
      filter: blur(90px);
      opacity: 0.6;
      animation: float 18s infinite ease-in-out;
    }

    .blob.blue {
      background: #00f6ff;
      top: -15%;
      right: -15%;
    }

    .blob.pink {
      background: #ff4ecd;
      bottom: -20%;
      left: -15%;
      animation-delay: -6s;
    }

    @keyframes float {
      0%,100% { transform: translate(0,0); }
      50% { transform: translate(40px,-40px); }
    }

    /* Login Card */
    .login-card {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 380px;
      padding: 2rem;
      border-radius: 18px;
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.15);
      box-shadow: 0 25px 60px rgba(0,0,0,0.4);
    }

    .login-card h2 {
      text-align: center;
      font-size: 1.7rem;
      margin-bottom: 1.6rem;
      background: linear-gradient(90deg,#00f6ff,#c77dff,#ff4ecd);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    label {
      font-size: 0.85rem;
      color: #000;
      margin-bottom: 0.35rem;
      display: block;
    }

    input {
      width: 100%;
      height: 44px;
      border-radius: 10px;
      border: 1px solid rgba(255,255,255,0.25);
      background: rgba(255,255,255,0.1);
      color: #000;
      padding: 0 12px;
      font-size: 0.95rem;
      margin-bottom: 1.1rem;
      outline: none;
    }

    input::placeholder {
      color: #777;
    }

    input:focus {
      border-color: #00f6ff;
      box-shadow: 0 0 14px rgba(0,246,255,0.3);
    }

    button {
      width: 100%;
      height: 46px;
      border-radius: 12px;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      color: #05060f;
      background: linear-gradient(90deg,#00f6ff,#c77dff,#ff4ecd);
      background-size: 200%;
      transition: 0.3s ease;
    }

    button:hover {
      background-position: right;
      transform: scale(1.02);
    }

    .error {
      margin-top: 0.9rem;
      text-align: center;
      font-size: 0.8rem;
      color: #ff6b6b;
    }

    .admin-note {
      text-align: center;
      margin-top: 1.3rem;
      font-size: 0.75rem;
      color: #272b31;
    }

    /* Mobile */
    @media (max-width: 480px) {
      .login-card {
        padding: 1.6rem;
        border-radius: 14px;
      }

      .login-card h2 {
        font-size: 1.5rem;
      }

      input, button {
        height: 42px;
        font-size: 0.9rem;
      }

      .blob {
        width: 300px;
        height: 300px;
      }
    }

    /* Tablets */
    @media (max-width: 768px) {
      .login-card {
        max-width: 90%;
      }
    }

    /* Large screens */
    @media (min-width: 1400px) {
      .login-card {
        max-width: 420px;
        padding: 2.8rem;
      }

      .login-card h2 {
        font-size: 2rem;
      }
    }
    /* H1 Animation */
.page-title {
  position: absolute;
  top: 5%;
  width: 100%;
  text-align: center;
  font-weight: 700;
  line-height: 1.2;
  padding: 0 16px;

  font-size: clamp(1.6rem, 4vw, 2.8rem);

  background: linear-gradient(90deg,#00f6ff,#c77dff,#ff4ecd);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

  opacity: 0;
  animation:
    slideFade 1.2s ease-out forwards,
    glowPulse 3s ease-in-out infinite 1.2s;
}

/* Slide + Fade */
@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(-25px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Soft Glow Pulse */
@keyframes glowPulse {
  0%, 100% {
    text-shadow: 0 0 8px rgba(0,246,255,0.25);
  }
  50% {
    text-shadow:
      0 0 14px rgba(199,125,255,0.4),
      0 0 22px rgba(255,78,205,0.35);
  }
}

/* Mobile tuning */
@media (max-width: 480px) {
  .page-title {
    top: 3%;
    animation:
      slideFade 1s ease-out forwards,
      glowPulse 3s ease-in-out infinite 1s;
  }
}


  </style>
</head>

<body>
  <h1 class="page-title">Welcome to Sushrit Eye Hospital</h1>
  <!-- Background blobs -->
  <div class="blob blue"></div>
  <div class="blob pink"></div>
    
  <!-- Login Card -->
  <form class="login-card" method="POST" action="verify_login.php">

    <h2>Admin Panel Login</h2>

    <label>Username</label>
    <input type="text" name="username" placeholder="Admin username" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Admin password" required>

    <button type="submit">Sign In</button>

    <?php if (isset($_GET['error'])): ?>
      <div class="error">Invalid admin credentials</div>
    <?php endif; ?>

    <div class="admin-note">
      Authorized access only
    </div>

  </form>

</body>
</html>
