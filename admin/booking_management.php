<?php
// Page-specific data
$page_title = "RAIS Admin - Booking Management";
$active_page = "booking_management"; // For highlighting the active link in the sidebar

// In a real application, this data would be fetched from your database.
$bookings = [
    ['id' => 'BK-001', 'firstName' => 'Carlos', 'lastName' => 'Reyes', 'email' => 'carlos.r@email.com', 'service' => 'Visa Consultation', 'dateTime' => '2024-08-15 10:00 AM', 'status' => 'Confirmed'],
    ['id' => 'BK-002', 'firstName' => 'Maria', 'lastName' => 'Santos', 'email' => 'maria.s@email.com', 'service' => 'IELTS Review', 'dateTime' => '2024-08-15 02:00 PM', 'status' => 'Pending'],
    ['id' => 'BK-003', 'firstName' => 'Luis', 'lastName' => 'Garcia', 'email' => 'luis.g@email.com', 'service' => 'Work Permit Assistance', 'dateTime' => '2024-08-16 11:00 AM', 'status' => 'Completed'],
    ['id' => 'BK-004', 'firstName' => 'Ana', 'lastName' => 'Cruz', 'email' => 'ana.c@email.com', 'service' => 'Visa Consultation', 'dateTime' => '2024-08-17 09:00 AM', 'status' => 'Cancelled']
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/logoulit.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>

<body>
    <div class="main-wrapper">
        <?php require_once 'sidebar.php'; ?>

        <div class="content-area">
            <?php require_once 'header.php'; ?>

            <main class="main-content">
                <h1>Booking Management</h1>

                <div class="content-card">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                        <h2 class="mb-3 mb-md-0">Upcoming Bookings</h2>
                        <div class="input-group w-100" style="max-width: 400px;">
                            <input type="text" class="form-control" placeholder="Search by name or service..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Date & Time</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="bookingsTableBody">
                                <?php

                                    foreach ($bookings as $book) {
                                    $statusBadge = 'bg-secondary'; 
                                    switch ($book['status']) {
                                        case 'Confirmed':
                                            $statusBadge = 'bg-success';
                                            break;
                                        case 'Pending':
                                            $statusBadge = 'bg-warning text-dark';
                                            break;
                                        case 'Cancelled':
                                            $statusBadge = 'bg-danger';
                                            break;
                                        case 'Completed':
                                            $statusBadge = 'bg-info text-dark';
                                            break;
                                    }

                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($book['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($book['firstName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($book['lastName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($book['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($book['service']) . "</td>";
                                    echo "<td>" . htmlspecialchars($book['dateTime']) . "</td>";
                                    echo "<td><span class=\"badge " . $statusBadge . "\">" . htmlspecialchars($book['status']) . "</span></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="togglemodeScript.js"></script> 
  
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('bookingsTableBody');
            const tableRows = tableBody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();

                for (let i = 0; i < tableRows.length; i++) {
                    const row = tableRows[i];

                    const firstName = row.cells[1].textContent.toLowerCase();
                    const lastName = row.cells[2].textContent.toLowerCase();
                    const service = row.cells[4].textContent.toLowerCase();
                    const rowText = `${firstName} ${lastName} ${service}`;

                    if (rowText.includes(searchTerm)) {
                        row.style.display = ""; 
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        });
    </script>
</body>
</html>