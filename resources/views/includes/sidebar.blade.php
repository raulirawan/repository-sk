<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="{{ url('img/logo.png') }}" style="max-width: 166px"> --}}

        {{-- <span class="ml-3 brand-text font-weight-light">SISTEM REPOSITORY SK</span> --}}
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('img/jasamarga.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ Str::ucfirst(Auth::user()->name) }}</a> --}}
                <a href="#" class="d-block">Repositori SK</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->roles == 'ADMIN')
                    <li class="nav-item">
                        <a href="{{ route('jabatan.index') }}"
                            class="nav-link {{ request()->is('admin/jabatan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                Jabatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('unit.index') }}"
                            class="nav-link {{ request()->is('admin/unit*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                Unit
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('karyawan.index') }}"
                            class="nav-link {{ request()->is('admin/karyawan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('surat.keputusan.index') }}"
                            class="nav-link {{ request()->is('admin/pergerakan/surat-keputusan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Data SK
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->roles == 'ADMIN' || Auth::user()->roles == 'PIMPINAN')
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/arsip*') ? 'active' : '' }} {{ request()->is('admin/berkas*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Berkas
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            @if (Auth::user()->roles == 'PIMPINAN')
                                <li class="nav-item">
                                    <a href="{{ route('berkas.index') }}"
                                        class="nav-link {{ request()->is('admin/berkas*') ? 'active' : '' }}">
                                        <i class="far fa-file-alt nav-icon"></i>
                                        <p>Berkas SK</p>
                                    </a>
                                </li>
                            @else
                            @endif
                            <li class="nav-item ">
                                <a href="{{ route('arsip.index') }}"
                                    class="nav-link {{ request()->is('admin/arsip*') ? 'active' : '' }}">
                                    <i class="far fa-file-alt nav-icon"></i>
                                    <p>Arsip</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}"
                        class="nav-link {{ request()->is('admin/laporan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
