<?php
// --- MOCK USER DATA ---
// In a real application, this data would come from a database after a user logs in.
// We are using an associative array here to simulate that data.
$userProfile = [
    'firstName' => 'Firstname',
    'lastName' => 'Lastname',
    'contact' => '(+63) 917 123 4567',
    'birthday' => '01/15/1990',
    // By default, no profile image is set, so the placeholder logo will be shown.
    'profileImage' => null, 
    'social' => [
        'facebook' => 'https://facebook.com/juandelacruz',
        'instagram' => 'https://instagram.com/juandelacruz',
        'gmail' => 'juan.delacruz@example.com'
    ]
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAIS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Using a placeholder for the favicon -->
    <link rel="icon" href="../img/logoulit.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #0C470C, #3BA43B);
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #023621, #2a7c2a);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--rais-light-gray);
            color: var(--rais-text-dark);
            overflow: hidden;
            /* Prevent body scroll */
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
            transition: transform 0.2s ease-in-out;
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.1);
        }

        .sidebar .nav-link span {
            opacity: 0;
            transition: opacity 0.1s ease-in-out 0.2s;
        }

        .sidebar:hover .nav-link span {
            opacity: 1;
        }

        .profile-section {
            cursor: pointer;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            white-space: nowrap;
            transition: background-color 0.3s ease;
            margin-top: auto;
        }

        .profile-section:hover {
            background-color: var(--rais-dark-green);
        }

        .profile-section i {
            font-size: 1.2rem;
            min-width: 20px;
            text-align: center;
            color: white;
        }

        .profile-section .profile-name-text {
            opacity: 0;
            transition: opacity 0.1s ease-in-out 0.2s;
            color: white;
        }

        .sidebar:hover .profile-name-text {
            opacity: 1;
        }

        .sidebar .footer-text {
            font-size: 0.8rem;
            color: #bbb;
            text-align: center;
            padding: 15px 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-status .btn {
            color: var(--rais-text-light);
            font-size: 1.5rem;
            padding: 0;
        }

        .power-btn i {
            color: #dc3545; /* Bootstrap danger red */
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        .power-btn:hover i {
            color: #a71d2a; /* Darker red on hover */
            transform: scale(1.1);
        }

        .tour-help-btn {
            background: none;
            border: 2px solid var(--rais-highlight-light-green);
            border-radius: 50%;
            color: var(--rais-text-dark);
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.2s, color 0.2s;
        }
        
        .tour-help-btn i {
            transition: transform 0.2s ease-in-out;
        }

        .tour-help-btn:hover {
            background-color: var(--rais-light-gray);
            color: var(--rais-primary-green);
        }

        .tour-help-btn:hover i {
            transform: scale(1.1);
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

        /* Top Section Cards */
        .user-info-card {
            background-color: var(--rais-card-bg);
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            position: relative; /* For tour highlight */
        }

        .user-info-card .card-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .user-info-card .profile-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .profile-display-area {
            position: relative;
            width: 96px;
            height: 96px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-display-area .profile-icon {
            font-size: 6rem;
            color: var(--rais-primary-green);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-display-area .profile-image-dashboard {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .user-info-card .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .user-info-card .contact-info {
            font-size: 0.9rem;
            color: var(--rais-text-light);
        }

        .user-info-card .social-links a {
            color: var(--rais-text-dark);
            margin-right: 15px;
        }

        .user-info-card .social-links a i {
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        
        .user-info-card .social-links a:hover i {
            transform: scale(1.2);
            color: var(--rais-primary-green);
        }

        .quick-actions-card {
            background-color: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .quick-actions-card .logo-only-img {
            max-width: 200px;
            margin: auto;
            transition: transform 0.5s ease-out;
            cursor: grab;
        }

        /* --- Progress Bar Styles --- */
        .progress-steps {
            position: relative;
            background-color: var(--rais-card-bg);
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            padding: 30px 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .step-item {
            position: relative;
            z-index: 2;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .step-circle {
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 50%;
            background-color: var(--rais-progress-bg);
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--rais-text-dark);
            margin-bottom: 10px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .step-circle.active {
            background-color: var(--rais-primary-green);
            color: white;
        }

        .step-label {
            font-size: 0.8rem;
            color: var(--rais-text-light);
            white-space: nowrap;
        }
        /* --- END Progress Bar --- */

        /* Contents Grid */
        .contents-grid {
            position: relative; /* For tour highlight */
        }
        .contents-grid .card {
            border: none;
            box-shadow: var(--rais-shadow);
            border-radius: 12px;
            overflow: hidden;
        }

        .contents-grid .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        .contents-grid .card img {
            height: 180px;
            object-fit: cover;
        }

        .add-card {
            min-height: 250px;
            border-radius: 12px;
            box-shadow: var(--rais-shadow);
            background-color: var(--rais-card-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .add-card:hover {
            transform: translateY(-5px);
        }

        .add-card .icon {
            font-size: 4rem;
            color: #C2C2C2;
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
            transition: background-color 0.2s, z-index 0s;
            z-index: 1030;
        }

        .floating-btn:hover {
            background-color: var(--rais-dark-green);
        }

        /* Collapsible Chatbox for DESKTOP */
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
            transition: background-color 0.2s, z-index 0s;
            z-index: 1030;
        }

        /* --- Tour Styles --- */
        .tour-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1050;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        body.tour-active .tour-overlay {
            opacity: 1;
            visibility: visible;
        }
        
        .welcome-tour-modal .modal-content {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }

        .welcome-tour-modal .modal-dialog {
            position: fixed;
            margin: 0;
            max-width: 300px;
            z-index: 1055;
            top: 60px;
            right: 80px;
            bottom: auto;
            left: auto;
        }

        .welcome-tour-modal .modal-header {
            background-color: var(--rais-card-bg);
            border-bottom: none;
            padding: 1rem 1.5rem 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .welcome-tour-modal .modal-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .welcome-tour-modal .modal-header .progress-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            position: relative;
        }

        .welcome-tour-modal .modal-header .progress-line {
            position: absolute;
            width: calc(100% - 60px);
            height: 4px;
            background-color: var(--rais-light-gray);
            top: 50%;
            left: 30px;
            transform: translateY(-50%);
            z-index: 0;
        }

        .welcome-tour-modal .modal-header .progress-fill {
            height: 100%;
            background-color: var(--rais-primary-green);
            width: 0%;
            transition: width 0.3s ease-in-out;
        }

        .welcome-tour-modal .modal-header .step-indicator {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--rais-light-gray);
            color: var(--rais-text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 1;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .welcome-tour-modal .modal-header .step-indicator.active {
            background-color: var(--rais-primary-green);
            color: white;
        }

        .welcome-tour-modal .modal-header h5 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--rais-text-dark);
            margin-bottom: 0;
        }

        .welcome-tour-modal .modal-body {
            padding: 1rem 1.5rem;
            text-align: center;
        }

        .welcome-tour-modal .modal-body p {
            font-size: 0.9rem;
            line-height: 1.5;
            color: var(--rais-text-light);
        }

        .welcome-tour-modal .modal-footer {
            border-top: none;
            padding: 0.5rem 1.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-tour-modal .modal-footer .btn {
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .welcome-tour-modal .modal-footer .btn-secondary {
            background-color: var(--rais-light-gray);
            color: var(--rais-text-dark);
            border: none;
        }

        .welcome-tour-modal .modal-footer .btn-primary {
            background-color: var(--rais-primary-green);
            border: none;
        }

        .tour-highlight {
            position: relative;
            z-index: 1052; /* Above the overlay */
            border: 3px solid var(--rais-highlight-light-green);
            border-radius: 15px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 15px var(--rais-highlight-light-green);
        }
        .tour-highlight.highlight-circle {
            border-radius: 50%;
        }

        /* Fix for floating buttons during tour */
        .floating-btn.tour-highlight,
        .chat-toggle-btn.tour-highlight {
            position: fixed !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-top: 50px;
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
                margin-left: 0; /* Remove margin for mobile */
            }

            .header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1030;
                height: 50px;
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

            .sidebar.tour-highlight {
                border-radius: 15px 15px 0 0;
            }

            .sidebar .logo,
            .sidebar .profile-section,
            .sidebar .footer-text {
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

            .progress-steps {
                padding: 20px 15px;
                align-items: flex-start;
            }
            .step-circle {
                width: 60px;
                height: 60px;
                line-height: 60px;
                font-size: 1.2rem;
            }

            .step-label {
                font-size: 0.75rem;
                white-space: normal;
                max-width: 60px;
            }

            .welcome-tour-modal .modal-header,
            .welcome-tour-modal .modal-body,
            .welcome-tour-modal .modal-footer {
                padding: 1rem;
            }

            .welcome-tour-modal .modal-footer {
                flex-direction: column;
                gap: 10px;
            }

            .welcome-tour-modal .modal-footer .btn {
                width: 100%;
            }

            .welcome-tour-modal .modal-dialog {
                top: 20px;
                right: 20px;
                left: 20px;
                max-width: calc(100% - 40px);
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <aside class="sidebar d-flex flex-column">
            <div class="logo">RAIS</div>
            <nav class="nav flex-column">
                <a class="nav-link active" href="dashboard.php"><i class="bi bi-house-door-fill"></i><span>Dashboard</span></a>
                <a class="nav-link" href="book-consultation.php"><i class="bi bi-calendar-check"></i><span>Book Consultation</span></a>
                <a class="nav-link" href="statement-of-account.php"><i class="bi bi-receipt"></i><span>Statement of Account</span></a>
                <a class="nav-link" href="documents.php"><i class="bi bi-file-earmark-text"></i><span>Documents</span></a>
                <a class="nav-link" href="forms.php"><i class="bi bi-journal-text"></i><span>Forms</span></a>
                <a class="nav-link" href="notifications.php"><i class="bi bi-bell"></i><span>Notifications</span></a>
                <a class="nav-link" href="settings.php"><i class="bi bi-gear"></i><span>Settings</span></a>
                <a class="nav-link" href="profile.php"><i class="bi bi-person-circle"></i><span>Profile</span></a>
            </nav>

            <div class="mt-auto footer-text">
                &copy; <?php echo date("Y"); ?> RAIS
            </div>
        </aside>

        <div class="content-area">
            <div class="header">
                <div class="header-brand d-flex align-items-center">
                    <!-- Using a placeholder for the logo -->
                    <img src="../img/logo.png" alt="RAIS Logo" class="header-logo-img" onerror="this.onerror=null;this.src='https://placehold.co/150x50/FFFFFF/000000?text=RAIS+Logo';">
                    <span class="header-title">Roman & Associates Immigration Services</span>
                </div>
                <div class="user-status d-flex align-items-center gap-2">
                    <!-- PHP dynamically inserts the current date -->
                    <div class="me-3" style="font-weight: 500; color: var(--rais-text-light);"><?= date('F j, Y') ?></div>
                    <button class="tour-help-btn" id="tourToggleButton"><i class="bi bi-question-circle"></i></button>
                    <a href="../index.html" class="btn btn-link power-btn"><i class="bi bi-power"></i></a>
                    <span class="badge">ACTIVE</span>
                </div>
            </div>

            <main class="main-content">
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-7">
                        <div class="user-info-card h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="profile-info d-flex align-items-center gap-3">
                                    <div class="profile-display-area" id="dashboardProfileImageContainer">
                                        <!-- Profile image or icon will be rendered here by JS -->
                                    </div>
                                    <span class="profile-name" id="dashboardProfileName">FIRST NAME, LAST NAME</span>
                                </div>
                                <div class="social-links mt-3" id="dashboardSocialLinks">
                                    <!-- Social links will be rendered here by JS -->
                                </div>
                                <div class="contact-info mt-3">
                                    <div id="dashboardContactNumber">(+63) 987 654 3210</div>
                                    <div id="dashboardBirthday">Birthday: MM/DD/YYYY</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="quick-actions-card h-100 d-flex flex-column justify-content-center">
                             <!-- Using a placeholder for the interactive logo -->
                            <img src="../img/logoulit.png" alt="RAIS Logo" class="logo-only-img img-fluid" id="interactive-logo" onerror="this.onerror=null;this.src='https://placehold.co/200x200/FFFFFF/004d40?text=RAIS';">
                        </div>
                    </div>
                </div>

                <div class="progress-steps mb-4">
                    <div class="step-item">
                        <div class="step-circle active">1</div>
                        <div class="step-label">Let's Start</div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle active">2</div>
                        <div class="step-label">Keep Going...</div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle">3</div>
                        <div class="step-label">Almost There!</div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle">4</div>
                        <div class="step-label">Tara Canada na!</div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 contents-grid">
                    <div class="col">
                        <a href="../blogs.php" class="card h-100 text-decoration-none text-dark">
                            <img src="../blog/img/minifair2.png" class="card-img-top" alt="Blogs and Events">
                            <div class="card-body">
                                <h5 class="card-title">Blogs and Events</h5>
                                <p class="card-text text-muted">View Blogs & Events.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="../about.php" class="card h-100 text-decoration-none text-dark">
                            <img src="../img/logoulit.png" class="card-img-top" alt="Service Offering">
                            <div class="card-body">
                                <h5 class="card-title">About Us</h5>
                                <p class="card-text text-muted">Learn more about our company.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card h-100 text-decoration-none text-dark">
                           <img src="../img/index2.png" class="card-img-top" alt="Home Page">
                            <div class="card-body">
                                <h5 class="card-title">Home Page</h5>
                                <p class="card-text text-muted">View Home Page</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="../ielts.php" class="card h-100 text-decoration-none text-dark">
                            <img src="../img/thumbielts.png" class="card-img-top" alt="IELTS">
                            <div class="card-body">
                                <h5 class="card-title">International English Language Testing System</h5>
                                <p class="card-text text-muted">Book your IELTS Exam</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="../oet.php" class="card h-100 text-decoration-none text-dark">
                            <img src="../img/OET.jpg" class="card-img-top" alt="IELTS">
                            <div class="card-body">
                                <h5 class="card-title">Occupational English System</h5>
                                <p class="card-text text-muted">Book your OET.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Chat Popup for Desktop -->
    <div class="chat-container" id="chatContainer">
        <div class="chat-header d-flex justify-content-between align-items-center" onclick="toggleChat()">
            <h5 class="chat-modal-title mb-0"><i class="bi bi-chat-dots-fill me-2"></i>Live Chat</h5>
            <i class="bi bi-x-lg text-white"></i>
        </div>
        <div class="chat-body">
            <div class="text-center text-muted">RAIS Support, how may I help you?</div>
        </div>
        <div class="chat-footer">
            <div class="input-group">
                <input type="text" class="form-control message-input" placeholder="Type a message..." aria-label="Message input">
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
                <input type="text" class="form-control message-input" placeholder="Type a message..." aria-label="Message input">
                <button class="btn btn-outline-secondary" type="button" id="send-button-fullscreen">
                    <i class="bi bi-send-fill text-dark"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Action Buttons -->
    <a href="book-flight.php" class="floating-btn text-decoration-none">
        <i class="bi bi-plus-lg"></i>
    </a>
    <button class="chat-toggle-btn" onclick="toggleChat()">
        <i class="bi bi-chat-dots"></i>
    </button>

    <!-- Welcome Tour Modal -->
    <div class="modal fade welcome-tour-modal" id="welcomeTourModal" tabindex="-1" aria-labelledby="welcomeTourModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="progress-container">
                        <div class="progress-line">
                            <div class="progress-fill" id="tourProgressFill"></div>
                        </div>
                        <div class="step-indicator active" id="stepIndicator1">1</div>
                        <div class="step-indicator" id="stepIndicator2">2</div>
                        <div class="step-indicator" id="stepIndicator3">3</div>
                        <div class="step-indicator" id="stepIndicator4">4</div>
                    </div>
                    <div class="modal-title-container">
                        <i class="bi bi-compass fs-4 me-2" style="color: var(--rais-primary-green);"></i>
                        <h5 class="modal-title" id="welcomeTourModalLabel">Welcome</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <p id="tourContent">Welcome to your RAIS dashboard! This tour will guide you through the main features and how to navigate them.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="tourPrevBtn" style="display: none;">Previous</button>
                    <button type="button" class="btn btn-primary" id="tourNextBtn">Next</button>
                    <button type="button" class="btn btn-secondary" id="tourSkipBtn" data-bs-dismiss="modal">Skip Tour</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="tour-overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Pass initial data from PHP to JavaScript
        const initialProfileData = <?php echo json_encode($userProfile); ?>;

        // --- CHAT LOGIC ---
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
        
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('backToDashboardBtn').addEventListener('click', toggleChat);
            
            loadProfileData();

            // --- WELCOME TOUR LOGIC ---
            const welcomeTourModalElement = document.getElementById('welcomeTourModal');
            const welcomeTourModal = new bootstrap.Modal(welcomeTourModalElement);
            const hasSeenTour = localStorage.getItem('hasSeenWelcomeTour');
            
            if (!hasSeenTour) {
                welcomeTourModal.show();
                localStorage.setItem('hasSeenWelcomeTour', 'true');
            }

            let currentStep = 0;
            let highlightedElement = null;
            const tourSteps = [
                { title: "Welcome to RAIS!", content: "This tour helps you get familiar with your new dashboard. Let's explore!", targetSelector: null },
                { title: "Your Profile & Quick Actions", content: "Top-left: your info and quick links.", targetSelector: ".user-info-card" },
                { title: "Your Progress Journey", content: "Track your immigration progress here.", targetSelector: ".progress-steps" },
                { title: "Important Resources", content: "Below: map, service offerings. '+' adds more content.", targetSelector: ".contents-grid" },
                { title: "Sidebar Navigation", content: "Left sidebar: navigate to Documents, Forms, Notifications, and Settings.", targetSelector: ".sidebar" },
                { title: "Need Help? Chat with us!", content: "Click the chatbox at the bottom right for live support.", targetSelector: ".chat-toggle-btn" },
                { title: "Ready to Book Your Flight?", content: "The floating '+' button: shortcut to book your flight to Canada!", targetSelector: ".floating-btn" },
                { title: "Tour Complete!", content: "You're all set! Enjoy your RAIS dashboard.", targetSelector: null }
            ];

            const tourTitle = document.getElementById('welcomeTourModalLabel');
            const tourContent = document.getElementById('tourContent');
            const tourPrevBtn = document.getElementById('tourPrevBtn');
            const tourNextBtn = document.getElementById('tourNextBtn');
            const tourProgressFill = document.getElementById('tourProgressFill');
            const stepIndicators = [
                document.getElementById('stepIndicator1'),
                document.getElementById('stepIndicator2'),
                document.getElementById('stepIndicator3'),
                document.getElementById('stepIndicator4')
            ];

            function updateTourContent() {
                if (highlightedElement) {
                    highlightedElement.classList.remove('tour-highlight', 'highlight-circle');
                }
                document.body.classList.remove('tour-active');

                const step = tourSteps[currentStep];
                tourTitle.textContent = step.title;
                tourContent.textContent = step.content;
                tourPrevBtn.style.display = currentStep === 0 ? 'none' : 'block';
                tourNextBtn.textContent = currentStep === tourSteps.length - 1 ? 'Finish' : 'Next';

                const progressPercentage = (currentStep / (tourSteps.length - 1)) * 100;
                tourProgressFill.style.width = `${progressPercentage}%`;

                stepIndicators.forEach((indicator, index) => {
                    const majorStepIndex = Math.floor(index * (tourSteps.length / stepIndicators.length));
                    indicator.classList.toggle('active', currentStep >= majorStepIndex);
                });

                if (step.targetSelector) {
                    highlightedElement = document.querySelector(step.targetSelector);
                    if (highlightedElement) {
                        highlightedElement.classList.add('tour-highlight');
                         if (step.targetSelector === '.floating-btn' || step.targetSelector === '.chat-toggle-btn') {
                            highlightedElement.classList.add('highlight-circle');
                        }
                        document.body.classList.add('tour-active');
                    }
                } else {
                    highlightedElement = null;
                }
            }

            tourNextBtn.addEventListener('click', () => {
                if (currentStep < tourSteps.length - 1) {
                    currentStep++;
                    updateTourContent();
                } else {
                    welcomeTourModal.hide();
                }
            });

            tourPrevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateTourContent();
                }
            });
            
            function endTour() {
                 if (highlightedElement) {
                    highlightedElement.classList.remove('tour-highlight', 'highlight-circle');
                }
                document.body.classList.remove('tour-active');
            }

            document.getElementById('tourSkipBtn').addEventListener('click', endTour);
            welcomeTourModalElement.addEventListener('hidden.bs.modal', endTour);


            document.getElementById('tourToggleButton').addEventListener('click', () => {
                currentStep = 0;
                updateTourContent();
                welcomeTourModal.show();
            });

            updateTourContent();
        });

        // --- INTERACTIVE LOGO JAVASCRIPT ---
        const interactiveLogo = document.getElementById('interactive-logo');
        let isDragging = false;
        let startX, startY;

        function handleDragStart(e) {
            isDragging = true;
            const touch = e.touches ? e.touches[0] : e;
            startX = touch.clientX;
            startY = touch.clientY;
            interactiveLogo.style.cursor = 'grabbing';
            interactiveLogo.style.transition = 'none';
            if (e.touches) e.preventDefault();
        }

        function handleDragMove(e) {
            if (!isDragging) return;
            const touch = e.touches ? e.touches[0] : e;
            const deltaX = touch.clientX - startX;
            const deltaY = touch.clientY - startY;
            const rotateY = Math.max(-90, Math.min(90, deltaX / 4));
            const rotateX = Math.max(-90, Math.min(90, -deltaY / 4));
            interactiveLogo.style.transform = `perspective(1000px) rotateY(${rotateY}deg) rotateX(${rotateX}deg)`;
        }

        function handleDragEnd() {
            if (isDragging) {
                isDragging = false;
                interactiveLogo.style.cursor = 'grab';
                interactiveLogo.style.transition = 'transform 0.5s ease-out';
                interactiveLogo.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg)';
            }
        }

        interactiveLogo.addEventListener('mousedown', handleDragStart);
        document.addEventListener('mousemove', handleDragMove);
        document.addEventListener('mouseup', handleDragEnd);
        interactiveLogo.addEventListener('touchstart', handleDragStart);
        document.addEventListener('touchmove', handleDragMove);
        document.addEventListener('touchend', handleDragEnd);
        // --- END OF INTERACTIVE LOGO JAVASCRIPT ---
        
        // --- PROFILE DATA LOGIC ---
        function loadProfileData() {
            const profileData = JSON.parse(localStorage.getItem('userProfile')) || initialProfileData;

            // Populate dashboard view
            document.getElementById('dashboardProfileName').textContent = `${profileData.firstName || 'FIRST NAME'}, ${profileData.lastName || 'LAST NAME'}`;
            document.getElementById('dashboardContactNumber').textContent = profileData.contact || '(+63) 987 654 3210';
            document.getElementById('dashboardBirthday').textContent = `Birthday: ${profileData.birthday ? new Date(profileData.birthday).toLocaleDateString() : 'MM/DD/YYYY'}`;

            const socialLinksContainer = document.getElementById('dashboardSocialLinks');
            socialLinksContainer.innerHTML = ''; // Clear existing links
            if (profileData.facebook) {
                socialLinksContainer.innerHTML += `<a href="${profileData.facebook}" target="_blank"><i class="bi bi-facebook fs-5"></i></a>`;
            }
            if (profileData.instagram) {
                socialLinksContainer.innerHTML += `<a href="${profileData.instagram}" target="_blank"><i class="bi bi-instagram fs-5"></i></a>`;
            }
            if (profileData.gmail) {
                socialLinksContainer.innerHTML += `<a href="mailto:${profileData.gmail}" target="_blank"><i class="bi bi-envelope fs-5"></i></a>`;
            }

            // Handle profile image display in dashboard
            const dashboardProfileImageContainer = document.getElementById('dashboardProfileImageContainer');
            if (profileData.profileImage) {
                dashboardProfileImageContainer.innerHTML = `<img src="${profileData.profileImage}" alt="Profile Image" class="profile-image-dashboard">`;
            } else {
                dashboardProfileImageContainer.innerHTML = `<i class="bi bi-person-circle profile-icon"></i>`;
            }
        }
    </script>
</body>

</html>
