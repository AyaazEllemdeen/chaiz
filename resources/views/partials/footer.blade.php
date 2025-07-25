<footer>
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <!-- Left Column: Disclaimer -->
            <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                <span class="disclaimer-trigger" data-bs-toggle="modal" data-bs-target="#disclaimerModal">
                    Disclaimer
                    <!-- Desktop hover popup -->
                    <div class="disclaimer-popup">
                        comparewarranties.org is operated by Chaiz, Inc. and serves as a free resource to help you find
                        Vehicle Service Contract providers ("Products").<br><br>
                        Unlike our main site at chaiz.com, we may receive advertising fees from some of the companies
                        featured here. These fees can influence the placement and order of Products shown. We also
                        include Products for which we do not receive compensation. This site does not include every
                        Product available on the market.<br><br>
                        When you click on links to Product providers, you consent to share your contact details (name,
                        address, email, and phone number) securely with those providers. This allows them to connect
                        with you about their services. In some cases, we receive a small referral fee for making this
                        introduction.<br><br>
                        comparewarranties.org is an advertising platform only and does not sell or offer the Products
                        listed. We do not control the Products or services offered by these providers. If you prefer,
                        you may purchase Product coverage directly through our main site, chaiz.com.<br><br>
                        Your use of this site is subject to the Terms of Use and Privacy Policy of Chaiz, Inc. as
                        outlined below.
                    </div>
                </span>
            </div>

            <!-- Right Column: Logo -->
            <div class="col-lg-6 text-center text-lg-end">
                <img src="{{ asset('img/logo.png') }}" alt="Compare Warranties Logo" style="height: 60px;">
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="row footer-bottom">
            <div class="col text-center">
                <p class="mb-0">&copy; 2025 Comparewarranties.org. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Modal -->
<div class="modal fade mobile-modal" id="disclaimerModal" tabindex="-1" aria-labelledby="disclaimerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disclaimerModalLabel">Disclaimer</h5>
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
<style>
    /* Footer Styles */
    footer {
        background: #000;
        color: #fff;
        padding: 2rem 0 1rem;
    }

    .disclaimer-trigger {
        position: relative;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        color: #ffffff;
        display: inline-block;
        transition: color 0.3s ease;
        /* Removed underline */
        text-decoration: none;
    }

    .disclaimer-trigger:hover {
        color: #cccccc;
        /* Optional: light gray on hover for visual feedback */
    }


    /* Desktop hover popup */
    .disclaimer-popup {
        position: absolute;
        bottom: 120%;
        left: 0;
        width: 400px;
        background: #1e1e1e;
        color: #fff;
        padding: 15px;
        border-radius: 8px;
        font-size: 14px;
        text-align: left;
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        pointer-events: none;
    }

    .disclaimer-trigger:hover .disclaimer-popup {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    /* Mobile modal styles */
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.8) !important;
    }

    .modal-content {
        background: #1e1e1e;
        color: #fff;
        border: none;
        border-radius: 12px;
        margin: 1rem;
    }

    .modal-header {
        border-bottom: 1px solid #333;
        padding: 1rem 1.5rem;
    }

    .modal-title {
        color: #fff;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .btn-close {
        filter: invert(1);
        opacity: 0.8;
    }

    .modal-body {
        padding: 1.5rem;
        font-size: 14px;
        line-height: 1.6;
    }

    .footer-bottom {
        border-top: 1px solid #333;
        padding-top: 1rem;
        margin-top: 2rem;
    }

    /* Media queries */
    @media (max-width: 768px) {
        .disclaimer-popup {
            display: none !important;
        }

        .disclaimer-trigger {
            font-size: 16px;
        }

        footer {
            padding: 1.5rem 0 1rem;
        }
    }

    @media (min-width: 769px) {
        .mobile-modal {
            display: none !important;
        }
    }
</style>