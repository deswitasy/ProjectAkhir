<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="user-panel mt-4 pb-2 mb-3 d-flex align-items-center">
                <div class="image">
                    <img class="img-profile rounded-circle " src="/images/logo.png" style="width: 40px">
                </div>
                </div>
                <div class="sidebar-brand-text mx-3">eSpp_PN</div>
            </a>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                <div class="image">
                    <img class="img-profile rounded-circle" src="/images/{{ auth()->user()->photo }}" style="width: 40px">
                </div>
             <div>         
                <a class="d-block text-light text-center">{{ auth()->user()->nama }}</a>
                <p class="m-0 text-light" style="font-size: 12px" ><i class="fas fa-circle text-success"></i></span> online </p>
            </div> 
            </div> 

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="/profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            @can('admin')
            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">master data</h6>
                        <a class="collapse-item" href="/petugas">Data Petugas</a>
                        <a class="collapse-item" href="/kelas">Data Kelas</a>
                        <a class="collapse-item" href="/spp">Data Spp</a>
                        <a class="collapse-item" href="/siswa">Data Siswa</a>
                        
                    </div>
                </div>
            </li>

            
            @endcan
             
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                pembayaran
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                <a class="nav-link" href="/pembayaran">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaksi Pembayaran</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Pembayaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

         
           

        </ul>