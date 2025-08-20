<?php
// Page title
$page_title = "IELTS - International English Language Testing System";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logoulit.png">
  <style>
    :root {
        --primary-color: #0C470C;
        --heading-color: #023621;
    }
    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    main {
        flex-grow: 1;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0, 0, 0, .10);
    }
    .btn-back {
        position: fixed; /* Changed from absolute for better positioning on scroll */
        top: 1.5rem;
        left: 1.5rem;
        z-index: 1030; /* Ensure it's above other content */
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: var(--primary-color);
        color: white;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background-color: var(--heading-color);
        transform: scale(1.1);
        color: white;
    }
    .btn-back i {
        font-size: 1.5rem;
    }
    ::-webkit-scrollbar {
        width: 12px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #3BA43B, #0C470C);
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #45b945, #0a3a0a);
    }
    .highlight {
        color: #3BA43B;
        font-weight: bold;
        text-decoration: underline;
        text-underline-offset: 8px;
    }
    .header-content {
        background: rgba(0,0,0,0.4); /* Added overlay for better text readability */
        min-height: 80vh;
        padding: 2rem;
    }
    .header-content h1 {
        text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    }
    .header-content p {
        text-shadow: 1px 1px 4px rgba(0,0,0,0.7);
    }
    /* Responsive Typography */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }
        .lead {
            font-size: 1rem;
        }
        .btn-back {
            width: 40px;
            height: 40px;
            top: 1rem;
            left: 1rem;
        }
        .btn-back i {
            font-size: 1.2rem;
        }
    }
  </style>
</head>

<body class="text-black">
    <a href="index.php" class="btn-back" aria-label="Go Back">
        <i class="bi bi-arrow-left"></i>
    </a>

  <header class="position-relative text-white">
    <img src="img/ielts.png" class="position-absolute w-100 h-100" style="object-fit: cover; z-index: -1;">
    <div class="header-content d-flex flex-column justify-content-between">
        <div class="pt-4">
            <img src="img/logo_ielts.png" style="height: 120px; max-width: 200px;" class="img-fluid">
        </div>
        <div class="text-start mb-4">
            <h1 class="display-4 fw-bold">International English Language Testing System (IELTS)</h1>
            <p class="lead mt-3 col-md-8 col-lg-6">
              IELTS is the top English proficiency test for study, work, and migration, assessing four key language skills
              and recognized globally.
            </p>
            <a href="https://ieltsregistration.britishcouncil.org/register-for-agent/MDhhNTQ3YjQtYmI2MC00NDRiLWI2MDQtZTQ0MjAzZDE3ZTJlOzE2MDcyOzE2NzMxNzEyMDk="
              class="btn mb-5 px-4 py-2 text-white fw-bold" style="background-color: #0C470C;">Book Now</a>
        </div>
    </div>
  </header>

  <main>
    <section id="about" class="py-5">
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold">About Us</h2>
            <p class="mt-4 fs-5 text-center">
              IELTS stands for the International English Language Testing System. Developed jointly by the British
              Council, IDP: IELTS Australia, and Cambridge Assessment English, the exam measures your proficiency in
              English through real-life language tasks. With two test types available—IELTS Academic for university
              admission and professional registration, and IELTS General Training for migration and training
              purposes—IELTS is designed to suit diverse needs.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="test-format" class="py-3 bg-light">
      <div class="container py-5">
        <div class="text-center mb-5">
          <h2 class="display-5 fw-bold">Test Format</h2>
        </div>

        <div class="row g-4 justify-content-center">
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-headphones display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Listening</h3>
                <p class="mt-2">30 minutes (plus transfer time for paper-based tests)</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-pencil-square display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Writing</h3>
                <p class="mt-2">60 minutes (Spend 20 minutes on Task 1, and 40 minutes on Task 2).</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-book-half display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Reading</h3>
                <p class="mt-2">60 minutes (plus transfer time for paper-based tests)</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-mic display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Speaking</h3>
                <p class="mt-2">11-14 minutes (scheduled the same day or within a week before or after)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 

  <div class="container my-5">
    <h1 class="text-center mb-5 display-5 fw-bold">Why should you choose IELTS?</h1>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p1.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Access new opportunities</h4>
            <p class="fs-6 mb-3">IELTS is trusted by 12,500 organisations in over 140 countries around the
              world, meaning you can study abroad at the institutions of your choice.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p2.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Advance your career</h4>
            <p class="fs-6 mb-3">Prove your English proficiency to future employers with secure and easy-to-understand
              results that highlight your communication skills.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p3.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Work internationally</h4>
            <p class="fs-6 mb-3">The Listening section of IELTS includes a range of accents and the Speaking section
              examines English used by people from different parts of the world.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p4.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Access new opportunities</h4>
            <p class="fs-6 mb-3">IELTS helps you demonstrate to immigration authorities that your level of English
              meets the required standards.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p5.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Choose the test that suits you</h4>
            <p class="fs-6 mb-3">Take the test on paper, on computer or online from the comfort of your home. With many
              testing dates available around the world, IELTS fits schedules.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm bg-light">
          <img src="img/ielts_p6.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
          <div class="card-body d-flex flex-column p-4">
            <h4 class="h4 fw-bold mb-1">Be confident in your results</h4>
            <p class="fs-6 mb-3">IELTS is a fair and accurate test. Examiners are qualified and experienced language
              specialists who focus on skills and practical communication.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="container my-5">
      <div class="text-center mb-5">
        <h1 class="fw-bold">How does IELTS work?</h1>
        <p class="text-center mx-auto fs-5 my-5 col-lg-8">
          IELTS is aimed at people who want to study in an English-speaking environment, work in or emigrate to an
          English-speaking country, or get a job in your own country where English proficiency is required. For this
          reason, there are two IELTS tests to choose from:
        </p>
      </div>

      <div class="row g-4 justify-content-center mb-5 pb-4">
        <div class="col-lg-5">
          <div class="bg-light p-4 p-md-5 rounded-4 text-center h-100 shadow-sm">
            <h3 class="fw-bold fs-4 mb-3">IELTS Academic</h3>
            <p class="mb-0">This test can help you secure university acceptance, student visas, and prove
              your English ability to professional organisations.</p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="bg-light p-4 p-md-5 rounded-4 text-center h-100 shadow-sm">
            <h3 class="fw-bold fs-4 mb-3">IELTS General Training</h3>
            <p class="mb-0">This test assesses your workplace English skills and helps demonstrate your
              level when applying to English-speaking companies.</p>
          </div>
        </div>
      </div>

      <div class="text-center mb-4">
        <h2 class="fw-bold">Frequently Asked Questions</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="faqAccordion">

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                  aria-controls="collapseOne">
                  What is the difference between IELTS Academic and General Training?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>
                    IELTS Academic is designed for those applying for higher education or professional registration,
                    while IELTS General Training is geared toward work, training, or migration purposes.
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                  aria-controls="collapseTwo">
                  How long is the IELTS exam?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>The exam takes approximately 2 hours and 45 minutes in total, with Listening, Reading, and
                    Writing completed in one sitting and the Speaking test scheduled on the same day or within a week
                    before/after.</strong>
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                  aria-controls="collapseThree">
                  How is the IELTS scored?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>Each section is scored on a 9-band scale. The Overall Band Score is the average of the four
                    skills, rounded to the nearest half band.
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                  aria-controls="collapseFour">
                  What documents do I need to bring on test day?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>You must bring the original identification document (passport or national ID) you used during
                    registration, along with your registration confirmation.</strong>
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                  aria-controls="collapseFive">
                  How do I register for the IELTS exam?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>You can register online via the official IELTS website or your local test centre’s portal.
                    Complete the application, upload your ID, pay the fee, and receive your confirmation details.
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                  aria-controls="collapseSix">
                  What if I need to reschedule or cancel my test?
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>Rescheduling or cancellation policies vary by centre. Typically, you must request changes
                    several weeks in advance and may incur an administrative fee if done close to the test date. Contact
                    your test centre for specific guidelines.</strong>
                </div>
              </div>
            </div>

            <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                  aria-controls="collapseSeven">
                  Can I take IELTS online?
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <strong>In some regions, IELTS Online is available. It has the same format and scoring as the
                    paper-based or computer-delivered test but allows you to take the exam from a private location with
                    a stable internet connection.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>
<div id="footer-placeholder">
    <?php include 'footer.php'; ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
