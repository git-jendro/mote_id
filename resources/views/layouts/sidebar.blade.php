<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon px-4">
            <img src="{{ asset('img/logos/logo-long.png') }}" id="icon-t" class="img-fluid" alt="Mote Logo">
            <img src="{{ asset('img/logos/logo-icon.png') }}" id="icon" class="img-fluid" alt="Mote Logo" style="display : none;">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">Mote Indonesia</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" id="master">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
            aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-server"></i>
            <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" id="list-color" href="{{route('warna.index')}}">List Warna</a>
                <a class="collapse-item" id="list-size" href="{{route('ukuran.index')}}">List Ukuran</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item" id="product">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="true" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Produk</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" id="list-product" href="{{route('produk.index')}}">List Produk</a>
                <a class="collapse-item" id="add-product" href="{{route('produk.create')}}">Tambah Produk</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item" id="buyer">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuyer"
            aria-expanded="true" aria-controls="collapseBuyer">
            <i class="fas fa-fw fa-users"></i>
            <span>Pembeli</span>
        </a>
        <div id="collapseBuyer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" id="list-buyer" href="{{route('pembeli.index')}}">List Pembeli</a>
                <a class="collapse-item" id="add-buyer" href="{{route('pembeli.create')}}">Tambah Pembeli</a>
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