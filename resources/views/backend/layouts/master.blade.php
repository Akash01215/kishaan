<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Krishi Shathi - Laravel Admin Dashboard')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS (v5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        /* Custom CSS Variables */
        :root {
            --primary-color: #28a745;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --bg-primary: #f4f6f9;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
        }

        /* Global Styles */
        body {
            background-color: var(--bg-primary) !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #495057;
        }

        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, hsla(113, 70%, 51%, 1.00) 100%);
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #ecf0f1 !important;
            padding: 12px 20px;
            margin: 2px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover {
            background-color: var(--sidebar-hover);
            border-left-color: var(--primary-color);
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            border-left-color: #fff;
        }

        .sidebar-brand {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            padding: 20px;
            color: white !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .sidebar-brand:hover {
            color: white !important;
            text-decoration: none;
        }

        /* Header Styles */
        .main-header {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e9ecef;
        }

        /* Card Styles */
        .dashboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            background: white;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 20px;
            position: relative;
        }

        .card-header-custom::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0.3) 100%);
        }

        /* Stats Cards */
        .stats-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, #20c997 100%);
        }

        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
        }

        .stats-icon.users {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        }

        .stats-icon.reports {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        }

        .stats-icon.fertilizer {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
        }

        .stats-icon.queries {
            background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
        }

        /* Button Styles */
        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            color: white;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #20c997 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        /* Table Styles */
        .table-custom {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .table-custom thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            color: white;
        }

        .table-custom tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
            transition: all 0.2s ease;
        }

        /* Chart Container */
        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, #20c997 100%);
            border-radius: 15px 15px 0 0;
        }

        /* Activity Feed */
        .activity-item {
            padding: 15px;
            border-left: 3px solid var(--primary-color);
            margin-bottom: 15px;
            background: white;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0 !important;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.5s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #20c997 0%, var(--primary-color) 100%);
        }
    </style>
</head>

<body>
    <div class="d-flex">
        @include('backend.includes.sidebar')

        <div class="flex-grow-1" id="main-content">
            @include('backend.includes.header')

            <main class="container-fluid py-4" style="margin-left: 250px;">
                @yield('content')
            </main>
        </div>
<<<<<<< Updated upstream

        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-md-none" style="z-index: 999; display: none;"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

=======
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active bg-gradient-dark text-white" href="{{ url('/dashboard') }}">
                        <i class="material-symbols-rounded opacity-5">Krishi AI</i>
                        <span class="nav-link-text ms-1"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">
                        <i class="material-symbols-rounded opacity-5">table_view</i>
                        <span class="nav-link-text ms-1">Tables</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('site.setting') }}">
                        <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                        <span class="nav-link-text ms-1">site settings</span>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/profile.html">
                        <i class="material-symbols-rounded opacity-5">person</i>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/sign-in.html">
                        <i class="material-symbols-rounded opacity-5">login</i>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/sign-up.html">
                        <i class="material-symbols-rounded opacity-5">assignment</i>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
           
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('backend.includes.navbar')
        <!-- End Navbar -->
        @yield('content')
    </main>
   <!-- setting remove -->
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/chartjs.min.js') }}"></script>
>>>>>>> Stashed changes
    <script>
        // Sidebar Toggle for Mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');

            sidebar.classList.toggle('show');

            if (sidebar.classList.contains('show')) {
                overlay.style.display = 'block';
                mainContent.style.marginLeft = '0';
            } else {
                overlay.style.display = 'none';
                if (window.innerWidth >= 768) {
                    mainContent.style.marginLeft = '250px';
                }
            }
        }

        // Close sidebar when clicking overlay
        document.getElementById('sidebar-overlay').addEventListener('click', toggleSidebar);

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');

            if (window.innerWidth >= 768) {
                sidebar.classList.remove('show');
                overlay.style.display = 'none';
                mainContent.style.marginLeft = '250px';
            } else {
                mainContent.style.marginLeft = '0';
            }
        });
    </script>
    <!-- Bootstrap JS & dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    @stack('scripts')
</body>

</html>