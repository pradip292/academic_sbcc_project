<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/download.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* Page Loader Styles */
        /* Page Loader Styles */
        #page-loader {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            /* White background to make sure it's visible */
            z-index: 9999;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 6px solid #3498db;
            /* Blue border for the spinner */
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div id="page-loader">
        <div class="spinner"></div>
    </div>
    <!-- End Page Loader -->

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript/jQuery to hide the loader after the page has loaded -->
    <script>
        $(window).on('load', function() {
            // Hide the page loader when the page is fully loaded
            $('#page-loader').fadeOut('slow');
        });
    </script>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Dashboard</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="assets/img/download.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Sanjivani</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>SCOE</h6>
                            <span>Super Admin </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>



                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/home">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @can('view_roles_menu')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#role-submenu" data-bs-toggle="collapse" href="#">
                    <i class="ri-account-circle-fill"></i><span>Roles and Permission </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="role-submenu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    
                    <li>
                        <a href="/view-role">
                            <i class="bi bi-circle"></i><span>View Role</span>
                        </a>
                    </li>
                    @can('add_roles')
                    <li>
                        <a href="/add-role">
                            <i class="bi bi-circle"></i><span>Add Role</span>
                        </a>
                    </li>
                    @endcan
                    

                </ul>
            </li>
            @endcan
            @can('view_question')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#questions-nav" data-bs-toggle="collapse" href="#">
                        <i class="bx bxl-quora"></i><span>Questions</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="questions-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        @can('upload_question')
                        <li>
                            <a href="/add-question">
                                <i class="bi bi-circle"></i><span>Add Questions</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a href="/view-theory-question">
                                <i class="bi bi-circle"></i><span>View Question</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('view_students')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#stud" data-bs-toggle="collapse" href="#">
                        <i class="ri-account-circle-line"></i><span>Students</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="stud" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        @can('upload_students')
                            <li>
                                <a href="/add-students">
                                    <i class="bi bi-circle"></i><span>Add Students</span>
                                </a>
                            </li>
                        @endcan

                        <li>
                            <a href="/view-students">
                                <i class="bi bi-circle"></i><span>View Students</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan
                @can('upload_question')
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#department-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-building"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="department-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                            @can('upload_question')
                            <li>
                                <a href="/add-department">
                                    <i class="bi bi-circle"></i><span>Add Department</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="/view-department">
                                    <i class="bi bi-circle"></i><span>View Department</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('add_class')
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#class-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-book"></i><span>Division</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="class-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                            @can('edit_class')
                            <li>
                                <a href="/add-class">
                                    <i class="bi bi-circle"></i><span>Add Division</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="/view-class">
                                    <i class="bi bi-circle"></i><span>View Division</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
               
                @can('add_teachers')
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#teacher-nav" data-bs-toggle="collapse" href="#">
                            <i class="ri-account-circle-line"></i><span>Subjects</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="teacher-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                            @can('add_teachers')
                            <li>
                                <a href="/add-teacher">
                                    <i class="bi bi-circle"></i><span>Add Subject</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="/view-teacher">
                                    <i class="bi bi-circle"></i><span>View Subject</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
        
                @can('see_faculty')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#fac-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-account-circle-line"></i><span>Faculties</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="fac-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        @can('upload_faculty')
                            <li>
                                <a href="/add-faculty">
                                    <i class="bi bi-circle"></i><span>Upload Faculty</span>
                                </a>
                            </li>   
                        @endcan
                        @can('view_faculty')
                        <li>
                            <a href="/view-faculty">
                                <i class="bi bi-circle"></i><span>View Faculty</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan























        </ul>

    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            @yield('content')
        </section>
    </main><!-- End #main -->
    <footer id="footer" class="footer" >
        <div class="copyright">
            &copy; Copyright <strong><span>Sanjivani College of Engineering Kopargaon</span></strong>. All Rights
            Reserved
        </div>

    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
