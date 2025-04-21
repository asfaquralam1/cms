<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h5 style="color: white;">Admin Panel</h5>
        <div style="display: flex; gap: 15px; align-items: center;">
            <h6 style="color: white;">Home</h6>

            <!-- Bell Dropdown -->
            <div class="dropdown">
                <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; text-decoration: none;">
                    <i class="fas fa-bell"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Notification 1</a></li>
                    <li><a class="dropdown-item" href="#">Notification 2</a></li>
                    <li><a class="dropdown-item" href="#">View All</a></li>
                </ul>
            </div>

            <!-- Envelope Dropdown -->
            <div class="dropdown">
                <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; text-decoration: none;">
                    <i class="fas fa-envelope"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Message 1</a></li>
                    <li><a class="dropdown-item" href="#">Message 2</a></li>
                    <li><a class="dropdown-item" href="#">See All Messages</a></li>
                </ul>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown">
                <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; text-decoration: none;">
                    <i class="fas fa-user"></i> Jone Smith
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Sidebar (col-4) -->
        <div class="col-lg-2">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-bell"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-simple"></i>Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-gear"></i>Settings</a></li>
            </ul>
        </div>

        <!-- Dashboard (col-8) -->
        <div class="col-lg-10 bg-light">
            <h2>Dashboard</h2>
            <p>Welcome to the dashboard! Here's your main content area.</p>
            <!-- Add cards, charts, tables, etc. here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>