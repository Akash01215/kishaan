<!-- Sidebar -->
<div class="sidebar position-fixed" style="width: 250px; z-index: 1000;">
    <!-- Brand -->
    <div class="sidebar-brand text-center">
        <i class="fas fa-leaf me-2"></i>
        Krishi Shathi Admin
    </div>

    <!-- Navigation -->
    <nav class="mt-4">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('backend.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('frontend.index') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Back to home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="fas fa-users me-2"></i>
                    Users Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('disease-reports.index') }}">
                    <i class="fas fa-file-alt me-2"></i>
                    Disease Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('fertilizer.*') ? 'active' : '' }}" href="{{ route('fertilizer-suggestions.index') }}">
                    <i class="fas fa-seedling me-2"></i>
                    Fertilizer Usage
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('analytics.*') ? 'active' : '' }}" href="{{ route('crop-recommendations.index') }}">
                    <i class="fas fa-chart-bar me-2"></i>
                    Analytics
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('queries.*') ? 'active' : '' }}" href="">
                    <i class="fas fa-question-circle me-2"></i>
                    System Queries
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}" href="{{ route('site.setting') }}">
                    <i class="fas fa-cog me-2"></i>
                    Settings
                </a>
            </li>
        </ul>

        <!-- Logout Section -->
        <div class="mt-5 pt-4 border-top border-secondary">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>