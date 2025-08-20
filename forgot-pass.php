<?php
// Page title
$page_title = "RAIS Create - Forgot Password";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logoulit.png" />
  <style>
    /* --- General & Background Styles --- */
    body {
      font-family: 'Poppins', sans-serif;
      animation: fadeIn 1s ease-in-out;
    }

    .video-bg {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -2;
      filter: blur(2px) brightness(0.8);
      /* Consistent background effect */
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    /* --- Keyframe Animations --- */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes popIn {
      from {
        opacity: 0;
        transform: scale(0.95);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* --- Main Form Container --- */
    .form-container {
      background: rgba(0, 4, 4, 0.25);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      max-width: 900px;
      width: 100%;
      animation: popIn 0.6s ease-out forwards;
      opacity: 0;
      animation-delay: 0.3s;
    }

    /* --- Branding Section on Left --- */
    .branding-section {
      background-color: #0C470C;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }
    
    /* Animation for branding elements */
    .branding-section > * {
        opacity: 0;
        animation: slideIn 0.8s ease-out forwards;
    }

    .branding-section img { animation-delay: 0.5s; }
    .branding-section h2 { animation-delay: 0.6s; }
    .branding-section p { animation-delay: 0.7s; }


    .form-section {
      padding: 3rem;
    }

    /* --- Form Input Field --- */
    .form-control {
      border: none;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      transition: all 0.3s ease;
    }
    
    /* Style for floating label */
    .form-floating > label {
        color: #ddd;
    }
    
    .form-control::placeholder {
      color: #ddd;
    }

    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 0 0.25rem rgba(12, 71, 12, 0.5);
      border-color: #106210;
      color: white;
    }
    
    /* Ensure label color changes correctly on focus */
    .form-floating > .form-control:focus ~ label {
        color: #a5d6a7;
    }


    /* --- Custom Button --- */
    .btn-custom {
      background-color: #0C470C;
      border-radius: 25px;
      padding: 10px 25px;
      transition: all 0.3s ease;
      border: none;
    }

    .btn-custom:hover {
      background-color: #106210;
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-custom:active {
      transform: translateY(0);
      box-shadow: none;
    }


    /* --- Link Style --- */
    .back-link {
      transition: color 0.3s ease;
    }

    .back-link:hover {
      color: #a5d6a7 !important;
    }

    /* --- Responsive Adjustments --- */
    @media (max-width: 991.98px) {
      .branding-section {
        border-radius: 20px 20px 0 0;
      }

      .form-container {
        max-width: 500px;
      }
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 p-3">

  <video autoplay muted loop class="video-bg">
    <source src="vids/canadaaa.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <div class="overlay"></div>

  <main class="form-container">
    <div class="row g-0">
      <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-center align-items-center text-white p-5 branding-section">
        <img src="img/logowhite.png" alt="Company Logo" style="width: 120px; height: auto; margin-bottom: 1rem;">
        <h2 class="fw-bold mb-3">RAIS Create</h2>
        <p class="text-center small">Your trusted partner in Canadian immigration. Let's get you back on track.</p>
      </div>
      <div class="col-lg-7 text-white form-section text-center">
        <h2 class="mb-3 fs-2 fw-bold">Forgot Password?</h2>
        <p class="mb-4">No problem. Enter your email below and we'll send you a link to reset it.</p>
        <form>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" placeholder="Enter your email" required>
            <label for="floatingEmail">Enter your email</label>
          </div>
          <button type="submit" class="btn btn-custom text-white mt-3 fw-bold">
            Send Reset Link
          </button>
        </form>
        <a href="login.php" class="d-block mt-4 text-white text-decoration-none back-link">Back to Login</a>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
