<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="/img/moen.png" width="60" class="" alt="Logo">
        </a>

        <!-- Hamburger menu (mobile toggle) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Main navbar content -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarMain">
            <!-- Center links -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fs-5 fw-bold">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item ps-5">
                    <a class="nav-link {{ Request::is('sale') ? 'active' : '' }}" href="/sale">Sale</a>
                </li>
                @auth
                <li class="nav-item ps-5">
                    <a class="nav-link {{ Request::is('purchases') ? 'active' : '' }}" href="/purchases">Purchases</a>
                </li>
                @endauth
                <li class="nav-item ps-5">
                    <a class="nav-link {{ Request::is('contactus') ? 'active' : '' }}" href="/contactus">Contact us</a>
                </li>
            </ul>

            <!-- Right-side user/cart actions -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 align-items-center">
                @auth
                    @if (Request::is('/') || Request::is('sale') || Request::is('detail-product'))
                        <!-- Cart button -->
                        <li class="nav-item me-2">
                            <button type="button" class="btn position-relative" data-bs-toggle="modal" data-bs-target="#cart">
                                <i class="fa-solid fa-cart-shopping fa-sm"></i>
                                <span class="position-absolute top-0 start-100 translate-middle text-danger"
                                    style="font-size: 12px; margin-top: 10px; font-weight: bold;">
                                    {{ $carts->count() }}
                                </span>
                            </button>
                        </li>
                    @endif

                    <!-- Dropdown for user -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">Profile</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
