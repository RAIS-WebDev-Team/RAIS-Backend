<?php
// --- MOCK USER DATA ---
// In a real application, this data would come from a database after a user logs in.
$userProfile = [
    'firstName' => 'Juan',
    'lastName' => 'Dela Cruz',
    'email' => 'juan.delacruz@example.com',
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RAIS Documents</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../img/logoulit.png" />
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
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Added color transition */
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: var(--rais-dark-green);
            color: #fff;
            /* Ensure color stays white on hover/active */
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
            min-width: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            /* Added transform transition for icons */
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.1);
            /* Slight scale on hover */
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

        /* Logout button hover effect */
        .header .user-status .btn-link {
            color: var(--rais-text-light);
            transition: color 0.3s ease;
        }

        .header .user-status .btn-link:hover {
            color: var(--rais-button-maroon);
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

        .document-section {
            background-color: var(--rais-card-bg);
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            padding: 20px;
            margin-bottom: 2rem;
        }

        .document-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 1rem;
        }

        .document-header .btn-icon {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--rais-text-light);
            margin-left: 10px;
            transition: color 0.3s ease, transform 0.3s ease;
            /* Added color and transform transitions */
        }

        .document-header .btn-icon:hover {
            color: var(--rais-primary-green);
            /* Change color on hover */
            transform: translateY(-2px);
            /* Slight lift effect */
        }

        .file-preview-container {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .file-preview-item {
            text-align: center;
            width: 100px;
            cursor: pointer;
            padding: 5px;
            border-radius: 8px;
            /* Added border-radius for styling */
            transition: all 0.2s ease-in-out;
            /* Added a transition for smooth hover effects */
        }

        /* Hover effect for the file item */
        .file-preview-item:hover {
            background-color: var(--rais-bg-light);
            /* Light background on hover */
            transform: translateY(-3px);
            /* Subtle lift effect */
            box-shadow: var(--rais-shadow);
            /* Add a slight shadow on hover */
        }

        .file-preview-item.selected {
            background-color: var(--rais-light-gray);
            border: 2px solid var(--rais-primary-green);
            /* Add a border for selected state */
        }

        .file-preview-item i {
            font-size: 3rem;
            color: var(--rais-primary-green);
            transition: color 0.2s ease-in-out;
        }

        /* Change icon color on hover */
        .file-preview-item:hover i {
            color: var(--rais-dark-green);
        }

        .file-preview-item .file-name {
            font-size: 0.8rem;
            color: var(--rais-text-dark);
            margin-top: 0.5rem;
            word-wrap: break-word;
        }

        .status-tabs .nav-link {
            color: var(--rais-text-light);
            border: none;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            /* Add transition for tabs */
        }

        .status-tabs .nav-link.active {
            color: var(--rais-primary-green);
            border-bottom-color: var(--rais-primary-green);
            font-weight: 600;
        }

        .status-tabs .nav-link:hover {
            color: var(--rais-primary-green);
            /* Change color on hover */
        }

        #previewModal .modal-body img {
            max-width: 100%;
            height: auto;
        }

        #previewModal .modal-body .icon-preview {
            font-size: 6rem;
            text-align: center;
            display: block;
            color: var(--rais-primary-green);
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
            transition: background-color 0.2s, transform 0.2s;
            /* Added transform transition */
            z-index: 100;
        }

        .floating-btn:hover {
            background-color: var(--rais-dark-green);
            transform: scale(1.1) rotate(90deg);
            /* Scale and rotate on hover */
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

        .chat-footer .btn {
            transition: all 0.3s ease;
        }

        .chat-footer .btn:hover {
            background-color: var(--rais-button-maroon);
        }

        .chat-footer .btn:hover i {
            color: white !important;
            /* Force icon color to white */
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
            transition: transform 0.3s ease, background-color 0.3s ease;
            /* Added transitions */
        }

        .chat-toggle-btn:hover {
            background-color: var(--rais-dark-green);
            transform: scale(1.1);
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
                <a class="nav-link active" href="documents.php"><i
                        class="bi bi-file-earmark-text"></i><span>Documents</span></a>
                <a class="nav-link" href="forms.php"><i class="bi bi-journal-text"></i><span>Forms</span></a>
                <a class="nav-link" href="notifications.php"><i class="bi bi-bell"></i><span>Notifications</span></a>
                <a class="nav-link" href="settings.php"><i class="bi bi-gear"></i><span>Settings</span></a>
                <a class="nav-link" href="profile.php"><i class="bi bi-person-circle"></i><span>Profile</span></a>
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
                <h1>PLEASE SUBMIT YOUR DOCUMENTS</h1>

                <div class="document-section">
                    <div class="document-header">
                        <button class="btn-icon" onclick="document.getElementById('fileUpload').click()"><i
                                class="bi bi-file-earmark-arrow-up"></i></button>
                        <input type="file" id="fileUpload" style="display: none;" multiple
                            onchange="handleFileUpload(event, 'pendingFiles')">
                        <button class="btn-icon" onclick="document.getElementById('photoUpload').click()"><i
                                class="bi bi-image"></i></button>
                        <input type="file" id="photoUpload" accept="image/*" style="display: none;"
                            onchange="handleFileUpload(event, 'pendingFiles')">
                        <button class="btn-icon" onclick="deleteSelectedFiles('pendingFiles')"><i
                                class="bi bi-trash"></i></button>
                    </div>
                    <div id="pendingFiles" class="file-preview-container">
                        <!-- Uploaded files will appear here -->
                    </div>
                </div>

                <div class="document-section">
                    <ul class="nav nav-tabs status-tabs" id="statusTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab"
                                data-bs-target="#pending" type="button" role="tab" aria-controls="pending"
                                aria-selected="true">Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved"
                                type="button" role="tab" aria-controls="approved"
                                aria-selected="false">Approved</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled"
                                type="button" role="tab" aria-controls="cancelled"
                                aria-selected="false">Cancelled</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="pending" role="tabpanel"
                            aria-labelledby="pending-tab">
                            <div class="file-preview-container">
                                <div class="file-preview-item">
                                    <i class="bi bi-folder"></i>
                                    <div class="file-name">example file</div>
                                </div>
                                <div class="file-preview-item">
                                    <i class="bi bi-folder"></i>
                                    <div class="file-name">example file</div>
                                </div>
                                <div class="file-preview-item">
                                    <i class="bi bi-image-fill"></i>
                                    <div class="file-name">sample img</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                            <!-- Approved files will appear here -->
                        </div>
                        <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                            <!-- Cancelled files will appear here -->
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">File Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Preview content will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="modalRemoveBtn">Remove</button>
                    <a href="#" class="btn btn-primary" id="modalDownloadBtn" download>Download</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
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
            <div class="text-center text-muted">Start a new conversation.</div>
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
        });

        const uploadedFiles = new Map();
        const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
        let fileToRemove = null;

        function handleFileUpload(event, containerId) {
            const files = event.target.files;
            const container = document.getElementById(containerId);

            for (const file of files) {
                const fileId = `file-${Date.now()}-${Math.random()}`;
                const reader = new FileReader();

                reader.onload = function (e) {
                    uploadedFiles.set(fileId, {
                        name: file.name,
                        type: file.type,
                        dataUrl: e.target.result,
                        element: null
                    });

                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-preview-item';
                    fileItem.dataset.fileId = fileId;

                    let iconClass = 'bi-folder';
                    if (file.type.startsWith('image/')) {
                        iconClass = 'bi-image-fill';
                    }

                    fileItem.innerHTML = `
                        <i class="bi ${iconClass}"></i>
                        <div class="file-name">${file.name}</div>
                    `;

                    // Single-click to select
                    fileItem.addEventListener('click', (event) => {
                        // Deselect all other items if ctrl/cmd is not pressed
                        if (!event.ctrlKey && !event.metaKey) {
                            const allItems = container.querySelectorAll('.file-preview-item.selected');
                            allItems.forEach(item => {
                                if (item !== fileItem) {
                                    item.classList.remove('selected');
                                }
                            });
                        }
                        fileItem.classList.toggle('selected');
                    });

                    // Double-click to preview
                    fileItem.addEventListener('dblclick', () => {
                        showPreview(fileId);
                    });

                    uploadedFiles.get(fileId).element = fileItem;
                    container.appendChild(fileItem);
                };

                reader.readAsDataURL(file);
            }
        }

        function showPreview(fileId) {
            const fileData = uploadedFiles.get(fileId);
            if (!fileData) return;

            const modalBody = document.querySelector('#previewModal .modal-body');
            const modalLabel = document.getElementById('previewModalLabel');
            const downloadBtn = document.getElementById('modalDownloadBtn');

            modalLabel.textContent = fileData.name;
            downloadBtn.href = fileData.dataUrl;
            downloadBtn.download = fileData.name;

            if (fileData.type.startsWith('image/')) {
                modalBody.innerHTML = `<img src="${fileData.dataUrl}" alt="Preview">`;
            } else {
                modalBody.innerHTML = `<div class="text-center p-4"><i class="bi bi-file-earmark-text icon-preview"></i></div>`;
            }

            fileToRemove = fileId;
            previewModal.show();
        }

        document.getElementById('modalRemoveBtn').addEventListener('click', () => {
            if (fileToRemove) {
                const fileData = uploadedFiles.get(fileToRemove);
                if (fileData && fileData.element) {
                    fileData.element.remove();
                }
                uploadedFiles.delete(fileToRemove);
                fileToRemove = null;
                previewModal.hide();
            }
        });

        function deleteSelectedFiles(containerId) {
            const container = document.getElementById(containerId);
            const selectedItems = container.querySelectorAll('.file-preview-item.selected');
            selectedItems.forEach(item => {
                const fileId = item.dataset.fileId;
                if (uploadedFiles.has(fileId)) {
                    uploadedFiles.delete(fileId);
                }
                item.remove();
            });
        }
    </script>
</body>

</html>
