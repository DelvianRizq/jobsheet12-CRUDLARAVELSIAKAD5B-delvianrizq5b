<nav class="navbar navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none me-2" type="button" 
                    data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" 
                    aria-controls="sidebarMenu" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
                <i class="bi bi-mortarboard-fill me-1"></i>
                {{ config('app.name') }}
            </a>
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- Tombol Switcher Tema -->
            <button id="themeToggle" class="btn btn-outline-light btn-sm rounded-circle p-2 d-flex align-items-center justify-content-center" 
                    type="button" title="Ganti Tema" 
                    style="width: 38px; height: 38px;">
                <i id="themeIcon" class="bi bi-moon-fill fs-6"></i>
            </button>

            <!-- Dropdown Profil Administrator -->
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <span class="dropdown-item-text small">
                            {{ Auth::user()->email }}
                            <span class="badge text-bg-secondary ms-1">{{ Auth::user()->role }}</span>
                        </span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-1"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>