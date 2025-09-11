@extends('layouts.app')

@section('content')
    @php
        $carData = session('carData', []);
    @endphp

    <section class="car-data-debug py-5">
        <div class="container">
            <h4 class="mb-3">Car Data Debug</h4>

            @if(!empty($carData))
                <ul class="list-group">
                    @foreach($carData as $key => $value)
                        <li class="list-group-item">
                            <strong>{{ $key }}:</strong> {{ $value }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-danger">No car data in session.</p>
            @endif
        </div>
    </section>

    <section class="thank-you-page py-5">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold">Thank You!</h2>
                <!-- Lead Destination -->
                <div id="lead-destination" class="mb-3 text-center fw-bold"></div>
                <p class="text-muted">Here are the plans for your car:</p>
            </div>

            <!-- What Happens Next & Awareness Section -->
            <div class="content-grid text-center mx-auto" style="max-width: 800px;">
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

            <!-- End What Happens Next & Awareness Section -->

            <!-- Chaiz Results Container -->
            <div id="search-results" class="chaiz-results mb-3 mt-3"></div>

        </div>
    </section>


    <script>
        window.carData = @json($carData);

        async function submitLeadAndLoadChaiz() {
            if (!window.carData || Object.keys(window.carData).length === 0) return;

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
                // Submit the lead
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

                // Fetch lead destination
                const destResp = await fetch('/get-lead-destination');
                const destData = await destResp.json();
                console.log('Lead destination:', destData.destination);

                const destEl = document.getElementById('lead-destination');
                if (destEl) {
                    destEl.textContent = "Lead submitted to: " + destData.destination;
                }

                // Now load Chaiz results
                loadChaizResults();

            } catch (err) {
                console.error('Error submitting lead:', err);
                loadChaizResults(); // Still load Chaiz even if lead submission fails
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