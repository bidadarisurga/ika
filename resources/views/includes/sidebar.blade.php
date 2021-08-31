 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('surat.index') }}">
        <div class="sidebar-brand-icon rotate-n-15 w-100 p-2">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <img src="{{ url('img/1.png') }}" class="img-fluid img-thumbnail rounded-circle w-100 p-1" alt=""> --}}
            <div class="sidebar-brand-text mx-3">Kominfo</div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - SKPA -->
    <li class="nav-item  {{ request()->is('/') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>DASHBOARD</span></a>
    </li>

    <!-- Nav Item - SKPA -->
    <li class="nav-item  {{ request()->is('surat') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('surat.index') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>SURAT</span></a>
    </li>


    @if (Auth::user()->role == 'admin')
        <li class="nav-item  {{ request()->is('/user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>USER</span></a>
        </li>
    @endif

    <li class="nav-item  {{ request()->is('user/'.Auth::user()->id) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.edit',Auth::user()->id) }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Setting</span>
        </a>
    </li>

    <li class="nav-item  {{ request()->is('surat.index') ? 'active' : '' }}">
     {{-- <h1 class="h3 mb-0 text-gray-800">DATA EMAIL</h1> --}}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link btn btn-facebook de">
                <span>Keluar</span></a>
            </button>
        </form>
    </li>

    {{-- <!-- Nav Item - SKPA -->
    <li class="nav-item {{ request()->is('spka') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('spka.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Data SKPA</span>
        </a>
    </li>
    <!-- Nav Item - Email -->
    <li class="nav-item {{ request()->is('data-email') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-email.index') }}">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Data Email</span>
        </a>
    </li>
    <!-- Nav Item - Email -->
    <li class="nav-item {{ request()->is('kontrol') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kontrol.index') }}">
            <i class="fas fa-fw fa-bug"></i>
            <span>Data Kontrol Masalah</span>
        </a>
    </li>

    <!-- Nav Item - user -->
    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('/user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span>
        </a>
    </li>

    @if (Auth::user()->level == 'user')
    <!-- Nav Item - ganti password -->
    <li class="nav-item {{ request()->is('user/change/'.Auth::user()->id) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.newPassword', Auth::user()->id) }}">
            <i class="fas fa-fw fa-sliders-h"></i>
            <span>Ganti Password</span>
        </a>
    </li>
    @endif --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
