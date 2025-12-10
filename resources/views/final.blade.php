@extends('layouts.app')

@section('content')
    <section class="results-layout py-5" style="background-color: #e8e8e8;">
        <div class="container results-container">

            <!-- Left: Thank You Section -->
            <div class="thank-you-wrapper">

                <h3 class="thank-you-header thank-you-desktop text-center fw-bold mb-3">Thank You!</h3>

                <div class="thank-you-page card-box">

                    <div class="mobile-accordion-header d-md-none" id="accordionTrigger">
                        <span>What Happens Next</span>
                        <span class="chevron" id="chevronIcon">+</span>
                    </div>


                    <div id="thankYouAccordion" class="accordion-content">

                        <div id="lead-destination" class="mb-3 text-center fw-bold" style="color: #1dd1a1;">
                            @if($leadDestination === 'Already Submitted Previously')
                                Oops! Seems you have submitted before. Don't worry you can still buy online at chaiz.com
                            @else
                                Your Details have been submitted to {{ $leadDestination }}
                            @endif
                        </div>

                        <div class="content-grid">

                            <div class="what-happens-next mb-4">
                                <h4 class="d-none d-md-block">What happens next?</h4>

                                <div class="steps-container">
                                    <div class="step-item">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <p>If there is a match between your specifications and our provider's criteria,
                                                you will receive a call from between 1-5 providers within the next working
                                                day.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="step-item">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <p>You will have a free phone consultation with the relevant provider(s) to
                                                discuss
                                                prices and ask any questions.</p>
                                        </div>
                                    </div>

                                    <div class="step-item">
                                        <div class="step-number">3</div>
                                        <div class="step-content">
                                            <p>See instant options available below.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="awareness-section">
                                <h5>Please be aware that you may not receive quotes if:</h5>

                                <div class="awareness-items">
                                    <div class="awareness-item">
                                        <div class="awareness-number">1</div>
                                        <p>Your specifications don't match the provider's criteria</p>
                                    </div>
                                    <div class="awareness-item">
                                        <div class="awareness-number">2</div>
                                        <p>There's an error in your contact details</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- Right: Chaiz Results (bigger) -->
            <div class="chaiz-results-section">
                <h3 class="fw-bold mb-3 text-center" style="color: rgb(0, 0, 0);">Here are plans for your car - Buy directly
                    online.</h3>
                <div id="search-results" class="chaiz-results"></div>
            </div>
        </div>
    </section>

    <script>
        window.carData = @json($carData);

        function loadChaizResults() {
            if (!window.carData || Object.keys(window.carData).length === 0) {
                console.log("No car data available");
                return;
            }

            const make = window.carData['sel-make']?.toLowerCase().replace(/\s+/g, '-') || 'default-make';
            const model = window.carData['sel-model']?.toLowerCase().replace(/\s+/g, '-') || 'default-model';
            const year = window.carData['sel-year'] || 2020;
            const state = window.carData['user-state']?.toUpperCase() || 'NJ';

            // Convert mileage range to numeric value
            const mileageMap = {
                'less-than-100k': 75000,
                '100k-140k': 120000,
                '140k-200k': 170000,
                'more-than-200k': 225000
            };

            const mileage = mileageMap[window.carData['car_mileage']] || 100000;

            console.log('Chaiz search data:', {
                make,
                model,
                year,
                state,
                mileage
            });

            window.chaizWarrantySearchConfig = {
                targetElementId: "search-results",
                searchData: {
                    make,
                    model,
                    year,
                    state,
                    mileage,
                    userId: "96d8841b-6ae6-4cb6-9b43-401662e25560"
                },
                callbacks: {
                    onRedirect: function (planData) {
                        window.dataLayer.push({
                            event: 'results_click_out',
                            warrantyName: planData.warrantyName,
                            providerName: planData.providerName
                        });
                    }
                }
            };

            if (!document.querySelector('script[src="https://warranty-search.chaiz.com/initialize.js"]')) {
                const script = document.createElement('script');
                script.src = 'https://warranty-search.chaiz.com/initialize.js';
                document.body.appendChild(script);
            }
        }

        document.addEventListener('DOMContentLoaded', loadChaizResults);
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const trigger = document.getElementById("accordionTrigger");
            const panel = document.getElementById("thankYouAccordion");
            const icon = document.getElementById("chevronIcon");

            if (trigger) {
                trigger.addEventListener("click", function () {
                    const isOpen = panel.style.height && panel.style.height !== "0px";

                    if (isOpen) {
                        panel.style.height = "0px";
                        icon.textContent = "+";
                    } else {
                        panel.style.height = panel.scrollHeight + "px";
                        icon.textContent = "–";
                    }
                });
            }
        });
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        document.addEventListener('DOMContentLoaded', function () {
            const destination = @json($leadDestination);

            if (destination) {
                window.dataLayer.push({
                    event: 'leadSubmission',
                    leadSubmission: 'leadSubmission',  // this matches your GTM filter
                    destination: destination
                });

                console.log('GTM Fired:', {
                    event: 'leadSubmission',
                    destination: destination
                });
            }
        });
    </script>

@endsection