@include('layouts.head')

<body class="sidebar-mini">
    <!-- <div class="loader"></div> -->
    <!-- header start -->
    @include('layouts.header')
    <!-- header end -->
    <!-- Left sidebar menu start -->
    @include('layouts.sidebar')
    <!-- Left sidebar menu end -->
    <!--Main container start -->
    <main class="adminpopular-wrapper">
        <div class="container-fluid">
            <!-- breadcum -->
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Dashboard</h4>
                <ul class="db-breadcrumb-list">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>{{$page_name}}</li>
                </ul>
            </div> 
            <!-- End breadcum -->
            @yield('content')
            <footer class="text-end p-3">
                @ {{ now()->year }} Design & Developed by <a href="https://bhitsolution.com" target="new">BH IT SOLUTION</a>
            </footer>
        </div>
    </main>
    
    @include('layouts.footer')