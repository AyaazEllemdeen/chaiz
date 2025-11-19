<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Left: Disclaimer -->
            <div class="footer-left">
                <span class="disclaimer-trigger" id="disclaimerTrigger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 6px; vertical-align: middle;">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    Disclaimer
                    <!-- Desktop hover popup -->
                    <div class="disclaimer-popup">
                        <h6 class="disclaimer-title">Important Information</h6>
                        <p><strong>comparewarranties.org</strong> is operated by Chaiz, Inc. and serves as a free resource
                        to help you find Vehicle Service Contract providers ("Products").</p>
                        
                        <p>Unlike our main site at chaiz.com, we may receive advertising fees from some of the companies
                        featured here. These fees can influence the placement and order of Products shown. We also
                        include Products for which we do not receive compensation. This site does not include every
                        Product available on the market.</p>
                        
                        <p>When you click on links to Product providers, you consent to share your contact details (name,
                        address, email, and phone number) securely with those providers. This allows them to connect
                        with you about their services. In some cases, we receive a small referral fee for making this
                        introduction.</p>
                        
                        <p><strong>comparewarranties.org</strong> is an advertising platform only and does not sell or
                        offer the Products listed. We do not control the Products or services offered by these providers. If you
                        prefer, you may purchase Product coverage directly through our main site, chaiz.com.</p>
                        
                        <p class="mb-0">Your use of this site is subject to the Terms of Use and Privacy Policy of Chaiz, Inc.
                        as outlined below.</p>
                    </div>
                </span>
            </div>

            <!-- Center: Quick Links -->
            {{-- <div class="footer-center">
                <div class="footer-links">
                    <a href="#" class="footer-link">Privacy Policy</a>
                    <span class="footer-separator">|</span>
                    <a href="#" class="footer-link">Terms of Use</a>
                    <span class="footer-separator">|</span>
                    <a href="#" class="footer-link">Contact Us</a>
                </div>
            </div> --}}

            <!-- Right: Logo -->
            <div class="footer-right">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Compare Warranties Logo" class="footer-logo">
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; 2025 Comparewarranties.org. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Mobile Modal -->
<div class="modal fade mobile-modal" id="disclaimerModal" tabindex="-1" aria-labelledby="disclaimerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disclaimerModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px; vertical-align: middle;">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    Disclaimer
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>comparewarranties.org</strong> is operated by Chaiz, Inc. and serves as a free resource to
                    help you find Vehicle Service Contract providers ("Products").</p>

                <p>Unlike our main site at chaiz.com, we may receive advertising fees from some of the companies
                    featured here. These fees can influence the placement and order of Products shown. We also include
                    Products for which we do not receive compensation. This site does not include every Product
                    available on the market.</p>

                <p>When you click on links to Product providers, you consent to share your contact details (name,
                    address, email, and phone number) securely with those providers. This allows them to connect with
                    you about their services. In some cases, we receive a small referral fee for making this
                    introduction.</p>

                <p><strong>comparewarranties.org</strong> is an advertising platform only and does not sell or offer the
                    Products listed. We do not control the Products or services offered by these providers. If you
                    prefer, you may purchase Product coverage directly through our main site, chaiz.com.</p>

                <p class="mb-0">Your use of this site is subject to the Terms of Use and Privacy Policy of Chaiz, Inc.
                    as outlined below.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const trigger = document.getElementById("disclaimerTrigger");

        if (window.innerWidth <= 768) {
            trigger.setAttribute("data-bs-toggle", "modal");
            trigger.setAttribute("data-bs-target", "#disclaimerModal");
        } else {
            trigger.removeAttribute("data-bs-toggle");
            trigger.removeAttribute("data-bs-target");
        }
    });
</script>