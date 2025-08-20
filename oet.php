<?php
// Page title
$page_title = "OET (Occupational English Test)";
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
        position: fixed;
        top: 1.5rem;
        left: 1.5rem;
        z-index: 1030;
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
        background: rgba(0,0,0,0.4);
        min-height: 80vh;
        padding: 2rem;
        color: white;
    }
    .header-content h1, .header-content p {
        text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
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

  <header class="position-relative">
    <img src="img/OET.jpg" class="position-absolute w-100 h-100" style="object-fit: cover; z-index: -1;">
    <div class="header-content d-flex flex-column justify-content-between">
        <div class="pt-4">
            <img src="img/oetlogo.svg" style="height: 100px; max-width: 180px;" class="img-fluid">
        </div>
        <div class="text-start mb-4">
            <h1 class="display-4 fw-bold">Occupational English Test (OET)</h1>
            <p class="lead mt-3 col-md-8 col-lg-6">
              OET is a specialized English test for healthcare professionals that assesses clinical
              communication skills for registration, employment, or migration.
            </p>
            <a href="https://oet.com/test/book-a-test?location=Lipa%2C%20Batangas%2C%20Calabarzon%2C%20Philippines&latLng=13.941876%2C121.1644198"
              class="btn mb-5 px-4 py-2 text-white fw-bold" style="background-color: #0C470C;">Book Now</a>
        </div>
    </div>
  </header>

  <main>
    <section id="about" class="py-5">
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold">About OET</h2>
            <p class="mt-4 fs-5 text-center">
              OET stands for the Occupational English Test. Unlike general English tests, OET is
              developed exclusively for healthcare professionals—including doctors, nurses, dentists,
              pharmacists, and allied health workers. Its content is designed to mirror real-life situations in
              healthcare settings, ensuring that test takers can demonstrate their ability to communicate
              in a professional clinical context.
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
                <p class="mt-2">Approximately 50 minutes, featuring recordings of healthcare-related interactions.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-pencil-square display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Writing</h3>
                <p class="mt-2">60 minutes to complete a task (e.g., writing a referral letter) that reflects workplace communication.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-book-half display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Reading</h3>
                <p class="mt-2">About 60 minutes, with texts taken from authentic healthcare documents.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="bg-white rounded-4 text-center h-100 p-4 shadow-sm">
              <div class="card-body">
                <i class="bi bi-mic display-3" style="color: #0C470C;"></i>
                <h3 class="fs-4 fw-bold mt-3">Speaking</h3>
                <p class="mt-2">Around 20 minutes, conducted in a one-to-one interview simulating clinical scenarios.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container my-5">
      <h1 class="text-center mb-5 display-5 fw-bold">Why should you choose OET?</h1>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/oet1.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">Specifically Designed for Healthcare Professionals</h4>
              <p>The Occupational English Test (OET) is the ideal choice as it's created exclusively for the
                healthcare sector. All test materials use a familiar clinical context, making it more
                intuitive for doctors, nurses, and other health professionals to navigate compared to a
                general English exam.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/ielts_p2.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">Simulating Real-World Clinical Scenarios</h4>
              <p class="fs-6 mb-3">OET assesses language skills using tasks you perform daily. For example,
                you will write a referral letter or role-play a patient consultation. This practical
                approach tests the essential communication skills needed for safe and effective patient
                care.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/ielts_p3.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">Fostering Confidence Through Familiarity</h4>
              <p class="fs-6 mb-3">The test’s focus on medical topics allows you to use your existing
                professional knowledge and vocabulary. This familiarity builds confidence and helps you
                more accurately demonstrate your language abilities without the stress of studying unrelated
                subjects.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/ielts_p4.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">Globally Recognized and Trusted</h4>
              <p class="fs-6 mb-3">A successful OET result is a powerful asset for your career. It is widely
                accepted by healthcare regulators and employers in countries like the UK, USA, Australia,
                and Canada for registration, employment, and visa purposes.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/oet5.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">A Pathway to Professional Development</h4>
              <p class="fs-6 mb-3">Preparing for the OET is a form of practical job training. The skills
                you develop, such as writing medical correspondence and understanding consultations, are
                directly transferable to your work, making you a more effective communicator from day
                one.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow-sm bg-light">
            <img src="img/oet6.jpg" class="card-img-top object-fit-cover" style="height: 250px;">
            <div class="card-body d-flex flex-column p-4">
              <h4 class="h4 fw-bold mb-1">The Clear Choice for a Healthcare Career</h4>
              <p class="fs-6 mb-3">OET is more than a language test; it validates your ability to communicate
                in a clinical setting. Its focus on relevant skills and global recognition makes it the
                superior choice for any healthcare professional aiming to work abroad.</p>
            </div>
          </div>
        </div>
      </div>


      <div class="container my-5">
        <div class="text-center mb-5">
          <h1 class="fw-bold">How does OET work?</h1>
          <p class="text-center mx-auto fs-5 my-5 col-lg-8">
            The Occupational English Test (OET) is a language proficiency exam designed specifically for
            healthcare professionals, evaluating their English skills in a clinical context through four
            sub-tests: Listening, Reading, Writing, and Speaking, with tasks based on real-world medical
            scenarios like writing a referral letter or role-playing a patient consultation.
          </p>
        </div>

        <div class="row g-4 justify-content-center mb-5 pb-4">
          <div class="col-lg-5">
            <div class="bg-light p-4 p-md-5 rounded-4 text-center h-100 shadow-sm">
              <h3 class="fw-bold fs-4 mb-3">OET on Computer / OET on Paper</h3>
              <p class="mb-0">These tests are available at a test venue and are for healthcare professionals who need to prove their English proficiency for registration, study, and work in the healthcare sector.</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="bg-light p-4 p-md-5 rounded-4 text-center h-100 shadow-sm">
              <h3 class="fw-bold fs-4 mb-3">OET@Home</h3>
              <p class="mb-0">This is a computer-based version of OET that you can take from the comfort of your own home. It uses the same test format and tasks, and is accepted by the same organizations.</p>
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
                    Who accepts OET scores?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>
                      OET scores are recognized by regulatory bodies and healthcare employers in
                      Australia, New Zealand, the United Kingdom, and several other countries for
                      both professional registration and employment purposes.
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo">
                    How is OET scored?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>Each sub-test is graded on a letter scale from A (highest) to E
                      (lowest). Most regulatory bodies require a minimum grade of B in every
                      sub-test.</strong>
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                    aria-controls="collapseThree">
                    What is the test format and duration?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong> OET comprises four sub-tests:</strong>
                    <ul>
                        <li>Listening: ~50 minutes</li>
                        <li>Reading: 60 minutes</li>
                        <li>Writing: 60 minutes</li>
                        <li>Speaking: ~20 minutes</li>
                    </ul>
                    <strong> Total test time is approximately 3 hours, with each section
                      featuring healthcare-specific tasks.
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                    aria-controls="collapseFour">
                    How do I register for the OET exam?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>Registration is completed online via the official OET website.
                      Simply create an account, fill in your details, select your test module, date, and
                      centre, upload your ID, and make the payment.
                    </strong>
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                    aria-controls="collapseFive">
                    What should I bring on test day?
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>You must bring your original identification document (passport or
                      national ID) used during registration along with your test confirmation. Check
                      with your centre for any additional allowed items.
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                    aria-controls="collapseSix">
                    Can I retake the OET exam if I don’t achieve my desired grade?
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>Yes, there is no limit to the number of times you can take the OET
                      exam. You can re-register for a new test date at any time.</strong>
                  </div>
                </div>
              </div>

              <div class="accordion-item my-2 border-0 rounded-3 shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed p-3 rounded-3 bg-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                    aria-controls="collapseSeven">
                    What if I need to reschedule or cancel my test?
                  </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    <strong>Rescheduling or cancellation policies vary by centre. Typically, you
                      must request changes several weeks in advance and may incur an administrative
                      fee if done close to the test date. Contact your test centre for specific
                      guidelines.
                  </div>
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
