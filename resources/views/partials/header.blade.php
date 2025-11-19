<header class="site-header bg-secondary shadow-sm">
    <div style="width: 95%;" class="mx-auto">
        <div class="d-flex justify-content-between align-items-center py-3">
            <div class="logo-wrap">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="logo-img" style="height: 49px;">
                </a>
            </div>

            <!-- Hamburger Icon (Visible on small screens) -->
            <button class="btn d-lg-none" id="menu-toggle" aria-label="Toggle menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<!-- Overlay -->
<div class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" id="overlay" style="z-index: 1040;">
</div>

<!-- Side Menu -->
<div class="side-menu position-fixed top-0 end-0 bg-white shadow p-4 h-100 d-flex flex-column" id="side-menu"
    style="width: 250px; z-index: 1050; transform: translateX(100%); transition: transform 0.3s ease-in-out;">
    <button class="btn-close ms-auto mb-4" id="close-btn" aria-label="Close"></button>
    <nav class="d-flex flex-column gap-3">
        <a href="#home" class="nav-link">Home</a>
        <a href="#faq" class="nav-link">FAQ</a>
        <a href="#blog" class="nav-link">Blog</a>
    </nav>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('side-menu');
        const closeBtn = document.getElementById('close-btn');
        const overlay = document.getElementById('overlay');

        function openMenu() {
            menu.style.transform = 'translateX(0)';
            overlay.classList.remove('d-none');
        }

        function closeMenu() {
            menu.style.transform = 'translateX(100%)';
            overlay.classList.add('d-none');
        }

        toggle.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);
    });
</script>