<!-- Header -->
<header class="main-header sticky-top">
    <div class="container-fluid">
        <div class="row align-items-center py-3">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary d-md-none me-3" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4 class="mb-0 text-dark fw-bold">
                        <i class="fas fa-tachometer-alt text-success me-2"></i>
                        @yield('page-title', 'Dashboard Overview')
                    </h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-end">
                    <!-- Search -->
                    <div class="input-group me-3" style="max-width: 300px;">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search..." />
                    </div>

                    <!-- Notifications -->
                    <div class="dropdown me-3">
                        <button class="btn btn-outline-secondary position-relative" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            {{-- Instead of this (which throws error if no notifications table) --}}
                            {{-- {{ auth()->user()->unreadNotifications->count() ?? 3 }} --}}

                            {{-- Use this dummy count temporarily --}}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">New user registered</a></li>
                            <li><a class="dropdown-item" href="#">Disease report submitted</a></li>
                            <li><a class="dropdown-item" href="#">System update available</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                        </ul>
                    </div>

                    <!-- User Profile -->
                    <div class="dropdown">
                        <button class="btn btn-outline-success d-flex align-items-center" data-bs-toggle="dropdown">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-2"
                                style="width: 35px; height: 35px;">
                                <span class="text-white fw-bold">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'KA', 0, 2)) }}
                                </span>
                            </div>
                            <span class="d-none d-md-inline">{{ auth()->user()->name ?? 'Krishi Admin' }}</span>
                            <i class="fas fa-chevron-down ms-2"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a></li>
                            <li><a class="dropdown-item" href="">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>