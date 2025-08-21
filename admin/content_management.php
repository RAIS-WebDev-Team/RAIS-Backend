<?php
// Page-specific data
$page_title = "RAIS Admin - Content Management";
$active_page = "content_management";

// In a real application, all this data would come from your database.
// For this demo, we are defining some initial data to work with.
$landingMediaData = [
    ["id" => 1, "name" => "Hero Section 1", "uploader" => "admin1", "date" => "2024-10-26", "fileName" => "homepage-video.mp4", "mediaUrl" => "path/to/video.mp4", "file" => null]
];

$aboutData = [
    "title" => "Our Company Mission",
    "description" => "A brief look into our goals and values.",
    "date" => "2024-10-26",
    "mediaUrl" => "https://via.placeholder.com/800x450.png?text=Default+About+Image",
    "mediaType" => "image"
];

// We start with empty arrays for sections that are managed dynamically.
$servicesData = [];
$blogsData = [];
$partnersData = [];

$footerData = [
    ["id" => 1, "label" => "Email", "description" => "contact@rais.com", "type" => "static"],
    ["id" => 2, "label" => "Contacts", "description" => "+1 (123) 456-7890", "type" => "static"],
    ["id" => 3, "label" => "Location", "description" => "123 Immigration Ave, Suite 100, Capital City", "type" => "static"]
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
                <h1>Content Management</h1>
                <div class="content-card">
                    <!-- Dropdown for mobile -->
                    <div class="dropdown d-sm-none mb-3 content-nav">
                        <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" id="contentNavDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- This will be populated by JavaScript -->
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="contentNavDropdown">
                            <li><a class="dropdown-item nav-link active" href="#" data-target="landing-page">Landing Page</a></li>
                            <li><a class="dropdown-item nav-link" href="#" data-target="about">About</a></li>
                            <li><a class="dropdown-item nav-link" href="#" data-target="services">Services</a></li>
                            <li><a class="dropdown-item nav-link" href="#" data-target="blogs">Blogs</a></li>
                            <li><a class="dropdown-item nav-link" href="#" data-target="partners">Partners</a></li>
                            <li><a class="dropdown-item nav-link" href="#" data-target="footer">Footer</a></li>
                        </ul>
                    </div>

                    <!-- Nav pills for desktop -->
                    <nav class="nav nav-pills flex-sm-row content-nav d-none d-sm-flex">
                        <a class="flex-sm-fill text-sm-center nav-link active" href="#" data-target="landing-page">Landing Page</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#" data-target="about">About</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#" data-target="services">Services</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#" data-target="blogs">Blogs</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#" data-target="partners">Partners</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#" data-target="footer">Footer</a>
                    </nav>

                    <div id="content-sections">
                        <!-- Landing Page Section -->
                        <div id="landing-page" class="content-section active">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3>Edit Landing Page Hero Section</h3>
                            </div>
                            <p>Click a row in the table to select an item, then use the buttons at the bottom-right to manage it.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Media Name</th>
                                            <th scope="col">Uploader</th>
                                            <th scope="col">Date Uploaded</th>
                                            <th scope="col">Media File Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="media-table-body"></tbody>
                                </table>
                            </div>
                            <div class="fab-container">
                                <button id="preview-landing-btn" class="btn btn-info btn-lg rounded-circle" title="Preview Media" disabled><i class="bi bi-eye-fill"></i></button>
                                <button id="edit-landing-btn" class="btn btn-warning btn-lg rounded-circle" title="Edit Media" disabled><i class="bi bi-pencil-fill"></i></button>
                                <button id="delete-landing-btn" class="btn btn-danger btn-lg rounded-circle" title="Delete Media" disabled><i class="bi bi-trash-fill"></i></button>
                                <button id="add-landing-btn" class="btn btn-primary btn-lg rounded-circle" title="Add New Media"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <!-- About Section -->
                        <div id="about" class="content-section">
                            <div class="row">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Current Media</h4>
                                            <div id="media-preview-container" class="mb-3 border rounded" style="min-height: 200px; background-color: #f0f0f0;">
                                                <img src="https://via.placeholder.com/800x450.png?text=Default+About+Image" class="img-fluid" alt="About Us Media">
                                            </div>
                                            <h3 id="display-title" class="card-title">Our Company Mission</h3>
                                            <h6 id="display-description" class="card-subtitle mb-2 text-muted">A brief look into our goals and values.</h6>
                                            <p class="card-text"><small id="display-date" class="text-muted">Last updated: 2024-10-26</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Update Media</h3>
                                            <form id="about-form" novalidate>
                                                <div class="mb-3"><label for="input-title" class="form-label">Media Title</label><input type="text" class="form-control" id="input-title" required><div class="invalid-feedback">Please provide a media title.</div></div>
                                                <div class="mb-3"><label for="input-description" class="form-label">Media Description</label><textarea class="form-control" id="input-description" rows="4" required></textarea><div class="invalid-feedback">Please provide a media description.</div></div>
                                                <div class="mb-3"><label for="input-file" class="form-label">Media File</label><div class="input-group"><input type="file" class="form-control" id="input-file" accept="image/*,video/*" hidden><label class="btn btn-outline-secondary" for="input-file" id="file-label">Choose File</label><span class="form-control" id="file-name-display" readonly>No file chosen...</span></div></div>
                                                <div class="d-flex justify-content-end gap-2"><button type="button" class="btn btn-secondary" id="cancel-about-btn">Cancel</button><button type="submit" class="btn btn-primary" id="update-about-btn">Update Media</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services Section -->
                        <div id="services" class="content-section">
                            <h3>Manage Services</h3>
                            <p>Click a card to select a service, then use the buttons at the bottom-right to edit, preview, or delete it.</p>
                            <div id="service-cards-container" class="row g-4"></div>
                            <div class="fab-container">
                                <button id="preview-service-btn" class="btn btn-info btn-lg rounded-circle" title="Preview Service" disabled><i class="bi bi-eye-fill"></i></button>
                                <button id="edit-service-btn" class="btn btn-warning btn-lg rounded-circle" title="Edit Service" disabled><i class="bi bi-pencil-fill"></i></button>
                                <button id="delete-service-btn" class="btn btn-danger btn-lg rounded-circle" title="Delete Service" disabled><i class="bi bi-trash-fill"></i></button>
                                <button id="add-service-btn" class="btn btn-primary btn-lg rounded-circle" title="Add New Service"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <!-- Blogs Section -->
                        <div id="blogs" class="content-section">
                            <h3>Manage Blogs</h3>
                            <p>Click a card to select a blog post, then use the buttons at the bottom-right to edit, preview, or delete it.</p>
                            <div id="blog-cards-container" class="row g-4"></div>
                            <div class="fab-container">
                                <button id="preview-blog-btn" class="btn btn-info btn-lg rounded-circle" title="Preview Blog" disabled><i class="bi bi-eye-fill"></i></button>
                                <button id="edit-blog-btn" class="btn btn-warning btn-lg rounded-circle" title="Edit Blog" disabled><i class="bi bi-pencil-fill"></i></button>
                                <button id="delete-blog-btn" class="btn btn-danger btn-lg rounded-circle" title="Delete Blog" disabled><i class="bi bi-trash-fill"></i></button>
                                <button id="add-blog-btn" class="btn btn-primary btn-lg rounded-circle" title="Add New Blog"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <!-- Partners Section -->
                        <div id="partners" class="content-section">
                            <h3>Manage Partners</h3>
                            <p>Click a row to select a partner, then use the buttons at the bottom-right to manage their information.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead><tr><th scope="col">Partner Name</th><th scope="col">Website Link</th></tr></thead>
                                    <tbody id="partners-table-body"></tbody>
                                </table>
                            </div>
                            <div class="fab-container">
                                <button id="visit-partner-btn" class="btn btn-info btn-lg rounded-circle" title="Visit Link" disabled><i class="bi bi-box-arrow-up-right"></i></button>
                                <button id="edit-partner-btn" class="btn btn-warning btn-lg rounded-circle" title="Edit Partner" disabled><i class="bi bi-pencil-fill"></i></button>
                                <button id="delete-partner-btn" class="btn btn-danger btn-lg rounded-circle" title="Delete Partner" disabled><i class="bi bi-trash-fill"></i></button>
                                <button id="add-partner-btn" class="btn btn-primary btn-lg rounded-circle" title="Add New Partner"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <!-- Footer Section -->
                        <div id="footer" class="content-section">
                            <h3>Edit Footer</h3>
                            <p>Select an item to manage. Static items (Email, Contacts, Location) can only be edited. Social media links can be added, edited, or deleted.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead><tr><th scope="col">Label</th><th scope="col">Description / Link</th><th scope="col">Type</th></tr></thead>
                                    <tbody id="footer-table-body"></tbody>
                                </table>
                            </div>
                            <div class="fab-container">
                                <button id="visit-footer-link-btn" class="btn btn-info btn-lg rounded-circle" title="Visit Link" disabled><i class="bi bi-box-arrow-up-right"></i></button>
                                <button id="edit-footer-item-btn" class="btn btn-warning btn-lg rounded-circle" title="Edit Item" disabled><i class="bi bi-pencil-fill"></i></button>
                                <button id="delete-footer-item-btn" class="btn btn-danger btn-lg rounded-circle" title="Delete Item" disabled><i class="bi bi-trash-fill"></i></button>
                                <button id="add-footer-item-btn" class="btn btn-primary btn-lg rounded-circle" title="Add Social Media"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- ALL MODALS AND TEMPLATES -->
    <!-- (All your existing modals and templates go here) -->
    <!-- ... -->
    <div class="modal fade" id="uploadMediaModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="uploadMediaModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="uploadMediaModalLabel">Add New Hero Media</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="upload-form" novalidate><div class="mb-3"><label for="mediaName" class="form-label">Media Name</label><input type="text" class="form-control" id="mediaName" placeholder="e.g., Hero Section 2" required></div><div class="mb-3"><label for="uploaderName" class="form-label">Uploader</label><input type="text" class="form-control" id="uploaderName" placeholder="e.g., admin2" required></div><div class="mb-3"><label for="mediaFile" class="form-label">Upload Photo or Video</label><input class="form-control" type="file" id="mediaFile" accept="image/*,video/*"><div class="form-text" id="mediaFileHelp">Please select a landscape photo for best results.</div></div></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="save-media-btn">Save Media</button></div></div></div></div>
    <div class="modal fade" id="landscapeWarningModal" tabindex="-1" aria-labelledby="landscapeWarningModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="landscapeWarningModalLabel">Image Orientation Warning</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><p>The chosen photo is not a landscape photo. If you wish to continue, the photo may be stretched or cropped.</p></div><div class="modal-footer"> <button type="button" class="btn btn-secondary" id="repick-photo-btn">Repick Photo</button> <button type="button" class="btn btn-primary" id="continue-anyway-btn">Continue Anyway</button></div></div></div></div>
    <div class="modal fade" id="landing-confirmation-modal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirm Action</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="landing-confirmation-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-landing-action-btn">Confirm</button></div></div></div></div>
    <div class="modal fade" id="landing-preview-modal" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="landing-preview-title">Media Preview</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="landing-preview-body" class="text-center"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>
    <div class="modal fade" id="aboutConfirmationModal" tabindex="-1" aria-labelledby="aboutConfirmationModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="aboutConfirmationModalLabel">Confirm Update</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body">Are you sure you want to update the 'About Us' media and text? This action cannot be undone.</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-about-update-btn">Confirm Update</button></div></div></div></div>
    <div class="modal fade" id="updateSuccessModal" tabindex="-1" aria-labelledby="updateSuccessModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="updateSuccessModalLabel">Success!</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body">The 'About Us' section has been updated successfully.</div><div class="modal-footer"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button></div></div></div></div>
    <div class="modal fade" id="service-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="serviceModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="service-modal-title">Add New Service</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="service-form" novalidate><h6>Service Information</h6><div class="mb-3"><label for="service-name" class="form-label">Service Name</label><input type="text" class="form-control" id="service-name" required></div><div class="mb-3"><label for="service-description" class="form-label">Description</label><textarea class="form-control" id="service-description" rows="3" required></textarea></div><div class="mb-3"><label for="service-hero-media" class="form-label">Hero Section Media</label><input type="file" class="form-control" id="service-hero-media" accept="image/*,video/*"></div><hr class="my-4"><h6>Service Sections</h6><p class="text-muted small">Add detailed sections for this service. The layout will alternate automatically.</p><div id="dynamic-sections-container"></div><button type="button" id="add-section-btn" class="btn btn-outline-primary mt-2"><i class="bi bi-plus-circle me-2"></i>Add Section</button></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="save-service-btn">Add Service</button></div></div></div></div>
    <template id="service-section-template"><div class="p-3 border rounded mb-3 dynamic-section"><div class="d-flex justify-content-between align-items-center mb-2"><h6 class="section-number mb-0">Section 1</h6><button type="button" class="btn-close remove-section-btn" aria-label="Remove Section"></button></div><div class="mb-2"><label class="form-label">Section Title</label><input type="text" class="form-control section-title" required></div><div class="mb-2"><label class="form-label">Section Description</label><textarea class="form-control section-description" rows="3" required></textarea></div><div><label class="form-label">Section Media</label><input type="file" class="form-control section-media" accept="image/*,video/*"></div></div></template>
    <div class="modal fade" id="service-confirmation-modal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirm Action</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="service-confirmation-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-service-action-btn">Confirm</button></div></div></div></div>
    <div class="modal fade" id="service-preview-modal" tabindex="-1"><div class="modal-dialog modal-xl modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="service-preview-title">Service Preview</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="service-preview-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>
    <div class="modal fade" id="blog-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="blogModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="blog-modal-title">Add New Blog Post</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="blog-form" novalidate><h6>Blog Information</h6><div class="mb-3"><label for="blog-title" class="form-label">Blog Title</label><input type="text" class="form-control" id="blog-title" required></div><div class="mb-3"><label for="blog-summary" class="form-label">Summary / Subtitle</label><textarea class="form-control" id="blog-summary" rows="3" required></textarea></div><div class="mb-3"><label for="blog-hero-media" class="form-label">Hero Section Media (Main Image)</label><input type="file" class="form-control" id="blog-hero-media" accept="image/*,video/*"></div><hr class="my-4"><h6>Blog Sections</h6><p class="text-muted small">Add detailed sections for this blog post. The layout will alternate automatically.</p><div id="blog-dynamic-sections-container"></div><button type="button" id="add-blog-section-btn" class="btn btn-outline-primary mt-2"><i class="bi bi-plus-circle me-2"></i>Add Section</button></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="save-blog-btn">Add Blog Post</button></div></div></div></div>
    <template id="blog-section-template"><div class="p-3 border rounded mb-3 dynamic-section"><div class="d-flex justify-content-between align-items-center mb-2"><h6 class="section-number mb-0">Section 1</h6><button type="button" class="btn-close remove-section-btn" aria-label="Remove Section"></button></div><div class="mb-2"><label class="form-label">Section Title (Optional)</label><input type="text" class="form-control section-title"></div><div class="mb-2"><label class="form-label">Section Content / Paragraph</label><textarea class="form-control section-description" rows="5" required></textarea></div><div><label class="form-label">Section Media (Optional)</label><input type="file" class="form-control section-media" accept="image/*,video/*"></div></div></template>
    <div class="modal fade" id="blog-confirmation-modal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirm Action</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="blog-confirmation-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-blog-action-btn">Confirm</button></div></div></div></div>
    <div class="modal fade" id="blog-preview-modal" tabindex="-1"><div class="modal-dialog modal-xl modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="blog-preview-title">Blog Preview</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="blog-preview-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>
    <div class="modal fade" id="partner-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="partnerModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="partner-modal-title">Add New Partner</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="partner-form" novalidate><div class="mb-3"><label for="partner-name" class="form-label">Partner Name</label><input type="text" class="form-control" id="partner-name" required></div><div class="mb-3"><label for="partner-link" class="form-label">Website Link</label><input type="url" class="form-control" id="partner-link" placeholder="https://example.com" required></div><div class="mb-3"><label for="partner-logo" class="form-label">Partner Logo</label><input class="form-control" type="file" id="partner-logo" accept="image/*"><div class="form-text" id="partner-logo-help">Upload a logo for the partner.</div></div><div class="text-center"><img src="https://via.placeholder.com/100x100.png?text=Logo" alt="Logo Preview" id="partner-logo-preview" class="mt-2 bg-light p-1"></div></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="save-partner-btn">Add Partner</button></div></div></div></div>
    <div class="modal fade" id="partner-confirmation-modal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirm Deletion</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="partner-confirmation-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-partner-delete-btn">Confirm</button></div></div></div></div>
    <div class="modal fade" id="footer-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="footerModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="footer-modal-title">Add Social Media Link</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form id="footer-form" novalidate><div class="mb-3"><label for="footer-label" class="form-label">Label</label><input type="text" class="form-control" id="footer-label" placeholder="e.g., Facebook" required></div><div class="mb-3"><label for="footer-description" class="form-label">Description / Link</label><input type="text" class="form-control" id="footer-description" placeholder="e.g., https://facebook.com/your-page" required></div></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="save-footer-item-btn">Save Item</button></div></div></div></div>
    <div class="modal fade" id="footer-confirmation-modal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirm Deletion</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" id="footer-confirmation-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="confirm-footer-delete-btn">Confirm</button></div></div></div></div>


    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="togglemodeScript.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- DATA INJECTION FROM PHP ---
            let landingMediaData = <?php echo json_encode($landingMediaData, JSON_PRETTY_PRINT); ?>;
            let initialAboutData = <?php echo json_encode($aboutData, JSON_PRETTY_PRINT); ?>;
            let servicesData = <?php echo json_encode($servicesData, JSON_PRETTY_PRINT); ?>;
            let blogsData = <?php echo json_encode($blogsData, JSON_PRETTY_PRINT); ?>;
            let partnersData = <?php echo json_encode($partnersData, JSON_PRETTY_PRINT); ?>;
            let footerData = <?php echo json_encode($footerData, JSON_PRETTY_PRINT); ?>;

            // --- MAIN NAVIGATION LOGIC ---
            const navLinks = document.querySelectorAll('.content-nav .nav-link');
            const contentSections = document.querySelectorAll('.content-section');
            const dropdownButton = document.getElementById('contentNavDropdown');

            function setActiveNav(targetId) {
                const activeLink = document.querySelector(`.content-nav .nav-link[data-target="${targetId}"]`);
                if (!activeLink) return;

                // Update button text for dropdown
                if (dropdownButton) {
                    dropdownButton.textContent = activeLink.textContent;
                }

                // Update active classes for all links (in both navs)
                navLinks.forEach(link => {
                    link.classList.toggle('active', link.getAttribute('data-target') === targetId);
                });

                // Update visible content section
                contentSections.forEach(section => {
                    section.classList.toggle('active', section.id === targetId);
                });
            }

            // Add click listeners to all nav links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    setActiveNav(targetId);
                });
            });

            // --- DEEP LINKING LOGIC ---
            (function handleDeepLink() {
                const hash = window.location.hash;
                const targetId = hash ? hash.substring(1) : null;
                // Find the initially active link from the HTML (first one)
                const initialActiveLink = document.querySelector('.content-nav .nav-link.active');

                if (targetId) {
                    // If there's a hash in the URL, prioritize it
                    setActiveNav(targetId);
                } else if (initialActiveLink) {
                    // Otherwise, set the initial state based on the default active link
                    setActiveNav(initialActiveLink.getAttribute('data-target'));
                }
            })();


            // --- START: SCRIPT FOR LANDING PAGE MANAGEMENT ---
            (function() {
                let selectedMediaId = null;
                let nextMediaId = (landingMediaData.length > 0 ? Math.max(...landingMediaData.map(m => m.id)) : 0) + 1;
                const mediaTableBody = document.getElementById('media-table-body');
                const addLandingBtn = document.getElementById('add-landing-btn');
                const editLandingBtn = document.getElementById('edit-landing-btn');
                const deleteLandingBtn = document.getElementById('delete-landing-btn');
                const previewLandingBtn = document.getElementById('preview-landing-btn');
                const uploadModal = new bootstrap.Modal(document.getElementById('uploadMediaModal'));
                const warningModal = new bootstrap.Modal(document.getElementById('landscapeWarningModal'));
                const confirmationModal = new bootstrap.Modal(document.getElementById('landing-confirmation-modal'));
                const previewModal = new bootstrap.Modal(document.getElementById('landing-preview-modal'));
                const uploadForm = document.getElementById('upload-form');
                const mediaFileInput = document.getElementById('mediaFile');
                const saveMediaBtn = document.getElementById('save-media-btn');
                const repickPhotoBtn = document.getElementById('repick-photo-btn');
                const continueAnywayBtn = document.getElementById('continue-anyway-btn');
                let tempFile = null;
                let isLandscape = true;

                function renderTable() {
                    mediaTableBody.innerHTML = '';
                    landingMediaData.forEach(media => {
                        const row = mediaTableBody.insertRow();
                        row.dataset.id = media.id;
                        if (media.id === selectedMediaId) row.classList.add('selected');
                        row.innerHTML = `<td>${media.name}</td><td>${media.uploader}</td><td>${media.date}</td><td>${media.fileName}</td>`;
                    });
                }

                function updateFabState() {
                    const isSelected = selectedMediaId !== null;
                    editLandingBtn.disabled = !isSelected;
                    deleteLandingBtn.disabled = !isSelected;
                    previewLandingBtn.disabled = !isSelected;
                }

                function selectRow(mediaId) {
                    selectedMediaId = (selectedMediaId === mediaId) ? null : mediaId;
                    renderTable();
                    updateFabState();
                }
                
                function resetAndPrepareModal(mode = 'add', media = null) {
                    uploadForm.reset();
                    uploadForm.classList.remove('was-validated');
                    tempFile = null; isLandscape = true;
                    const modalTitle = document.getElementById('uploadMediaModalLabel');
                    const fileHelp = document.getElementById('mediaFileHelp');
                    if (mode === 'add') {
                        modalTitle.textContent = 'Add New Hero Media';
                        saveMediaBtn.textContent = 'Add Media'; saveMediaBtn.dataset.mode = 'add';
                        mediaFileInput.required = true;
                        fileHelp.textContent = 'Please select a photo or video to upload.';
                    } else if (mode === 'edit' && media) {
                        modalTitle.textContent = `Edit Media: ${media.name}`;
                        saveMediaBtn.textContent = 'Update Media'; saveMediaBtn.dataset.mode = 'edit';
                        document.getElementById('mediaName').value = media.name;
                        document.getElementById('uploaderName').value = media.uploader;
                        mediaFileInput.required = false;
                        fileHelp.textContent = `Current file: ${media.fileName}. You can upload a new file to replace it.`;
                    }
                }
                mediaTableBody.addEventListener('click', e => { const row = e.target.closest('tr'); if (row) selectRow(parseInt(row.dataset.id)); });
                addLandingBtn.addEventListener('click', () => { resetAndPrepareModal('add'); uploadModal.show(); });
                editLandingBtn.addEventListener('click', () => { if (selectedMediaId === null) return; const media = landingMediaData.find(m => m.id === selectedMediaId); resetAndPrepareModal('edit', media); uploadModal.show(); });
                
                deleteLandingBtn.addEventListener('click', () => {
                    if (selectedMediaId === null) return;
                    const media = landingMediaData.find(m => m.id === selectedMediaId);
                    document.getElementById('landing-confirmation-body').innerHTML = `Are you sure you want to delete the media: <strong>${media.name}</strong>?`;
                    document.getElementById('confirm-landing-action-btn').onclick = () => {
                        landingMediaData = landingMediaData.filter(m => m.id !== selectedMediaId);
                        selectedMediaId = null; renderTable(); updateFabState(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });

                previewLandingBtn.addEventListener('click', () => {
                    if (selectedMediaId === null) return;
                    const media = landingMediaData.find(m => m.id === selectedMediaId);
                    document.getElementById('landing-preview-title').textContent = `Preview: ${media.name}`;
                    const previewBody = document.getElementById('landing-preview-body');
                    const mediaToPreview = media.file ? media.file : media.mediaUrl;
                    if (mediaToPreview) {
                        const url = (typeof mediaToPreview === 'string') ? mediaToPreview : URL.createObjectURL(mediaToPreview);
                        const isImage = (media.fileName || '').match(/\.(jpeg|jpg|gif|png)$/);
                        const isVideo = (media.fileName || '').match(/\.(mp4|webm|ogg)$/);
                        if (isImage) { previewBody.innerHTML = `<img src="${url}" class="img-fluid rounded" alt="Preview">`; } 
                        else if (isVideo) { previewBody.innerHTML = `<video src="${url}" class="img-fluid rounded" controls autoplay muted loop></video>`; }
                        else { previewBody.innerHTML = `<p class="text-muted">Preview not available.</p>`; }
                    } else { previewBody.innerHTML = `<p class="text-muted">No preview available.</p>`; }
                    previewModal.show();
                });
                
                mediaFileInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    tempFile = file;
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = e => { const img = new Image(); img.onload = () => { isLandscape = (img.width > img.height); }; img.src = e.target.result; };
                        reader.readAsDataURL(file);
                    } else { isLandscape = true; }
                });

                saveMediaBtn.addEventListener('click', () => {
                    if (!uploadForm.checkValidity()) { uploadForm.reportValidity(); return; }
                    if (!isLandscape) { warningModal.show(); return; }
                    const mode = saveMediaBtn.dataset.mode;
                    document.getElementById('landing-confirmation-body').textContent = `Are you sure you want to ${mode === 'add' ? 'add this new' : 'update this'} media item?`;
                    document.getElementById('confirm-landing-action-btn').onclick = () => {
                        const name = document.getElementById('mediaName').value;
                        const uploader = document.getElementById('uploaderName').value;
                        if (mode === 'add') {
                            landingMediaData.push({ id: nextMediaId++, name: name, uploader: uploader, date: new Date().toISOString().slice(0, 10), file: tempFile, fileName: tempFile.name });
                        } else {
                            const media = landingMediaData.find(m => m.id === selectedMediaId);
                            media.name = name; media.uploader = uploader;
                            if (tempFile) { media.file = tempFile; media.fileName = tempFile.name; }
                        }
                        renderTable(); uploadModal.hide(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });
                repickPhotoBtn.addEventListener('click', () => { warningModal.hide(); mediaFileInput.value = ''; tempFile = null; });
                continueAnywayBtn.addEventListener('click', () => { isLandscape = true; warningModal.hide(); saveMediaBtn.click(); });
                renderTable();
                updateFabState();
            })();

            // --- START: SCRIPT FOR ABOUT PAGE MANAGEMENT ---
            (function() {
                const confirmationModal = new bootstrap.Modal(document.getElementById('aboutConfirmationModal'));
                const successModal = new bootstrap.Modal(document.getElementById('updateSuccessModal'));
                const aboutForm = document.getElementById('about-form');
                const mediaPreviewContainer = document.getElementById('media-preview-container');
                const displayTitle = document.getElementById('display-title');
                const displayDescription = document.getElementById('display-description');
                const displayDate = document.getElementById('display-date');
                const inputTitle = document.getElementById('input-title');
                const inputDescription = document.getElementById('input-description');
                const inputFile = document.getElementById('input-file');
                const fileLabel = document.getElementById('file-label');
                const fileNameDisplay = document.getElementById('file-name-display');
                const cancelBtn = document.getElementById('cancel-about-btn');
                const confirmUpdateBtn = document.getElementById('confirm-about-update-btn');

                let currentState = {
                    title: initialAboutData.title,
                    description: initialAboutData.description,
                    date: `Last updated: ${initialAboutData.date}`,
                    mediaHtml: `<img src="${initialAboutData.mediaUrl}" class="img-fluid" alt="About Us Media">`,
                    fileName: 'No file chosen...'
                };

                function resetToCurrentState() {
                    displayTitle.textContent = currentState.title;
                    displayDescription.textContent = currentState.description;
                    displayDate.textContent = currentState.date;
                    mediaPreviewContainer.innerHTML = currentState.mediaHtml;
                    inputTitle.value = currentState.title;
                    inputDescription.value = currentState.description;
                    fileNameDisplay.textContent = currentState.fileName;
                    fileLabel.textContent = currentState.fileName === 'No file chosen...' ? 'Choose File' : 'Change File';
                    inputFile.value = '';
                    aboutForm.classList.remove('was-validated');
                }
                
                resetToCurrentState();

                inputFile.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const fileURL = URL.createObjectURL(file);
                        let mediaElement;
                        if (file.type.startsWith('image/')) { mediaElement = `<img src="${fileURL}" class="img-fluid" alt="New media preview">`; } 
                        else if (file.type.startsWith('video/')) { mediaElement = `<video src="${fileURL}" class="img-fluid" autoplay muted loop playsinline></video>`; }
                        if (mediaElement) {
                            mediaPreviewContainer.innerHTML = mediaElement;
                            fileNameDisplay.textContent = file.name;
                            fileLabel.textContent = 'Change File';
                        }
                    }
                });
                cancelBtn.addEventListener('click', resetToCurrentState);
                aboutForm.addEventListener('submit', function(event) {
                    event.preventDefault(); event.stopPropagation();
                    if (!this.checkValidity()) { this.classList.add('was-validated'); return; }
                    confirmationModal.show();
                });
                confirmUpdateBtn.addEventListener('click', function() {
                    confirmationModal.hide();
                    currentState.title = inputTitle.value;
                    currentState.description = inputDescription.value;
                    currentState.date = `Last updated: ${new Date().toISOString().slice(0, 10)}`;
                    currentState.mediaHtml = mediaPreviewContainer.innerHTML;
                    currentState.fileName = fileNameDisplay.textContent;
                    resetToCurrentState();
                    successModal.show();
                });
            })();
            
            // --- START: SCRIPT FOR SERVICES PAGE MANAGEMENT ---
            (function() {
                let selectedServiceId = null;
                let nextServiceId = (servicesData.length > 0 ? Math.max(...servicesData.map(s => s.id)) : 0) + 1;
                const serviceCardsContainer = document.getElementById('service-cards-container');
                const addServiceBtn = document.getElementById('add-service-btn');
                const editServiceBtn = document.getElementById('edit-service-btn');
                const deleteServiceBtn = document.getElementById('delete-service-btn');
                const previewServiceBtn = document.getElementById('preview-service-btn');
                const serviceModal = new bootstrap.Modal(document.getElementById('service-modal'));
                const confirmationModal = new bootstrap.Modal(document.getElementById('service-confirmation-modal'));
                const previewModal = new bootstrap.Modal(document.getElementById('service-preview-modal'));
                const serviceModalTitle = document.getElementById('service-modal-title');
                const serviceForm = document.getElementById('service-form');
                const saveServiceBtn = document.getElementById('save-service-btn');
                const addSectionBtn = document.getElementById('add-section-btn');
                const dynamicSectionsContainer = document.getElementById('dynamic-sections-container');
                const sectionTemplate = document.getElementById('service-section-template');

                function renderServiceCards() {
                    serviceCardsContainer.innerHTML = '';
                    servicesData.forEach(service => {
                        const cardCol = document.createElement('div'); cardCol.className = 'col-md-6 col-lg-4';
                        const card = document.createElement('div'); card.className = 'card service-card'; card.dataset.id = service.id;
                        if (service.id === selectedServiceId) card.classList.add('selected');
                        const mediaUrl = service.heroMedia ? URL.createObjectURL(service.heroMedia) : 'https://via.placeholder.com/800x600.png?text=Service+Media';
                        card.innerHTML = `<img src="${mediaUrl}" class="card-img-top service-card-img" alt="${service.name}"><div class="card-body"><h5 class="card-title">${service.name}</h5><p class="card-text">${service.description}</p></div>`;
                        cardCol.appendChild(card);
                        serviceCardsContainer.appendChild(cardCol);
                    });
                }
                function updateFabState() { const isSelected = selectedServiceId !== null; editServiceBtn.disabled = !isSelected; deleteServiceBtn.disabled = !isSelected; previewServiceBtn.disabled = !isSelected; }
                function selectCard(serviceId) { selectedServiceId = (selectedServiceId === serviceId) ? null : serviceId; renderServiceCards(); updateFabState(); }
                function createSectionElement() { const newSection = sectionTemplate.content.cloneNode(true).firstElementChild; newSection.querySelector('.remove-section-btn').addEventListener('click', () => { newSection.remove(); updateSectionNumbers(); }); return newSection; }
                function updateSectionNumbers() { dynamicSectionsContainer.querySelectorAll('.dynamic-section').forEach((section, index) => { section.querySelector('.section-number').textContent = `Section ${index + 1}`; }); }
                function resetAndPrepareModal(mode = 'add', service = null) {
                    serviceForm.reset(); dynamicSectionsContainer.innerHTML = ''; serviceForm.classList.remove('was-validated');
                    if (mode === 'add') { serviceModalTitle.textContent = 'Add New Service'; saveServiceBtn.textContent = 'Add Service'; saveServiceBtn.dataset.mode = 'add'; } 
                    else if (mode === 'edit' && service) {
                        serviceModalTitle.textContent = `Edit Service: ${service.name}`; saveServiceBtn.textContent = 'Update Service'; saveServiceBtn.dataset.mode = 'edit';
                        document.getElementById('service-name').value = service.name;
                        document.getElementById('service-description').value = service.description;
                        service.sections.forEach(sectionData => {
                            const newSection = createSectionElement();
                            newSection.querySelector('.section-title').value = sectionData.title;
                            newSection.querySelector('.section-description').value = sectionData.description;
                            dynamicSectionsContainer.appendChild(newSection);
                        });
                        updateSectionNumbers();
                    }
                }
                serviceCardsContainer.addEventListener('click', (e) => { const card = e.target.closest('.service-card'); if (card) selectCard(parseInt(card.dataset.id)); });
                addServiceBtn.addEventListener('click', () => { resetAndPrepareModal('add'); serviceModal.show(); });
                editServiceBtn.addEventListener('click', () => { if (selectedServiceId === null) return; const service = servicesData.find(s => s.id === selectedServiceId); resetAndPrepareModal('edit', service); serviceModal.show(); });
                addSectionBtn.addEventListener('click', () => { dynamicSectionsContainer.appendChild(createSectionElement()); updateSectionNumbers(); });
                
                saveServiceBtn.addEventListener('click', () => {
                    if (!serviceForm.checkValidity()) { serviceForm.classList.add('was-validated'); return; }
                    const mode = saveServiceBtn.dataset.mode;
                    document.getElementById('service-confirmation-body').textContent = `Are you sure you want to ${mode === 'add' ? 'add this new' : 'update this'} service?`;
                    document.getElementById('confirm-service-action-btn').onclick = () => {
                        const sections = Array.from(dynamicSectionsContainer.querySelectorAll('.dynamic-section')).map(el => ({ title: el.querySelector('.section-title').value, description: el.querySelector('.section-description').value, media: el.querySelector('.section-media').files[0] || null }));
                        if (mode === 'add') {
                            servicesData.push({ id: nextServiceId++, name: document.getElementById('service-name').value, description: document.getElementById('service-description').value, heroMedia: document.getElementById('service-hero-media').files[0] || null, sections: sections });
                        } else {
                            const service = servicesData.find(s => s.id === selectedServiceId);
                            service.name = document.getElementById('service-name').value;
                            service.description = document.getElementById('service-description').value;
                            const newHero = document.getElementById('service-hero-media').files[0];
                            if (newHero) service.heroMedia = newHero;
                            service.sections = sections;
                        }
                        renderServiceCards(); updateFabState(); serviceModal.hide(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });
                
                deleteServiceBtn.addEventListener('click', () => {
                    if (selectedServiceId === null) return;
                    const service = servicesData.find(s => s.id === selectedServiceId);
                    document.getElementById('service-confirmation-body').innerHTML = `Are you sure you want to delete the service: <strong>${service.name}</strong>?`;
                    document.getElementById('confirm-service-action-btn').onclick = () => {
                        servicesData = servicesData.filter(s => s.id !== selectedServiceId);
                        selectedServiceId = null; renderServiceCards(); updateFabState(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });

                previewServiceBtn.addEventListener('click', () => {
                    if (selectedServiceId === null) return;
                    const service = servicesData.find(s => s.id === selectedServiceId);
                    document.getElementById('service-preview-title').textContent = `Preview: ${service.name}`;
                    let content = `<div class="text-center mb-4"><img src="${service.heroMedia ? URL.createObjectURL(service.heroMedia) : 'https://via.placeholder.com/1200x400.png?text=Hero+Media'}" class="img-fluid rounded mb-3" alt="Hero Media"><h2>${service.name}</h2><p class="lead">${service.description}</p></div><hr>`;
                    service.sections.forEach((section, index) => {
                        const mediaUrl = section.media ? URL.createObjectURL(section.media) : null;
                        const layoutOrder = index % 2 === 0 ? '' : 'order-lg-2';
                        content += `<div class="row align-items-center mb-5"><div class="col-lg-6 ${layoutOrder}"><img src="${mediaUrl || 'https://via.placeholder.com/800x600.png?text=Section+Media'}" class="img-fluid rounded shadow-sm"></div><div class="col-lg-6"><h3>${section.title}</h3><p>${section.description}</p></div></div>`;
                    });
                    document.getElementById('service-preview-body').innerHTML = content;
                    previewModal.show();
                });
                renderServiceCards();
                updateFabState();
            })();

            // --- START: SCRIPT FOR BLOGS PAGE MANAGEMENT ---
            (function() {
                let selectedBlogId = null;
                let nextBlogId = (blogsData.length > 0 ? Math.max(...blogsData.map(b => b.id)) : 0) + 1;
                const blogCardsContainer = document.getElementById('blog-cards-container');
                const addBlogBtn = document.getElementById('add-blog-btn');
                const editBlogBtn = document.getElementById('edit-blog-btn');
                const deleteBlogBtn = document.getElementById('delete-blog-btn');
                const previewBlogBtn = document.getElementById('preview-blog-btn');
                const blogModal = new bootstrap.Modal(document.getElementById('blog-modal'));
                const blogConfirmationModal = new bootstrap.Modal(document.getElementById('blog-confirmation-modal'));
                const blogPreviewModal = new bootstrap.Modal(document.getElementById('blog-preview-modal'));
                const blogModalTitle = document.getElementById('blog-modal-title');
                const blogForm = document.getElementById('blog-form');
                const saveBlogBtn = document.getElementById('save-blog-btn');
                const addBlogSectionBtn = document.getElementById('add-blog-section-btn');
                const blogDynamicSectionsContainer = document.getElementById('blog-dynamic-sections-container');
                const blogSectionTemplate = document.getElementById('blog-section-template');

                function renderBlogCards() {
                    blogCardsContainer.innerHTML = '';
                    blogsData.forEach(blog => {
                        const cardCol = document.createElement('div'); cardCol.className = 'col-md-6 col-lg-4';
                        const card = document.createElement('div'); card.className = 'card blog-card'; card.dataset.id = blog.id;
                        if (blog.id === selectedBlogId) card.classList.add('selected');
                        const mediaUrl = blog.heroMedia ? URL.createObjectURL(blog.heroMedia) : 'https://via.placeholder.com/800x600.png?text=Blog+Image';
                        card.innerHTML = `<img src="${mediaUrl}" class="card-img-top blog-card-img" alt="${blog.title}"><div class="card-body"><h5 class="card-title">${blog.title}</h5><p class="card-text">${blog.summary}</p></div>`;
                        cardCol.appendChild(card);
                        blogCardsContainer.appendChild(cardCol);
                    });
                }
                function updateFabState() { const isSelected = selectedBlogId !== null; editBlogBtn.disabled = !isSelected; deleteBlogBtn.disabled = !isSelected; previewBlogBtn.disabled = !isSelected; }
                function selectCard(blogId) { selectedBlogId = (selectedBlogId === blogId) ? null : blogId; renderBlogCards(); updateFabState(); }
                function createSectionElement() { const newSection = blogSectionTemplate.content.cloneNode(true).firstElementChild; newSection.querySelector('.remove-section-btn').addEventListener('click', () => { newSection.remove(); updateSectionNumbers(); }); return newSection; }
                function updateSectionNumbers() { blogDynamicSectionsContainer.querySelectorAll('.dynamic-section').forEach((section, index) => { section.querySelector('.section-number').textContent = `Section ${index + 1}`; }); }
                function resetAndPrepareModal(mode = 'add', blog = null) {
                    blogForm.reset(); blogDynamicSectionsContainer.innerHTML = ''; blogForm.classList.remove('was-validated');
                    if (mode === 'add') { blogModalTitle.textContent = 'Add New Blog Post'; saveBlogBtn.textContent = 'Add Blog Post'; saveBlogBtn.dataset.mode = 'add'; } 
                    else if (mode === 'edit' && blog) {
                        blogModalTitle.textContent = `Edit Blog: ${blog.title}`; saveBlogBtn.textContent = 'Update Blog Post'; saveBlogBtn.dataset.mode = 'edit';
                        document.getElementById('blog-title').value = blog.title;
                        document.getElementById('blog-summary').value = blog.summary;
                        blog.sections.forEach(sectionData => {
                            const newSection = createSectionElement();
                            newSection.querySelector('.section-title').value = sectionData.title;
                            newSection.querySelector('.section-description').value = sectionData.description;
                            blogDynamicSectionsContainer.appendChild(newSection);
                        });
                        updateSectionNumbers();
                    }
                }
                blogCardsContainer.addEventListener('click', (e) => { const card = e.target.closest('.blog-card'); if (card) selectCard(parseInt(card.dataset.id)); });
                addBlogBtn.addEventListener('click', () => { resetAndPrepareModal('add'); blogModal.show(); });
                editBlogBtn.addEventListener('click', () => { if (selectedBlogId === null) return; const blog = blogsData.find(b => b.id === selectedBlogId); resetAndPrepareModal('edit', blog); blogModal.show(); });
                addBlogSectionBtn.addEventListener('click', () => { blogDynamicSectionsContainer.appendChild(createSectionElement()); updateSectionNumbers(); });
                
                saveBlogBtn.addEventListener('click', () => {
                    if (!blogForm.checkValidity()) { blogForm.classList.add('was-validated'); return; }
                    const mode = saveBlogBtn.dataset.mode;
                    document.getElementById('blog-confirmation-body').textContent = `Are you sure you want to ${mode === 'add' ? 'add this new' : 'update this'} blog post?`;
                    document.getElementById('confirm-blog-action-btn').onclick = () => {
                        const sections = Array.from(blogDynamicSectionsContainer.querySelectorAll('.dynamic-section')).map(el => ({ title: el.querySelector('.section-title').value, description: el.querySelector('.section-description').value, media: el.querySelector('.section-media').files[0] || null }));
                        if (mode === 'add') {
                            blogsData.push({ id: nextBlogId++, title: document.getElementById('blog-title').value, summary: document.getElementById('blog-summary').value, heroMedia: document.getElementById('blog-hero-media').files[0] || null, sections: sections });
                        } else {
                            const blog = blogsData.find(b => b.id === selectedBlogId);
                            blog.title = document.getElementById('blog-title').value;
                            blog.summary = document.getElementById('blog-summary').value;
                            const newHero = document.getElementById('blog-hero-media').files[0];
                            if (newHero) blog.heroMedia = newHero;
                            blog.sections = sections;
                        }
                        renderBlogCards(); updateFabState(); blogModal.hide(); blogConfirmationModal.hide();
                    };
                    blogConfirmationModal.show();
                });

                deleteBlogBtn.addEventListener('click', () => {
                    if (selectedBlogId === null) return;
                    const blog = blogsData.find(b => b.id === selectedBlogId);
                    document.getElementById('blog-confirmation-body').innerHTML = `Are you sure you want to delete the blog post: <strong>${blog.title}</strong>?`;
                    document.getElementById('confirm-blog-action-btn').onclick = () => {
                        blogsData = blogsData.filter(b => b.id !== selectedBlogId);
                        selectedBlogId = null; renderBlogCards(); updateFabState(); blogConfirmationModal.hide();
                    };
                    blogConfirmationModal.show();
                });
                
                previewBlogBtn.addEventListener('click', () => {
                    if (selectedBlogId === null) return;
                    const blog = blogsData.find(b => b.id === selectedBlogId);
                    document.getElementById('blog-preview-title').textContent = `Preview: ${blog.title}`;
                    let content = `<div class="text-center mb-4"><img src="${blog.heroMedia ? URL.createObjectURL(blog.heroMedia) : 'https://via.placeholder.com/1200x400.png?text=Hero+Image'}" class="img-fluid rounded mb-3" alt="Hero Image"><h1>${blog.title}</h1><p class="lead text-muted">${blog.summary}</p></div><hr>`;
                    blog.sections.forEach((section, index) => {
                        const mediaUrl = section.media ? URL.createObjectURL(section.media) : null;
                        const layoutOrder = index % 2 === 0 ? '' : 'order-lg-2';
                        content += `<div class="row align-items-center mb-5"><div class="col-lg-6 ${layoutOrder}"><img src="${mediaUrl || 'https://via.placeholder.com/800x600.png?text=Section+Media'}" class="img-fluid rounded shadow-sm"></div><div class="col-lg-6"><h3>${section.title}</h3><p>${section.description.replace(/\n/g, '<br>')}</p></div></div>`;
                    });
                    document.getElementById('blog-preview-body').innerHTML = content;
                    blogPreviewModal.show();
                });
                renderBlogCards();
                updateFabState();
            })();
            
            // --- START: SCRIPT FOR PARTNERS PAGE MANAGEMENT ---
            (function() {
                let selectedPartnerId = null;
                let nextPartnerId = (partnersData.length > 0 ? Math.max(...partnersData.map(p => p.id)) : 0) + 1;
                const partnersTableBody = document.getElementById('partners-table-body');
                const addPartnerBtn = document.getElementById('add-partner-btn');
                const editPartnerBtn = document.getElementById('edit-partner-btn');
                const deletePartnerBtn = document.getElementById('delete-partner-btn');
                const visitPartnerBtn = document.getElementById('visit-partner-btn');
                const partnerModal = new bootstrap.Modal(document.getElementById('partner-modal'));
                const confirmationModal = new bootstrap.Modal(document.getElementById('partner-confirmation-modal'));
                const partnerForm = document.getElementById('partner-form');
                const partnerModalTitle = document.getElementById('partner-modal-title');
                const savePartnerBtn = document.getElementById('save-partner-btn');
                const logoInput = document.getElementById('partner-logo');
                const logoPreview = document.getElementById('partner-logo-preview');
                let tempLogoFile = null;

                function renderTable() {
                    partnersTableBody.innerHTML = '';
                    partnersData.forEach(p => {
                        const row = partnersTableBody.insertRow();
                        row.dataset.id = p.id;
                        if (p.id === selectedPartnerId) row.classList.add('selected');
                        row.innerHTML = `<td>${p.name}</td><td><a href="${p.link}" target="_blank">${p.link}</a></td>`;
                    });
                }
                function updateFabState() { const isSelected = selectedPartnerId !== null; editPartnerBtn.disabled = !isSelected; deletePartnerBtn.disabled = !isSelected; visitPartnerBtn.disabled = !isSelected; }
                function selectRow(partnerId) { selectedPartnerId = (selectedPartnerId === partnerId) ? null : partnerId; renderTable(); updateFabState(); }
                function resetAndPrepareModal(mode = 'add', partner = null) {
                    partnerForm.reset(); partnerForm.classList.remove('was-validated'); tempLogoFile = null;
                    logoPreview.src = 'https://via.placeholder.com/100x100.png?text=Logo';
                    const logoHelp = document.getElementById('partner-logo-help');
                    if (mode === 'add') {
                        partnerModalTitle.textContent = 'Add New Partner'; savePartnerBtn.textContent = 'Add Partner'; savePartnerBtn.dataset.mode = 'add';
                        logoInput.required = true; logoHelp.textContent = 'Please upload a logo for the partner.';
                    } else if (mode === 'edit' && partner) {
                        partnerModalTitle.textContent = `Edit Partner: ${partner.name}`; savePartnerBtn.textContent = 'Update Partner'; savePartnerBtn.dataset.mode = 'edit';
                        document.getElementById('partner-name').value = partner.name;
                        document.getElementById('partner-link').value = partner.link;
                        logoInput.required = false; logoHelp.textContent = `Current logo: ${partner.logoFileName}. Upload a new file to replace it.`;
                        if (partner.logoFile) { logoPreview.src = URL.createObjectURL(partner.logoFile); }
                    }
                }
                partnersTableBody.addEventListener('click', e => { const row = e.target.closest('tr'); if (row) selectRow(parseInt(row.dataset.id)); });
                logoInput.addEventListener('change', function() { if (this.files[0]) { tempLogoFile = this.files[0]; logoPreview.src = URL.createObjectURL(tempLogoFile); } });
                addPartnerBtn.addEventListener('click', () => { resetAndPrepareModal('add'); partnerModal.show(); });
                editPartnerBtn.addEventListener('click', () => { if (selectedPartnerId === null) return; const partner = partnersData.find(p => p.id === selectedPartnerId); resetAndPrepareModal('edit', partner); partnerModal.show(); });
                visitPartnerBtn.addEventListener('click', () => { if (selectedPartnerId === null) return; const partner = partnersData.find(p => p.id === selectedPartnerId); window.open(partner.link, '_blank'); });
                
                deletePartnerBtn.addEventListener('click', () => {
                    if (selectedPartnerId === null) return;
                    const partner = partnersData.find(p => p.id === selectedPartnerId);
                    document.getElementById('partner-confirmation-body').innerHTML = `Are you sure you want to delete the partner: <strong>${partner.name}</strong>?`;
                    document.getElementById('confirm-partner-delete-btn').onclick = () => {
                        partnersData = partnersData.filter(p => p.id !== selectedPartnerId);
                        selectedPartnerId = null; renderTable(); updateFabState(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });
                
                savePartnerBtn.addEventListener('click', () => {
                    if (!partnerForm.checkValidity()) { partnerForm.classList.add('was-validated'); return; }
                    const mode = savePartnerBtn.dataset.mode;
                    if (mode === 'add') {
                        partnersData.push({ id: nextPartnerId++, name: document.getElementById('partner-name').value, link: document.getElementById('partner-link').value, logoFile: tempLogoFile, logoFileName: tempLogoFile ? tempLogoFile.name : '' });
                    } else {
                        const partner = partnersData.find(p => p.id === selectedPartnerId);
                        partner.name = document.getElementById('partner-name').value;
                        partner.link = document.getElementById('partner-link').value;
                        if (tempLogoFile) { partner.logoFile = tempLogoFile; partner.logoFileName = tempLogoFile.name; }
                    }
                    renderTable(); partnerModal.hide();
                });
                renderTable(); updateFabState();
            })();

            // --- START: SCRIPT FOR FOOTER PAGE MANAGEMENT ---
            (function() {
                let selectedItemId = null;
                let nextItemId = (footerData.length > 0 ? Math.max(...footerData.map(i => i.id)) : 0) + 1;
                const footerTableBody = document.getElementById('footer-table-body');
                const addItemBtn = document.getElementById('add-footer-item-btn');
                const editItemBtn = document.getElementById('edit-footer-item-btn');
                const deleteItemBtn = document.getElementById('delete-footer-item-btn');
                const visitLinkBtn = document.getElementById('visit-footer-link-btn');
                const itemModal = new bootstrap.Modal(document.getElementById('footer-modal'));
                const confirmationModal = new bootstrap.Modal(document.getElementById('footer-confirmation-modal'));
                const itemForm = document.getElementById('footer-form');
                const itemModalTitle = document.getElementById('footer-modal-title');
                const saveItemBtn = document.getElementById('save-footer-item-btn');
                const itemLabelInput = document.getElementById('footer-label');

                function renderTable() {
                    footerTableBody.innerHTML = '';
                    footerData.forEach(item => {
                        const row = footerTableBody.insertRow(); row.dataset.id = item.id;
                        if (item.id === selectedItemId) row.classList.add('selected');
                        const typeDisplay = item.type === 'static' ? '<span class="badge bg-secondary">Static</span>' : '<span class="badge bg-info">Social</span>';
                        row.innerHTML = `<td>${item.label}</td><td>${item.description}</td><td>${typeDisplay}</td>`;
                    });
                }
                function updateFabState() {
                    const selectedItem = footerData.find(item => item.id === selectedItemId);
                    if (!selectedItem) { editItemBtn.disabled = true; deleteItemBtn.disabled = true; visitLinkBtn.disabled = true; } 
                    else {
                        editItemBtn.disabled = false;
                        if (selectedItem.type === 'static') { deleteItemBtn.disabled = true; visitLinkBtn.disabled = true; } 
                        else { deleteItemBtn.disabled = false; visitLinkBtn.disabled = false; }
                    }
                }
                function selectRow(itemId) { selectedItemId = (selectedItemId === itemId) ? null : itemId; renderTable(); updateFabState(); }
                function resetAndPrepareModal(mode = 'add', item = null) {
                    itemForm.reset(); itemForm.classList.remove('was-validated'); itemLabelInput.readOnly = false;
                    if (mode === 'add') { itemModalTitle.textContent = 'Add Social Media Link'; saveItemBtn.textContent = 'Add Item'; saveItemBtn.dataset.mode = 'add'; } 
                    else if (mode === 'edit' && item) {
                        itemModalTitle.textContent = `Edit Item: ${item.label}`; saveItemBtn.textContent = 'Update Item'; saveItemBtn.dataset.mode = 'edit';
                        itemLabelInput.value = item.label;
                        document.getElementById('footer-description').value = item.description;
                        if (item.type === 'static') itemLabelInput.readOnly = true;
                    }
                }
                footerTableBody.addEventListener('click', e => { const row = e.target.closest('tr'); if (row) selectRow(parseInt(row.dataset.id)); });
                addItemBtn.addEventListener('click', () => { resetAndPrepareModal('add'); itemModal.show(); });
                editItemBtn.addEventListener('click', () => { if (selectedItemId === null) return; const item = footerData.find(i => i.id === selectedItemId); resetAndPrepareModal('edit', item); itemModal.show(); });
                visitLinkBtn.addEventListener('click', () => { if (selectedItemId === null) return; const item = footerData.find(i => i.id === selectedItemId); if (item && item.type !== 'static') window.open(item.description, '_blank'); });
                
                deleteItemBtn.addEventListener('click', () => {
                    if (selectedItemId === null) return;
                    const item = footerData.find(i => i.id === selectedItemId);
                    if (item.type === 'static') return;
                    document.getElementById('footer-confirmation-body').innerHTML = `Are you sure you want to delete the link for <strong>${item.label}</strong>?`;
                    document.getElementById('confirm-footer-delete-btn').onclick = () => {
                        footerData = footerData.filter(i => i.id !== selectedItemId);
                        selectedItemId = null; renderTable(); updateFabState(); confirmationModal.hide();
                    };
                    confirmationModal.show();
                });
                
                saveItemBtn.addEventListener('click', () => {
                    if (!itemForm.checkValidity()) { itemForm.classList.add('was-validated'); return; }
                    const mode = saveItemBtn.dataset.mode;
                    const label = itemLabelInput.value;
                    const description = document.getElementById('footer-description').value;
                    if (mode === 'add') { footerData.push({ id: nextItemId++, label, description, type: 'social' }); } 
                    else { const item = footerData.find(i => i.id === selectedItemId); item.label = label; item.description = description; }
                    renderTable(); itemModal.hide();
                });
                renderTable(); updateFabState();
            })();
            
            // --- GLOBAL FAB VISIBILITY MANAGER ---
            (function() {
                function updateFabVisibility() {
                    document.querySelectorAll('.fab-container').forEach(container => { container.style.display = 'none'; });
                    const activeSection = document.querySelector('.content-section.active');
                    if (activeSection) {
                        const activeFabContainer = activeSection.querySelector('.fab-container');
                        if (activeFabContainer) activeFabContainer.style.display = 'flex';
                    }
                }
                navLinks.forEach(link => { link.addEventListener('click', () => setTimeout(updateFabVisibility, 50)); });
                updateFabVisibility();
            })();
        });
    </script>
</body>
</html>