<?php
// --- MOCK USER DATA ---
// In a real application, this data would come from a database after a user logs in.
$userProfile = [
    'firstName' => 'Juan',
    'lastName' => 'Dela Cruz',
    'email' => 'juan.delacruz@example.com',
    'contact' => '(+63) 987 654 3210',
    'location' => 'Lipa City, Batangas',
    'birthday' => '1990-01-15', // YYYY-MM-DD format for date input
    'facebook' => 'https://facebook.com/juandelacruz',
    'instagram' => 'https://instagram.com/juandelacruz',
    'gmail' => 'juan.delacruz@example.com',
    'profileImage' => null,
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RAIS Profile</title>
    <link rel="icon" href="../img/logoulit.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        :root {
            --rais-primary-green: #004d40;
            /* Dark Navy Green for primary elements */
            --rais-dark-green: #00332c;
            /* Even Darker Navy Green for hover states */
            --rais-text-dark: #333333;
            --rais-text-light: #525252;
            --rais-card-bg: #FFFFFF;
            --rais-light-gray: #E8E8E8;
            --rais-progress-bg: #D9D9D9;
            --rais-progress-active: var(--rais-primary-green);
            /* Use primary green for progress */
            --rais-bg-light: #F7F7F7;
            --rais-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            --rais-button-maroon: #811F1D;
            /* Maroon for buttons, badges, floating elements */
            --rais-highlight-light-green: #98FB98;
            /* Light Green for tour highlights */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--rais-light-gray);
            color: var(--rais-text-dark);
            overflow: hidden; /* Prevent body scroll */
        }

        .main-wrapper {
            display: flex;
            height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: var(--rais-primary-green);
            width: 70px;
            flex-shrink: 0;
            color: white;
            padding: 30px 0;
            box-shadow: var(--rais-shadow);
            transition: width 0.3s ease-in-out;
            overflow: hidden;
            position: fixed;
            top: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 1031;
        }

        .sidebar:hover {
            width: 280px;
        }

        .sidebar .logo {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar:hover .logo {
            opacity: 1;
        }

        .sidebar .nav {
            flex-grow: 1;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: 500;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            white-space: nowrap;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: var(--rais-dark-green);
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
            min-width: 20px;
            text-align: center;
        }

        .sidebar .nav-link span {
            opacity: 0;
            transition: opacity 0.1s ease-in-out 0.2s;
        }

        .sidebar:hover .nav-link span {
            opacity: 1;
        }

        .sidebar .footer-text {
            font-size: 0.8rem;
            color: #bbb;
            text-align: center;
            padding: 15px 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            margin-top: auto;
        }

        .sidebar:hover .footer-text {
            opacity: 1;
        }

        .content-area {
            flex-grow: 1;
            height: 100vh;
            overflow-y: auto;
            margin-left: 70px;
        }

        /* Header Styles */
        .header {
            background-color: var(--rais-bg-light);
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 25px;
            box-shadow: var(--rais-shadow);
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        
        .header-brand {
            gap: 10px;
        }

        .header-logo-img {
            height: 100px;
            width: auto;
            object-fit: contain;
        }

        .header-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--rais-text-dark);
            white-space: nowrap;
        }

        .user-status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-status .badge {
            background-color: var(--rais-button-maroon);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 5px 15px;
            border-radius: 20px;
        }

        .user-status .btn {
            color: var(--rais-text-light);
            font-size: 1.5rem;
            padding: 0;
        }
        
        .power-btn i {
            color: #dc3545;
        }

        .power-btn:hover i {
            color: #a71d2a;
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
            padding: 30px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-content h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .content-card {
            background-color: var(--rais-card-bg);
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            padding: 30px;
        }

        .profile-view {
            text-align: center;
        }

        .profile-view .profile-icon {
            font-size: 6rem;
            color: var(--rais-primary-green);
        }

        .profile-view .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .profile-view .profile-detail {
            font-size: 0.9rem;
            color: var(--rais-text-light);
            margin-bottom: 5px;
        }

        .profile-edit-form {
            display: none;
        }

        .profile-edit-form .form-label {
            font-weight: 600;
        }

        .profile-edit-form .btn-primary {
            background-color: var(--rais-button-maroon);
            border: none;
            transition: background-color 0.2s;
        }

        .profile-edit-form .btn-primary:hover {
            background-color: var(--rais-dark-green);
        }

        /* Floating Button */
        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--rais-button-maroon);
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: background-color 0.2s;
            z-index: 100;
        }

        .floating-btn:hover {
            background-color: var(--rais-dark-green);
        }

        /* Collapsible Chatbox */
        .chat-container {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 350px;
            max-height: 500px;
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            display: flex;
            flex-direction: column;
            z-index: 99;
            transform: translateY(100%);
            opacity: 0;
            visibility: hidden;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .chat-container.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .chat-header {
            background-color: var(--rais-primary-green);
            color: white;
            padding: 1rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            cursor: pointer;
        }

        .chat-body {
            padding: 1rem;
            flex-grow: 1;
            overflow-y: auto;
            background-color: var(--rais-bg-light);
            display: flex;
            flex-direction: column-reverse;
            height: 350px;
        }

        .chat-footer {
            padding: 1rem;
            border-top: 1px solid var(--rais-light-gray);
        }

        .chat-footer .input-group {
            border-radius: 20px;
        }

        .chat-footer .form-control {
            border-radius: 20px 0 0 20px;
        }

        .chat-toggle-btn {
            position: fixed;
            bottom: 30px;
            right: 100px;
            background-color: var(--rais-button-maroon);
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 100;
        }
        
        /* Full-Screen Chat Styles for MOBILE */
        #full-screen-chat {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: var(--rais-bg-light);
            z-index: 2000;
            display: none;
            flex-direction: column;
        }

        .chat-header-fullscreen {
            display: flex;
            align-items: center;
            padding: 1rem;
            background-color: var(--rais-primary-green);
            color: white;
            flex-shrink: 0;
        }

        .back-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 1rem;
        }

        .chat-title-fullscreen {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .chat-body-fullscreen {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1rem;
            display: flex;
            flex-direction: column-reverse;
        }

        .chat-footer-fullscreen {
            padding: 1rem;
            border-top: 1px solid var(--rais-light-gray);
            background-color: white;
            flex-shrink: 0;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
                padding-bottom: 50px;
                overflow: auto;
            }

            .main-wrapper {
                flex-direction: column;
                height: auto;
            }
            
            .content-area {
                height: auto;
                overflow-y: visible;
                margin-left: 0;
            }

            .header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1030;
            }

            .header .logo-img {
                height: 120px;
                width: 120px;
            }
            
            .header-title {
                display: none;
            }

            .main-content {
                padding-top: 15px;
            }

            /* Transform sidebar into a bottom navigation bar */
            .sidebar {
                width: 100%;
                height: 50px;
                position: fixed;
                top: auto;
                bottom: 0;
                left: 0;
                z-index: 1029;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                padding: 0;
                transition: none;
            }

            .sidebar:hover {
                width: 100%;
            }

            .sidebar .logo,
            .sidebar .footer-text,
            .profile-section {
                display: none;
            }

            .sidebar .nav {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                flex-grow: 1;
                height: 100%;
            }

            .sidebar .nav-link {
                flex: 1;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                padding: 0 10px;
                gap: 0;
                height: 100%;
            }

            .sidebar .nav-link:hover {
                background-color: var(--rais-dark-green);
            }

            .sidebar .nav-link i {
                font-size: 1.5rem;
                margin-bottom: 0;
            }

            .sidebar .nav-link span,
            .sidebar:hover .nav-link span {
                display: none;
            }

            .floating-btn {
                bottom: 80px;
                right: 15px;
            }

            .chat-toggle-btn {
                bottom: 80px;
                right: 85px;
            }
            
            .chat-container {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar d-flex flex-column">
            <div class="logo">RAIS</div>
            <nav class="nav flex-column">
                <a class="nav-link" href="dashboard.php"><i class="bi bi-house-door-fill"></i><span>Dashboard</span></a>
                <a class="nav-link" href="book-consultation.php"><i class="bi bi-calendar-check"></i><span>Book
                        Consultation</span></a>
                <a class="nav-link" href="statement-of-account.php"><i class="bi bi-receipt"></i><span>Statement of
                        Account</span></a>
                <a class="nav-link" href="documents.php"><i class="bi bi-file-earmark-text"></i><span>Documents</span></a>
                <a class="nav-link" href="forms.php"><i class="bi bi-journal-text"></i><span>Forms</span></a>
                <a class="nav-link" href="notifications.php"><i class="bi bi-bell"></i><span>Notifications</span></a>
                <a class="nav-link" href="settings.php"><i class="bi bi-gear"></i><span>Settings</span></a>
                <a class="nav-link active" href="profile.php"><i class="bi bi-person-circle"></i><span>Profile</span></a>
            </nav>

            <div class="mt-auto footer-text">
                &copy; <?php echo date("Y"); ?> RAIS
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="content-area">
            <!-- Header -->
            <div class="header">
                <div class="header-brand d-flex align-items-center">
                    <img src="../img/logo.png" alt="RAIS Logo" class="header-logo-img">
                    <span class="header-title">Roman & Associates Immigration Services</span>
                </div>
                <div class="user-status d-flex align-items-center gap-2">
                    <div id="headerDate" class="me-3" style="font-weight: 500; color: var(--rais-text-light);"></div>
                    <a href="../index.html" class="btn btn-link power-btn"><i class="bi bi-power"></i></a>
                    <span class="badge">ACTIVE</span>
                </div>
            </div>

            <!-- Main Content -->
            <main class="main-content">
                <h1>Profile</h1>
                <div class="content-card">
                    <div id="profile-view" class="profile-view">
                        <div class="profile-display-area" id="profileViewImageContainer">
                            <!-- Profile image or icon will be rendered here by JS -->
                        </div>
                        <h5 class="profile-name" id="profileViewName">Firstname Lastname</h5>
                        <hr>
                        <div class="text-start">
                            <p class="profile-detail"><strong>Email:</strong> <span id="viewEmail">user.email@example.com</span></p>
                            <p class="profile-detail"><strong>Contact:</strong> <span id="viewContact">(+63) 987 654 3210</span></p>
                            <p class="profile-detail"><strong>Location:</strong> <span id="viewLocation">Your City, Your
                                    Country</span></p>
                            <p class="profile-detail"><strong>Birthday:</strong> <span id="viewBirthday">MM/DD/YYYY</span></p>
                            <p class="profile-detail"><strong>Facebook:</strong> <a href="#" id="viewFacebook" target="_blank"></a>
                            </p>
                            <p class="profile-detail"><strong>Instagram:</strong> <a href="#" id="viewInstagram" target="_blank"></a>
                            </p>
                            <p class="profile-detail"><strong>Gmail:</strong> <a href="#" id="viewGmail" target="_blank"></a></p>
                        </div>
                        <button id="editProfileBtn" class="btn btn-primary mt-4">Edit Profile</button>
                    </div>

                    <form id="profile-edit-form" class="profile-edit-form">
                        <div class="mb-3 text-center">
                            <img id="profileImagePreview" src="https://placehold.co/100" alt="Profile Preview"
                                class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            <input class="form-control" type="file" id="profileImageUpload">
                            <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="removeProfileImageBtn"
                                style="color: var(--rais-primary-green); border-color: var(--rais-primary-green);">Remove Image</button>
                        </div>
                        <div class="mb-3">
                            <label for="editFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="editFirstName" value="Firstname">
                        </div>
                        <div class="mb-3">
                            <label for="editLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="editLastName" value="Lastname">
                        </div>
                        <div class="mb-3">
                            <label for="editContact" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="editContact" value="(+63) 987 654 3210">
                        </div>
                        <div class="mb-3">
                            <label for="editLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="editLocation" value="Your City, Your Country">
                        </div>
                        <div class="mb-3">
                            <label for="editBirthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="editBirthday">
                        </div>
                        <div class="mb-3">
                            <label for="editFacebook" class="form-label">Facebook Profile URL</label>
                            <input type="url" class="form-control" id="editFacebook"
                                placeholder="e.g., https://facebook.com/yourprofile">
                        </div>
                        <div class="mb-3">
                            <label for="editInstagram" class="form-label">Instagram Profile URL</label>
                            <input type="url" class="form-control" id="editInstagram"
                                placeholder="e.g., https://instagram.com/yourprofile">
                        </div>
                        <div class="mb-3">
                            <label for="editGmail" class="form-label">Gmail Address</label>
                            <input type="email" class="form-control" id="editGmail" placeholder="e.g., your.email@gmail.com">
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Floating Action Button -->
    <a href="book-flight.php" class="floating-btn text-decoration-none">
        <i class="bi bi-plus-lg"></i>
    </a>

    <!-- Collapsible Chatbox -->
    <div class="chat-container" id="chatContainer">
        <div class="chat-header d-flex justify-content-between align-items-center" onclick="toggleChat()">
            <h5 class="chat-modal-title mb-0"><i class="bi bi-chat-dots-fill me-2"></i>Live Chat</h5>
            <i class="bi bi-x-lg text-white"></i>
        </div>
        <div class="chat-body">
            <!-- Chat messages will go here -->
            <div class="text-center text-muted">RAIS Support how may i assist you?</div>
        </div>
        <div class="chat-footer">
            <div class="input-group">
                <input type="text" class="form-control message-input" placeholder="Type a message..."
                    aria-label="Message input">
                <button class="btn btn-outline-secondary" type="button" id="send-button-popup">
                    <i class="bi bi-send-fill text-dark"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Full Screen Chat for Mobile -->
    <div id="full-screen-chat">
        <div class="chat-header-fullscreen">
            <button class="back-btn" id="backToDashboardBtn"><i class="bi bi-arrow-left"></i></button>
            <span class="chat-title-fullscreen"><i class="bi bi-chat-dots-fill me-2"></i>Live Chat</span>
        </div>
        <div class="chat-body-fullscreen">
            <div class="text-center text-muted">RAIS Support, how may I help you?</div>
        </div>
        <div class="chat-footer-fullscreen">
            <div class="input-group">
                <input type="text" class="form-control message-input" placeholder="Type a message..."
                    aria-label="Message input">
                <button class="btn btn-outline-secondary" type="button" id="send-button-fullscreen">
                    <i class="bi bi-send-fill text-dark"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Chat Toggle Button -->
    <button class="chat-toggle-btn" onclick="toggleChat()">
        <i class="bi bi-chat-dots"></i>
    </button>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Pass initial data from PHP to JavaScript
        const initialProfileData = <?php echo json_encode($userProfile); ?>;

        document.addEventListener('DOMContentLoaded', function () {
            // Update the date dynamically in the header with the new format
            document.getElementById('headerDate').textContent = new Date().toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            
            const mainWrapper = document.querySelector('.main-wrapper');
            const floatingBtn = document.querySelector('.floating-btn');
            const chatToggleBtn = document.querySelector('.chat-toggle-btn');
            const popupChatContainer = document.getElementById('chatContainer');
            const fullScreenChat = document.getElementById('full-screen-chat');

            function toggleChat() {
                if (window.innerWidth <= 768) {
                    const isChatVisible = fullScreenChat.style.display === 'flex';
                    if (isChatVisible) {
                        fullScreenChat.style.display = 'none';
                        mainWrapper.style.display = 'flex';
                        floatingBtn.style.display = 'flex';
                        chatToggleBtn.style.display = 'flex';
                    } else {
                        fullScreenChat.style.display = 'flex';
                        mainWrapper.style.display = 'none';
                        floatingBtn.style.display = 'none';
                        chatToggleBtn.style.display = 'none';
                    }
                } else {
                    popupChatContainer.classList.toggle('show');
                }
            }
            
            // Make toggleChat globally accessible
            window.toggleChat = toggleChat;
            document.getElementById('backToDashboardBtn').addEventListener('click', toggleChat);
            
            // Load initial profile data
            loadProfileData();
        });

        // Function to load profile data from local storage
        function loadProfileData() {
            const profileData = JSON.parse(localStorage.getItem('userProfile')) || initialProfileData;

            // Populate view mode
            document.getElementById('profileViewName').textContent = `${profileData.firstName || 'Firstname'} ${profileData.lastName || 'Lastname'}`;
            document.getElementById('viewEmail').textContent = profileData.email || 'user.email@example.com';
            document.getElementById('viewContact').textContent = profileData.contact || '(+63) 987 654 3210';
            document.getElementById('viewLocation').textContent = profileData.location || 'Your City, Your Country';
            document.getElementById('viewBirthday').textContent = profileData.birthday ? new Date(profileData.birthday).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }) : 'MM/DD/YYYY';

            const viewFacebook = document.getElementById('viewFacebook');
            if (profileData.facebook) {
                viewFacebook.href = profileData.facebook;
                viewFacebook.textContent = profileData.facebook;
                viewFacebook.parentElement.style.display = 'block';
            } else {
                viewFacebook.parentElement.style.display = 'none';
            }

            const viewInstagram = document.getElementById('viewInstagram');
            if (profileData.instagram) {
                viewInstagram.href = profileData.instagram;
                viewInstagram.textContent = profileData.instagram;
                viewInstagram.parentElement.style.display = 'block';
            } else {
                viewInstagram.parentElement.style.display = 'none';
            }

            const viewGmail = document.getElementById('viewGmail');
            if (profileData.gmail) {
                viewGmail.href = `mailto:${profileData.gmail}`;
                viewGmail.textContent = profileData.gmail;
                viewGmail.parentElement.style.display = 'block';
            } else {
                viewGmail.parentElement.style.display = 'none';
            }

            // Handle profile image display in profile view
            const profileViewImageContainer = document.getElementById('profileViewImageContainer');
            if (profileData.profileImage) {
                profileViewImageContainer.innerHTML = `<img src="${profileData.profileImage}" alt="Profile Image" class="rounded-circle" style="width: 96px; height: 96px; object-fit: cover;">`;
            } else {
                profileViewImageContainer.innerHTML = `<i class="bi bi-person-circle profile-icon" style="color: var(--rais-primary-green); font-size: 96px;"></i>`;
            }

            // Update the image preview in the edit form
            document.getElementById('profileImagePreview').src = profileData.profileImage || 'https://placehold.co/100x100/E8E8E8/AAAAAA?text=PREVIEW';


            // Populate edit form
            document.getElementById('editFirstName').value = profileData.firstName || '';
            document.getElementById('editLastName').value = profileData.lastName || '';
            document.getElementById('editContact').value = profileData.contact || '';
            document.getElementById('editLocation').value = profileData.location || '';
            document.getElementById('editBirthday').value = profileData.birthday || '';
            document.getElementById('editFacebook').value = profileData.facebook || '';
            document.getElementById('editInstagram').value = profileData.instagram || '';
            document.getElementById('editGmail').value = profileData.gmail || '';
        }

        // Function to save profile data to local storage
        function saveProfileData(event) {
            event.preventDefault(); // Prevent default form submission

            const profileData = {
                firstName: document.getElementById('editFirstName').value,
                lastName: document.getElementById('editLastName').value,
                contact: document.getElementById('editContact').value,
                location: document.getElementById('editLocation').value,
                birthday: document.getElementById('editBirthday').value,
                facebook: document.getElementById('editFacebook').value,
                instagram: document.getElementById('editInstagram').value,
                gmail: document.getElementById('editGmail').value,
                profileImage: document.getElementById('profileImagePreview').src
            };
            
            if (profileData.profileImage.startsWith('https://placehold.co')) {
                profileData.profileImage = null; // Don't save placeholder image
            }

            localStorage.setItem('userProfile', JSON.stringify(profileData));
            loadProfileData(); // Reload data to update view

            // Show alert
            alert('Profile changes saved successfully!');

            // Switch back to view mode
            document.getElementById('profile-view').style.display = 'block';
            document.getElementById('profile-edit-form').style.display = 'none';
        }

        // Event Listeners
        document.getElementById('editProfileBtn').addEventListener('click', function () {
            document.getElementById('profile-view').style.display = 'none';
            document.getElementById('profile-edit-form').style.display = 'block';
        });

        document.getElementById('profile-edit-form').addEventListener('submit', saveProfileData);

        document.getElementById('profileImageUpload').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileImagePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('removeProfileImageBtn').addEventListener('click', function () {
            const profileData = JSON.parse(localStorage.getItem('userProfile')) || {};
            profileData.profileImage = null; // Clear the image
            localStorage.setItem('userProfile', JSON.stringify(profileData));
            loadProfileData(); // Reload data to update view
            alert('Profile image removed successfully!');
        });
    </script>
</body>

</html>
