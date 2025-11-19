@extends('layouts.app')

@section('content')
    <section class="results-layout py-5" style="background-color: #e8e8e8;">
        <div class="container results-container">

            <!-- Left: Thank You Section (smaller) -->
            <div class="thank-you-wrapper">
                <h3 class="thank-you-header text-center fw-bold mb-4">Thank You!</h3>
                <div class="thank-you-page card-box">
                    <div id="lead-destination" class="mb-3 text-center fw-bold"
                        style="color: {{ $leadDestination === 'Already Submitted Previously' ? '#f59e0b' : '#10b981' }};">
                        {{ $leadDestination }}
                    </div>
                    @if($leadDestination === 'Already Submitted Previously')
                        <p class="text-muted text-center">This lead was submitted previously. You can still view available
                            warranty options below.</p>
                    @else
                        <p class="text-muted text-center">Here are the plans for your car:</p>
                    @endif

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
            </div>

            <!-- Right: Chaiz Results (bigger) -->
            <div class="chaiz-results-section">
                <h3 class="fw-bold mb-3 text-center" style="color: rgb(0, 0, 0);">Get Instant Options</h3>
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
            margin: 0 auto;
        }

        /* Thank You column (smaller) */
        .thank-you-wrapper {
            flex: 1;
            min-width: 280px;
            max-width: 400px;
        }

        /* Chaiz column (larger) */
        .chaiz-results-section {
            flex: 2;
            min-width: 400px;
        }

        /* Card style */
        .card-box {
            background: #fff;
            border: 2px solid #f7c948;
            padding: 40px 35px;
            border-radius: 20px;
            transition: box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Thank You header outside the card */
        .thank-you-header {
            color: rgb(0, 0, 0);
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* Mobile stacking */
        @media (max-width: 768px) {

            .thank-you-wrapper,
            .chaiz-results-section {
                flex: 1 1 100%;
                max-width: 100%;
                min-width: 100%;
            }
        }
    </style>

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
@endsection