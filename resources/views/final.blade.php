@extends('layouts.app')

@section('content')
    @php
        $carData = session('carData', []);
    @endphp

    <section class="results-layout py-5" style="background-color: #FAF9F6;">
        <div class="container results-container">

            <!-- Left: Thank You Section (smaller) -->
            <div class="thank-you-page">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-3">Thank You!</h3>
                    <div id="lead-destination" class="mb-3 text-center fw-bold"></div>
                    <p class="text-muted">Here are the plans for your car:</p>
                </div>

                <!-- What Happens Next & Awareness Section -->
                <div class="content-grid">
                    <div class="what-happens-next mb-4">
                        <h4>What happens next?</h4>
                        <div class="steps-container">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <p>If there is a match between your specifications and our provider's criteria,
                                        you will receive a call from between 1-5 providers within the next working day.
                                    </p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <p>You will have a free phone consultation with the relevant provider(s) to discuss
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

            <!-- Right: Chaiz Results (bigger) -->
            <div class="chaiz-results-section">
                <h3 class="fw-bold mb-3 text-center">Get Instant Options</h3>
                <div id="search-results" class="chaiz-results"></div>
            </div>

        </div>
    </section>

    <style>
        /* Flex container */
        .results-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            align-items: flex-start;
            min-width: 93%;
            /* make wider than default bootstrap container */
            margin: 0 auto;
        }

        /* Thank You column (smaller) */
        .thank-you-page {
            flex: 1;
            min-width: 280px;
            max-width: 400px;
        }

        /* Chaiz column (larger) */
        .chaiz-results-section {
            flex: 2;
            min-width: 400px;
        }

        /* Mobile stacking */
        @media (max-width: 768px) {

            .thank-you-page,
            .chaiz-results-section {
                flex: 1 1 100%;
                max-width: 100%;
                min-width: 100%;
            }
        }
    </style>

    <script>
        window.carData = @json($carData);

        async function submitLeadAndLoadChaiz() {
            if (!window.carData || Object.keys(window.carData).length === 0) return;

            if (window.leadAlreadySubmitted) {
                console.log("Lead already submitted, skipping...");
                loadChaizResults();
                return;
            }

            const payload = {
                'sel-year': window.carData['sel-year'],
                'sel-make': window.carData['sel-make'],
                'sel-model': window.carData['sel-model'],
                'car_mileage': window.carData['car_mileage'],
                'user-state': window.carData['user-state'],
                'user-zip': window.carData['user-zip'],
                'email': window.carData['email'],
                'user-name': window.carData['user-name'],
                'user-number': window.carData['user-number']
            };

            try {
                const response = await fetch('{{ route('lead.submit') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();
                console.log('Lead submit response:', data);

                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    event: "leadSubmission",
                    destination: data.destination
                });

                const destEl = document.getElementById('lead-destination');
                if (destEl) {
                    destEl.textContent = "Lead submitted to: " + data.destination;
                }

                loadChaizResults();
            } catch (err) {
                console.error('Error submitting lead:', err);
                loadChaizResults();
            }
        }

        function loadChaizResults() {
            const make = window.carData['sel-make']?.toLowerCase().replace(/\s+/g, '-') || 'default-make';
            const model = window.carData['sel-model']?.toLowerCase().replace(/\s+/g, '-') || 'default-model';
            const year = window.carData['sel-year'] || 2020;
            const state = window.carData['user-state']?.toUpperCase() || 'NJ';
            let mileage = 30000;

            if (typeof window.carData['car_mileage'] === 'string') {
                const digits = window.carData['car_mileage'].replace(/\D/g, '');
                if (digits) mileage = parseInt(digits, 10);
            }

            window.chaizWarrantySearchConfig = {
                targetElementId: "search-results",
                searchData: {
                    make,
                    model,
                    year,
                    state,
                    mileage,
                    userId: "96d8841b-6ae6-4cb6-9b43-401662e25560"
                }
            };

            if (!document.querySelector('script[src="https://warranty-search.chaiz.com/initialize.js"]')) {
                const script = document.createElement('script');
                script.src = 'https://warranty-search.chaiz.com/initialize.js';
                document.body.appendChild(script);
            }
        }

        document.addEventListener('DOMContentLoaded', submitLeadAndLoadChaiz);
    </script>
@endsection