<footer>
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <!-- Left Column: Disclaimer -->
            <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                <span class="disclaimer-trigger" id="disclaimerTrigger">
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
