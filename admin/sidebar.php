<aside class="sidebar d-flex flex-column">
    <div class="logo">RAIS</div>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo ($active_page === 'dashboard') ? 'active' : ''; ?>" href="admin.php">
            <i class="bi bi-window-sidebar"></i><span>Dashboard</span>
        </a>
        <a class="nav-link <?php echo ($active_page === 'user_management') ? 'active' : ''; ?>" href="user_management.php">
            <i class="bi bi-people-fill"></i><span>User Management</span>
        </a>

        <a class="nav-link <?php echo ($active_page === 'application_management') ? 'active' : ''; ?>" href="application_management.php">
            <i class="bi bi-file-earmark-text-fill"></i><span>Application Management</span>
        </a>
        
       
        <a class="nav-link <?php echo ($active_page === 'chat_management') ? 'active' : ''; ?>" href="chat_management.php">
            <i class="bi bi-chat-dots-fill"></i><span>Chat Management</span>
        </a>

        <a class="nav-link <?php echo ($active_page === 'content_management') ? 'active' : ''; ?>" href="content_management.php">
            <i class="bi bi-pencil-square"></i><span>Content Management</span>
        </a>

         <a class="nav-link <?php echo ($active_page === 'booking_management') ? 'active' : ''; ?>" href="booking_management.php">
            <i class="bi bi-calendar-check-fill"></i><span>Booking Management</span>
        </a>

         <a class="nav-link <?php echo ($active_page === 'admin_profile') ? 'active' : ''; ?>" href="admin_profile.php">
            <i class="bi bi-person-gear"></i><span>Admin Profiles</span>
        </a>

        <a class="nav-link mt-auto <?php echo ($active_page === 'profile') ? 'active' : ''; ?>" href="profile.php">
            <i class="bi bi-person-circle"></i><span>Profile</span>
        </a>
    </nav>
    <div class="mt-auto footer-text">
        &copy; 2025 RAIS
    </div>
</aside>