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
    
    <li class="nav-item" id="barcode">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarcode"
            aria-expanded="true" aria-controls="collapseBarcode">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Barcode</span>
        </a>
        <div id="collapseBarcode" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" id="list-barcode" href="buttons.html">List Barcode</a>
                <a class="collapse-item" id="generate-barcode" href="cards.html">Generate Barcode</a>
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