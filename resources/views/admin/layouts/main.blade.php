<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset("admin/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset("admin/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset("admin/js/sb-admin-2.min.js")}}"></script>

    <!-- Custom fonts for this template-->
    <link href="{{asset("admin/vendor/fontawesome-free/css/all.min.css")}}"  rel="stylesheet" type="text/css">

    <!-- Select 2 package-->
    <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">
    <script src="{{asset('select2/select2.min.js')}}"></script>



    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("admin/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">مرحباً بك </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard.index')}}">
                <i class="fas fa-fw fa-home "></i>
                <span >الواجهة الرئيسية</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            الرئيسية
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tv"></i>
                <span>الافلام</span>
            </a>
            <div id="collapseTwo" class="collapse @if(Route::is('dashboard.show.movie')||Route::is('dashboard.create')||Route::is('dashboard.trashed')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">:العناصر</h6>
                    <a class="collapse-item @if(Route::is('dashboard.create')) active @endif" href="{{route('dashboard.create')}}">أضافة فلم</a>
                    <a class="collapse-item @if(Route::is('dashboard.show.movie')) active @endif" href="{{route('dashboard.show.movie')}}">عرض جميع الافلام</a>
                    <a class="collapse-item @if(Route::is('dashboard.trashed')) active @endif" href="{{route('dashboard.trashed')}}">سلة المحذوفات</a>

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTvShow"
               aria-expanded="true" aria-controls="collapseTvShow">
                <i class="fas fa-fw fa-tv"></i>
                <span>المسلسلات</span>
            </a>
            <div id="collapseTvShow" class="collapse" aria-labelledby="headingTvShow"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">:العناصر</h6>
                    <a class="collapse-item" href="buttons.html">أضافة مسلسل</a>
                    <a class="collapse-item" href="cards.html">عرض جميع مسلسلات</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnime"
               aria-expanded="true" aria-controls="collapseAnime">
                <i class="fas fa-fw fa-tv"></i>
                <span>الانميات</span>
            </a>
            <div id="collapseAnime" class="collapse" aria-labelledby="headingAnime"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">:العناصر</h6>
                    <a class="collapse-item" href="buttons.html">أضافة انمي</a>
                    <a class="collapse-item" href="cards.html">عرض جميع الانميات</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            اخرى
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDrama" aria-expanded="true"
               aria-controls="collapseDrama">
                <i class="fas fa-fw fa-folder"></i>
                <span>مسرحيات</span>
            </a>

            <div id="collapseDrama" class="collapse" aria-labelledby="headingDrama"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">:العناصر</h6>
                    <a class="collapse-item" href="buttons.html">أضافة مسرحية</a>
                    <a class="collapse-item" href="cards.html">عرض جميع المسرحيات</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
               aria-expanded="true" aria-controls="collapseAdmin">
                <i class="fas fa-fw fa-user-secret"></i>
                <span>المشرف</span>
            </a>
            <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">:العناصر</h6>
                    <a class="collapse-item" href="buttons.html">أضافة مستخدم</a>
                    <a class="collapse-item" href="cards.html">عرض جميع المستخدمين</a>
                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <p></p>
                     <h1 class="h3 bg-dark rounded p-2 mx-auto text-white">@yield('pageName')</h1>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    @auth() <!-- to not showing profile image and navbar in error page -->
                        <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name ?? null}}</span>
                                    <img class="img-profile rounded-circle"
                                         src="{{asset("admin/img/undraw_profile.svg")}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        حسابي
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        أعدادات
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            تسجيل الخروج
                                        </button>
                                    </form>
                                </div>
                            </li>
                    @endauth
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</div>
</body>

</html>
