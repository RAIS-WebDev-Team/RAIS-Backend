<?php
// Page-specific data can be defined here.
$page_title = "RAIS Admin Dashboard";

// Dashboard statistics
$active_users = 125;
$inactive_users = 45;

// User data for the management table
$users = [
    ['id' => 1, 'firstName' => 'John', 'lastName' => 'Doe', 'email' => 'john.doe@example.com', 'status' => 'Active'],
    ['id' => 2, 'firstName' => 'Jane', 'lastName' => 'Smith', 'email' => 'jane.smith@example.com', 'status' => 'Pending Docs'],
    ['id' => 3, 'firstName' => 'Peter', 'lastName' => 'Jones', 'email' => 'peter.j@example.com', 'status' => 'Approved'],
    ['id' => 4, 'firstName' => 'Alice', 'lastName' => 'Brown', 'email' => 'alice.b@example.com', 'status' => 'Inactive']
];

// Data for the live chat monitoring
$chat_logs = [
    ['user' => 'User 1', 'message' => 'Hello, I have a question about my visa application.'],
    ['user' => 'User 2', 'message' => 'When is the next IELTS fair?'],
    ['user' => 'User 3', 'message' => 'I need help updating my profile information.']
];

// Data for the content management section
$latest_post_title = "A Long Road for 'A Calling to Canada'";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../img/logoulit.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-wrapper">
  
        <?php require_once 'sidebar.php' ?>

        <div class="content-area">
        
        <?php require_once 'header.php' ?>

            <main class="main-content">
                <h1>Admin Dashboard</h1>

                <!-- Statistics Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="content-card text-center">
                            <h2>Active Users</h2>
                            <h1 class="display-4" style="color: #28a745;"><?php echo $active_users; ?></h1>
                            <p class="text-muted">Currently logged in or active in the last 24 hours.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-card text-center">
                            <h2>Inactive Users</h2>
                            <h1 class="display-4" style="color: #ffc107;"><?php echo $inactive_users; ?></h1>
                            <p class="text-muted">Users who haven't logged in for over 30 days.</p>
                        </div>
                    </div>
                </div>

                <!-- User Management Card -->
                <div class="content-card">
                    <h2>User Management</h2>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                <?php
                                foreach ($users as $user) {
                                    $statusClass = 'bg-warning text-dark';
                                    if ($user['status'] === 'Active' || $user['status'] === 'Approved') {
                                        $statusClass = 'bg-success';
                                    } elseif ($user['status'] === 'Inactive') {
                                        $statusClass = 'bg-secondary';
                                    }
                                    $userName = htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']);

                                    echo "<tr id='user-row-" . htmlspecialchars($user['id']) . "'>";
                                    echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['firstName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['lastName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                                    echo "<td><span class=\"badge " . $statusClass . "\">" . htmlspecialchars($user['status']) . "</span></td>";
                                    echo '<td>
                                            <button class="btn btn-sm btn-info me-1 edit-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editUserModal"
                                                    data-user-id="' . htmlspecialchars($user['id']) . '"
                                                    data-first-name="' . htmlspecialchars($user['firstName']) . '"
                                                    data-last-name="' . htmlspecialchars($user['lastName']) . '"
                                                    data-email="' . htmlspecialchars($user['email']) . '"
                                                    data-status="' . htmlspecialchars($user['status']) . '">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteConfirmModal"
                                                    data-user-id="' . htmlspecialchars($user['id']) . '"
                                                    data-user-name="' . $userName . '">Delete</button>
                                          </td>';
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="user_management.php" class="btn btn-sm btn-primary"
                        style="background-color: var(--rais-button-maroon); border-color: var(--rais-button-maroon);">Manage All Users</a>
                </div>

                <!-- Live Chat Card -->
                <div class="content-card">
                    <h2>Live Chat Monitoring</h2>
                    <div id="chatLog"
                        style="max-height: 300px; overflow-y: auto; border: 1px solid var(--rais-border-color); border-radius: 8px; padding: 15px;">
                        <?php
                        foreach ($chat_logs as $log) {
                            echo '<div class="chat-log-item"><strong>' . htmlspecialchars($log['user']) . ':</strong> ' . htmlspecialchars($log['message']) . '</div>';
                        }
                        ?>
                    </div>
                    <a href="chat_management.php" class="btn btn-sm btn-outline-dark mt-3">View Full Chat History</a>
                </div>

                <div class="content-card my-3">
                    <h2>Content Management</h2>
                    <div class="row g-3">

                    
                    </div>

                    <!-- CHANGE THIS LINE -->
                    <a href="content_management.php#blogs" class="btn btn-sm btn-primary mt-3"
                        style="background-color: var(--rais-button-maroon); border-color: var(--rais-button-maroon);">Manage All Content</a>
                </div>
            </main>
        </div>
    </div>
    
    <!-- MODALS -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="editUserModalLabel">Edit User</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="editUserForm"><input type="hidden" id="editUserId"><div class="mb-3"><label for="editFirstName" class="form-label">First Name</label><input type="text" class="form-control" id="editFirstName" required></div><div class="mb-3"><label for="editLastName" class="form-label">Last Name</label><input type="text" class="form-control" id="editLastName" required></div><div class="mb-3"><label for="editEmail" class="form-label">Email address</label><input type="email" class="form-control" id="editEmail" required></div><div class="mb-3"><label for="editStatus" class="form-label">Status</label><select class="form-select" id="editStatus"><option>Active</option><option>Pending Docs</option><option>Approved</option><option>Inactive</option></select></div></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="submit" form="editUserForm" class="btn btn-primary">Save Changes</button></div></div></div>
    </div>
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body" id="deleteModalBody">Are you sure you want to delete this user?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button></div></div></div>
    </div>
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
        <div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="featureModalLabel">Feature In Development</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body" id="featureModalBody">This feature is coming soon!</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="togglemodeScript.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // --- MODAL ELEMENT SELECTORS ---
        const editUserModal = document.getElementById('editUserModal');
        const deleteConfirmModal = document.getElementById('deleteConfirmModal');
        const featureModal = document.getElementById('featureModal');
        
        // --- EVENT LISTENER FOR EDIT USER MODAL ---
        if (editUserModal) {
            editUserModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // The button that triggered the modal
                
                // Extract info from data-* attributes
                const userId = button.getAttribute('data-user-id');
                const firstName = button.getAttribute('data-first-name');
                const lastName = button.getAttribute('data-last-name');
                const email = button.getAttribute('data-email');
                const status = button.getAttribute('data-status');
                
                // Update the modal's content
                editUserModal.querySelector('.modal-title').textContent = 'Edit User: ' + firstName + ' ' + lastName;
                editUserModal.querySelector('#editUserId').value = userId;
                editUserModal.querySelector('#editFirstName').value = firstName;
                editUserModal.querySelector('#editLastName').value = lastName;
                editUserModal.querySelector('#editEmail').value = email;
                editUserModal.querySelector('#editStatus').value = status;
            });

            // Handle the form submission for editing a user
            const editUserForm = document.getElementById('editUserForm');
            if (editUserForm) {
                editUserForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const userId = document.getElementById('editUserId').value;
                    alert('Demo: Changes for user ID ' + userId + ' would be saved here.');
                    bootstrap.Modal.getInstance(editUserModal).hide();
                });
            }
        }

        // --- EVENT LISTENER FOR DELETE CONFIRMATION MODAL ---
        if (deleteConfirmModal) {
            deleteConfirmModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const userName = button.getAttribute('data-user-name');
                const userId = button.getAttribute('data-user-id');
                
                deleteConfirmModal.querySelector('#deleteModalBody').textContent = `Are you sure you want to delete ${userName}? This action cannot be undone.`;
                deleteConfirmModal.querySelector('#confirmDeleteButton').setAttribute('data-user-id-to-delete', userId);
            });

            // Handle the final click on the "Delete" button inside the modal
            const confirmDeleteBtn = document.getElementById('confirmDeleteButton');
            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', function () {
                    const userIdToDelete = this.getAttribute('data-user-id-to-delete');
                    const userRow = document.getElementById('user-row-' + userIdToDelete);
                    if (userRow) {
                        userRow.remove();
                    }
                    bootstrap.Modal.getInstance(deleteConfirmModal).hide();
                });
            }
        }
        
        // --- EVENT LISTENER FOR GENERIC FEATURE MODAL ---
        if (featureModal) {
            featureModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const featureName = button.getAttribute('data-feature-name');
                featureModal.querySelector('#featureModalBody').textContent = `The "${featureName}" feature is currently in development and will be available soon!`;
            });
        }
    });
    </script>
</body>
</html>```
