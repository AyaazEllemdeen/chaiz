@extends('layouts.app')

@section('content')

    <section id="hero-section" class="position-relative" style="height: auto;">
        <img src="{{ asset('img/banner4.webp') }}" alt="Banner" class="object-fit-cover banner-img"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">

        <div class="hero-text-overlay py-5">
            <div class="container text-white">
                <p class="quiz-heading">Compare Car Warranties With Confidence</p>
                <p class="quiz-subtext">Take a short quiz to find the best extended auto warranty for your vehicle</p>

                <!-- Quiz starts directly below text -->
                <div class="quiz-content-box mt-4">
                    <form id="quiz-start-form">

                        <h3 class="start-question">What is the year, make & model of your vehicle?</h3>
                        <div id="first-question">

                            <select id="sel_year" name="sel-year" class="modal-dropdown1">
                                <option value="">Select Year</option>
                            </select>

                            <select id="sel_make" name="sel-make" class="modal-dropdown1">
                                <option value="">Select Make</option>
                            </select>

                            <select id="sel_model" name="sel-model" class="modal-dropdown1">
                                <option value="">Select Model</option>
                            </select>
                        </div>

                        <input type="hidden" id="car-make" name="car-make" value="">

                        <div class="quiz-intro-actions d-flex align-items-center gap-3 mb-4">
                            <button type="button" class="begin-btn get-quote-btn">Begin</button>
                            <p class="quiz-disclaimer-text mb-0 d-flex align-items-center">
                                <span class="quiz-icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none"
                                        viewBox="0 0 25 24">
                                        <path
                                            d="M11.45 16.55L17.1 10.9 15.675 9.475 11.45 13.7 9.325 11.575 7.9 13l3.55 3.55ZM12.5 22a9.5 9.5 0 1 1 0-19 9.5 9.5 0 0 1 0 19ZM6.1 2.35 7.5 3.75 3.25 8 1.85 6.6 6.1 2.35ZM18.9 2.35 23.15 6.6 21.75 8 17.5 3.75 18.9 2.35Z"
                                            fill="#1C1B1F" />
                                    </svg>
                                </span>
                                It only takes a minute!
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- quiz modal start -->
    <div id="car-quiz" class="car-quiz-modal">
        <button class="car-quiz-close" onclick="closeModalskip()">×</button>
        <div class="car-quiz-split">
            <div class="car-quiz-left">
                <div class="quiz-container">
                    <div id="quiz-left-logo">
                        <img src="{{ asset('img/logo.png') }}" alt="Company Logo" />
                    </div>
                    <div class="car-quiz-body">
                        <h4 id="quiz-section-heading" class="quiz-section-heading">Vehicle Details</h4>
                        <div class="quiz-progress-container">
                            <div class="quiz-progress-bar" id="quiz-progress-bar">
                                <span id="quiz-progress-text">10%</span>
                            </div>
                        </div>
                        <!-- Step 1: Year, Make, Model -->
                        {{-- <div id="quiz-step1">
                            <h3 class="modal-question">What is the year, make & model of your vehicle?</h3>
                            <select id="sel_year" name="sel-year" class="modal-dropdown1">
                                <option value="">Select Year</option>
                            </select>
                            <select id="sel_make" name="sel-make" class="modal-dropdown1">
                                <option value="">Select Make</option>
                            </select>
                            <select id="sel_model" name="sel-model" class="modal-dropdown1">
                                <option value="">Select Model</option>
                            </select>
                            <div class="step-buttons">
                                <button id="to-step2" class="to-step-btn">Continue</button>
                            </div>
                        </div> --}}

                        <!-- Step 2: Mileage -->
                        <div id="quiz-step1">
                            <h3 class="modal-question">Roughly, how many miles are on the vehicle?</h3>
                            <div class="options-grid1">
                                <button type="button" class="mile-opt1" data-value="<100000">Less than 100k</button>
                                <button type="button" class="mile-opt1" data-value="130000">100-140k</button>
                                <button type="button" class="mile-opt1" data-value="180000">140-200k</button>
                                <button type="button" class="mile-opt1" data-value=">200000">More than 200k</button>
                            </div>
                            <div class="step-buttons">
                                <button id="to-step2" class="to-step-btn">Continue</button>
                            </div>
                            <input type="hidden" name="car_mileage" id="input-mileage" value="">
                        </div>

                        {{-- <div id="quiz-step3" class="d-none">
                            <h3 class="modal-question">How soon do you want your new auto warranty?</h3>
                            <div class="options-grid1">
                                <button type="button" class="warranty-urgency-opt1" data-value="As soon as possible">As soon
                                    as
                                    possible</button>
                                <button type="button" class="warranty-urgency-opt1" data-value="1-2 weeks">1-2
                                    weeks</button>
                                <button type="button" class="warranty-urgency-opt1" data-value="3-4 weeks">3-4
                                    weeks</button>
                                <button type="button" class="warranty-urgency-opt1" data-value="4+ weeks">4+ weeks</button>
                                <button type="button" class="warranty-urgency-opt1" data-value="Unsure">Unsure</button>
                            </div>
                            <div class="step-buttons">
                                <button id="back-to-step2" class="to-step-btn">Back</button>
                                <button id="to-step4" class="to-step-btn">Continue</button>
                            </div>
                            <input type="hidden" name="warranty" id="warranty" value="">
                        </div> --}}

                        <div id="quiz-step2" class="d-none">
                            <h3 class="modal-question">What state would you like coverage in?</h3>
                            <select id="user-state" name="user-state" class="modal-dropdown1" required>
                                <option value="">Select your state</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            <div class="step-buttons">
                                <button id="back-to-step1" class="to-step-btn">Back</button>
                                <button id="to-step3" class="to-step-btn">Continue</button>
                            </div>
                        </div>

                        <div id="quiz-loading" class="d-none">
                            <div class="loading-container">
                                <div class="spinner"></div>
                                <p>Gathering details...</p>
                            </div>
                        </div>

                        <div id="quiz-step3" class="d-none">
                            <h3 class="modal-question">Your Contact Details</h3>

                            <p class="zip-helper-text">
                                Please fill in your details below so we can provide accurate quotes for your vehicle.
                            </p>

                            <!-- ZIP Code -->
                            <label for="user-zip" class="detail-label">ZIP Code</label>
                            <input type="text" name="user-zip" id="user-zip" class="modal-dropdown1"
                                placeholder="Enter your ZIP code" maxlength="5" pattern="\d{5}" inputmode="numeric"
                                required />

                            <!-- Email -->
                            <label for="user-email" class="detail-label">Email Address</label>
                            <input type="email" name="email" id="user-email" class="modal-dropdown1"
                                placeholder="Enter your Email" required />

                            <!-- Full Name -->
                            <label for="user-name" class="detail-label">Full Name</label>
                            <input type="text" name="user-name" id="user-name" class="modal-dropdown1"
                                placeholder="Enter your name" required />

                            <!-- Phone Number -->
                            <label for="user-number" class="detail-label">Phone Number</label>
                            <input type="text" name="user-number" id="user-number" class="modal-dropdown1"
                                placeholder="Enter your number" required />

                            <div class="step-buttons-wrapper">
                                <div class="step-buttons">
                                    <button id="back-to-step2" class="to-step-btn">Back</button>
                                    <button id="to-card" class="to-step-btn">Submit</button>
                                </div>

                                <div class="skip-section">
                                    <p class="skip-message">Don’t want to give us your details?</p>
                                    <button type="button" class="to-skip-btn" onclick="skipMyDetails()">Instant
                                        Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-none modal-right-section">
                <div class="content-wrapper">
                    <div class="success-header">
                        <h2>Your Lead Has Been Submitted Successfully!</h2>
                    </div>
                    <div class="lead-destination-card">
                        <p class="lead-destination-info">
                            <strong>Submitted to:</strong> <span class="destination-name">Processing...</span>
                        </p>
                    </div>
                    <div class="content-grid">
                        <div class="what-happens-next">
                            <h4>What happens next?</h4>
                            <div class="steps-container">
                                <div class="step-item">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <p>If there is a match between your specifications and our provider's criteria, you
                                            will receive a call from between 1-5 providers within the next working day.</p>
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
                    <button class="btn-continue" onclick="closeModalskip()">Continue</button>
                </div>
            </div>

            <div class="car-quiz-right">
                <div id="quiz-right-div">

                    <h2 id="quiz-title">Best Extended Auto Warranty in </h2>



                    <p>Continue our short quiz to get matched to an auto warranty provider suited to you.</p>
                </div>
                <div id="chaiz-inline-container" class="d-none">
                    <h3>Plans for your car</h3>
                    <p>Buy coverage from leading providers, right here, right now.</p>

                    <div id="chaiz-loading-inline" style="text-align: center; padding: 20px;">
                        <p>Loading plans...</p>
                        <div class="spinner"
                            style="margin: auto; width: 40px; height: 40px; border: 4px solid #ccc; border-top: 4px solid #333; border-radius: 50%; animation: spin 1s linear infinite;">
                        </div>
                    </div>

                    <div id="search-results-skip">
                        <!-- Chaiz results will be injected here -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const progressBar = document.getElementById('quiz-progress-bar');
        const progressText = document.getElementById('quiz-progress-text');
        const sectionHeading = document.getElementById('quiz-section-heading');

        const stepProgress = {
            'to-step2': 30,
            'to-step3': 50,
            'to-step4': 70,
            'to-step5': 80,
            'to-step6': 60,
            'to-step7': 75,
            'to-step8': 90
        };

        const headingMap = {
            'to-step2': 'Vehicle Details',
            'to-step3': 'Vehicle Details',
            'to-step4': 'Vehicle Details',
            'to-step5': 'Your Details',
            'to-step6': 'Your Details',
            'to-step7': 'Your Details',
            'to-step8': 'Your Details'
        };

        document.querySelectorAll('.to-step-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const progress = stepProgress[this.id];
                const heading = headingMap[this.id];

                if (progress !== undefined) {
                    progressBar.style.width = `${progress}%`;
                    progressText.textContent = `${progress}%`;
                }

                if (heading) {
                    sectionHeading.textContent = heading;
                }
            });
        });
    </script>

    <script>
        function closeModalskip() {
            const quizModal = document.getElementById('car-quiz');
            if (quizModal) {
                quizModal.classList.remove('show');
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            function skipMyDetails() {
                console.log('Skip button clicked');
                window.chaizSkipPressed = true;

                const make = window.carData?.make?.toLowerCase().replace(/\s+/g, '-') || 'default-make';
                const model = window.carData?.model?.toLowerCase().replace(/\s+/g, '-') || 'default-model';
                const year = window.carData?.year ? parseInt(window.carData.year, 10) : 2020;
                const state = window.carData?.state?.toUpperCase() || 'NJ';

                let mileage = 30000;
                if (typeof window.carData?.mileage === 'string') {
                    const digits = window.carData.mileage.replace(/\D/g, '');
                    if (digits) {
                        mileage = parseInt(digits, 10);
                    }
                }

                window.chaizWarrantySearchConfig = {
                    targetElementId: "search-results-skip",
                    searchData: {
                        make,
                        model,
                        year,
                        state,
                        mileage,
                        userId: "96d8841b-6ae6-4cb6-9b43-401662e25560"
                    }
                };

                const quizModal = document.getElementById('car-quiz');
                const loadingSpinner = document.getElementById('chaiz-loading');
                const loadingInline = document.getElementById('chaiz-loading-inline');
                const resultContainer = document.getElementById('search-results-skip');

                const rightPane = document.querySelector('.car-quiz-right');
                const chaizContainer = document.getElementById('chaiz-inline-container');
                const quizRightDiv = document.getElementById('quiz-right-div');

                if (rightPane && chaizContainer && quizRightDiv) {
                    rightPane.classList.remove('d-none');
                    chaizContainer.classList.remove('d-none');
                    quizRightDiv.classList.add('d-none');
                    rightPane.scrollIntoView({ behavior: 'smooth' });
                }

                if (loadingSpinner) loadingSpinner.style.display = 'block';
                if (loadingInline) loadingInline.style.display = 'block';
                if (resultContainer) resultContainer.innerHTML = '';

                function startPollingForResults() {
                    const spinDuration = 4000;

                    if (loadingSpinner) loadingSpinner.style.display = 'block';
                    if (loadingInline) loadingInline.style.display = 'block';

                    setTimeout(() => {
                        if (loadingSpinner) loadingSpinner.style.display = 'none';
                        if (loadingInline) loadingInline.style.display = 'none';
                    }, spinDuration);
                }

                const existingScript = document.querySelector('script[src="https://warranty-search.chaiz.com/initialize.js"]');
                if (!existingScript) {
                    const script = document.createElement('script');
                    script.src = 'https://warranty-search.chaiz.com/initialize.js';
                    script.onload = () => {
                        startPollingForResults();
                    };
                    document.body.appendChild(script);
                } else {
                    startPollingForResults();
                }
            }

            function submitFormData() {
                const finalButton = document.getElementById("to-card") || document.getElementById("to-final");
                const originalText = finalButton.textContent;
                finalButton.disabled = true;
                finalButton.textContent = 'Submitting...';

                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                    document.querySelector('input[name="_token"]')?.value;

                console.log('CSRF Token:', csrfToken);
                console.log('Car Data:', window.carData);

                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('sel-year', window.carData.year);
                formData.append('sel-make', window.carData.make);
                formData.append('sel-model', window.carData.model);
                formData.append('car_mileage', window.carData.mileage);
                formData.append('user-state', window.carData.state);
                formData.append('user-zip', window.carData.zip);
                formData.append('email', window.carData.email);
                formData.append('user-name', window.carData.name);
                formData.append('user-number', window.carData.phone);

                console.log('Form data being sent:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                const requiredFields = ['year', 'make', 'model', 'mileage', 'state', 'zip', 'email', 'name', 'phone'];
                const missingFields = requiredFields.filter(field => !window.carData[field]);

                if (missingFields.length > 0) {
                    alert('Missing required fields: ' + missingFields.join(', '));
                    finalButton.disabled = false;
                    finalButton.textContent = originalText;
                    return;
                }

                // Send to both endpoints
                const endpoints = ['/lead-submit-db', '/store-car-data'];

                Promise.all(endpoints.map(url =>
                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' },
                        credentials: 'same-origin'  // ← This is the key
                    })
                        .then(response => {
                            console.log(`Response from ${url}:`, response.status);
                            const contentType = response.headers.get('content-type');

                            if (response.status === 422) {
                                return response.json().then(data => { throw { status: 422, data, url }; });
                            }

                            if (!response.ok) {
                                return response.text().then(text => { throw new Error(`HTTP ${response.status}: ${text}`); });
                            }

                            if (contentType && contentType.includes('application/json')) {
                                return response.json();
                            } else {
                                return { success: true, redirect: response.url };
                            }
                        })
                ))
                    .then(results => {
                        console.log('Both submissions succeeded:', results);

                        const leadDestination = results[0].destination || 'Unknown';

                        // Redirect WITH destination in query params
                        const redirectUrl = "{{ route('final.page') }}";
                        window.location.href = redirectUrl;

                        if (window.dataLayer) {
                            window.dataLayer.push({
                                event: 'leadSubmission',
                                leadDestination
                            });
                        }
                    })

                    .catch(error => {
                        console.error('Submission error:', error);

                        if (error.status === 422 && error.data && error.data.errors) {
                            let errorMessage = `Validation error on ${error.url}:\n`;
                            Object.keys(error.data.errors).forEach(key => {
                                errorMessage += `- ${error.data.errors[key][0]}\n`;
                            });
                            alert(errorMessage);
                        } else if (error.message) {
                            alert('Error: ' + error.message);
                        } else {
                            alert('Error: Failed to submit your information. Check console for details.');
                        }
                    })
                    .finally(() => {
                        finalButton.disabled = false;
                        finalButton.textContent = originalText;
                    });
            }
            // Make functions available globally
            window.skipMyDetails = skipMyDetails;
            // Rest of your event listeners and initialization code...
            const skipButton = document.querySelector('button[onclick="skipMyDetails()"]');
            if (skipButton) {
                skipButton.removeAttribute('onclick');
                skipButton.addEventListener('click', skipMyDetails);
            }

            //populate the dropdowns
            const yearSelect = document.getElementById("sel_year");
            const makeSelect = document.getElementById("sel_make");
            const modelSelect = document.getElementById("sel_model");
            const beginBtn = document.querySelector(".begin-btn");

            // Populate years
            const currentYear = new Date().getFullYear();
            for (let y = currentYear; y >= 2005; y--) {
                const opt = document.createElement("option");
                opt.value = y;
                opt.textContent = y;
                yearSelect.appendChild(opt);
            }

            // Build makes/models map
            const vehicles = [
                "ACURA 2.3CL",
                "VOLVO XC90",
            ];

            const makesModelsMap = {};
            vehicles.forEach(vehicle => {
                const [make, ...modelParts] = vehicle.split(" ");
                const model = modelParts.join(" ");
                if (!makesModelsMap[make]) makesModelsMap[make] = [];
                if (!makesModelsMap[make].includes(model)) {
                    makesModelsMap[make].push(model);
                }
            });

            // Populate makes
            makeSelect.innerHTML = `<option value="">Select Make</option>`;
            Object.keys(makesModelsMap).forEach(make => {
                const opt = document.createElement("option");
                opt.value = make;
                opt.textContent = make;
                makeSelect.appendChild(opt);
            });

            // Update models when make changes
            makeSelect.addEventListener("change", () => {
                const selectedMake = makeSelect.value;
                modelSelect.innerHTML = `<option value="">Select Model</option>`;
                if (makesModelsMap[selectedMake]) {
                    makesModelsMap[selectedMake].forEach(model => {
                        const opt = document.createElement("option");
                        opt.value = model;
                        opt.textContent = model;
                        modelSelect.appendChild(opt);
                    });
                }
            });

            function openModal() {
                const quizModal = document.getElementById('car-quiz');
                if (quizModal) {
                    quizModal.classList.add('show');
                }
            }

            document.querySelectorAll('.match-cta-button').forEach(btn => {
                btn.addEventListener('click', (event) => {
                    const year = yearSelect.value;
                    const make = makeSelect.value;
                    const model = modelSelect.value;

                    if (!year || !make || !model) {
                        alert("Please select year, make & model before continuing.");

                        // Scroll to top after alert
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        return; // stop if dropdowns not filled
                    }

                    // Store globally
                    window.carData = { year, make, model };
                    document.getElementById("car-make").value = `${year} ${make} ${model}`;

                    // Open modal
                    openModal();
                });
            });

            // Handle Begin button
            beginBtn.addEventListener("click", (e) => {
                e.preventDefault();

                const year = yearSelect.value;
                const make = makeSelect.value;
                const model = modelSelect.value;

                if (!year || !make || !model) {
                    alert("Please select year, make & model before continuing.");
                    return;
                }

                // Store values globally or in hidden input
                window.carData = { year, make, model };
                document.getElementById("car-make").value = `${year} ${make} ${model}`;

                // Open quiz modal (your existing function)
                openModal();

                // Change button text to Continue
                beginBtn.textContent = "Continue";
            });

            // Mileage options
            const mileOptions = document.querySelectorAll('.mile-opt1');
            const continueMileageBtn = document.getElementById('to-step2');

            mileOptions.forEach(button => {
                button.addEventListener('click', () => {
                    // Highlight selected
                    mileOptions.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');

                    // Store selected value
                    window.carData = window.carData || {};
                    window.carData.mileage = button.dataset.value;
                    document.getElementById('input-mileage').value = button.dataset.value;

                    // Small delay so user sees highlight
                    setTimeout(() => {
                        // Move to next step
                        document.getElementById('quiz-step1').classList.add('d-none');
                        document.getElementById('quiz-step2').classList.remove('d-none');

                        // Simulate pressing the Continue button
                        if (continueMileageBtn) {
                            continueMileageBtn.click();
                        }
                    }, 400);
                });
            });

            // Continue button for mileage
            continueMileageBtn.addEventListener('click', (e) => {
                const selectedOption = document.querySelector('.mile-opt1.selected');

                if (!selectedOption) {
                    e.preventDefault();
                    alert("Please select an option before continuing.");
                    return;
                }

                // Store value again
                window.carData = window.carData || {};
                window.carData.mileage = selectedOption.dataset.value;
                document.getElementById('input-mileage').value = selectedOption.dataset.value;

                // Move to next step immediately
                document.getElementById('quiz-step1').classList.add('d-none');
                document.getElementById('quiz-step2').classList.remove('d-none');
            });


            document.getElementById("to-step3").addEventListener("click", function (e) {
                e.preventDefault();
                const state = document.getElementById("user-state").value.trim();

                if (!state) {
                    alert("Please select your state.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.state = state;

                document.getElementById("quiz-step2").classList.add("d-none");
                document.getElementById("quiz-loading").classList.remove("d-none");

                setTimeout(() => {
                    document.getElementById("quiz-loading").classList.add("d-none");
                    document.getElementById("quiz-step3").classList.remove("d-none");
                }, 2700);
            });

            // Go Back to Step 1
            document.getElementById("back-to-step1").addEventListener("click", function (e) {
                e.preventDefault();
                document.getElementById("quiz-step2").classList.add("d-none");
                document.getElementById("quiz-step1").classList.remove("d-none");
            });

            // Final Submit Button
            const finalButton = document.getElementById("to-card") || document.getElementById("to-final");
            if (finalButton) {
                finalButton.addEventListener("click", function (e) {
                    e.preventDefault();

                    const zip = document.getElementById("user-zip").value.trim();
                    const email = document.getElementById("user-email").value.trim();
                    const name = document.getElementById("user-name").value.trim();
                    const phone = document.getElementById("user-number").value.trim();

                    // ZIP Validation
                    if (!/^\d{5}$/.test(zip)) {
                        alert("Please enter a valid 5-digit ZIP code.");
                        return;
                    }

                    // Email Validation
                    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        alert("Please enter a valid email address.");
                        return;
                    }

                    // Name Validation
                    if (!name || !/^[a-zA-Z]+(?: [a-zA-Z]+)+$/.test(name)) {
                        alert("Please enter your full name (first and last).");
                        return;
                    }

                    // Phone Validation (Allow formats like 1234567890 or (123) 456-7890)
                    const cleanPhone = phone.replace(/\D/g, '');
                    if (!/^\d{10}$/.test(cleanPhone)) {
                        alert("Please enter a valid 10-digit phone number.");
                        return;
                    }

                    // Save Data
                    window.carData = window.carData || {};
                    window.carData.zip = zip;
                    window.carData.email = email;
                    window.carData.name = name;
                    window.carData.phone = cleanPhone;

                    // Submit form data
                    submitFormData();
                });
            }
            document.getElementById("back-to-step2").addEventListener("click", function (e) {
                e.preventDefault();
                document.getElementById("quiz-step3").classList.add("d-none");
                document.getElementById("quiz-step2").classList.remove("d-none");
            });

        });
    </script>
    <!-- quiz modal end -->

    <section id="card-section">
        <div class="container">
            <h4 class="mt-5 mb-3" style="font-weight: 700;">Our providers</h4>

            <div class="mb-4">
                <div class="cards-container mb-4">
                    <!-- endurance card -->
                    <div class="service-card">
                        <div class="top-rated-ribbon">TOP RATED</div>
                        <div class="card-header mb-3">
                            <div class="logo-section2">
                                <div class="logo2">
                                    <a href="https://endurancewarranty.com/lp/czcw" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="/img/1.png" alt="Chaiz Logo">
                                    </a>
                                </div>
                                <div class="promo-badge2">
                                    $300 off any new plan!
                                </div>
                                <div class="rating-section2">
                                    <div class="rating-score2">9.9</div>
                                    <div class="stars">★★★★★</div>
                                </div>
                                <div class="cta-section2">
                                    <a href="https://endurancewarranty.com/lp/czcw" class="get-quote-btn2" target="_blank"
                                        rel="noopener noreferrer">Get a Quote</a>
                                    <a href="tel:8005980082">
                                        <button class="phone-btn2">800-598-0082</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="divider-line"></div>
                        <div class="card-body-row2">
                            <div class="description2">
                                Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back
                                guarantee
                                for
                                peace of mind. Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance,
                                Complete
                                Tire
                                Coverage, Key Replacement, and more!
                            </div>

                            <div class="features-grid">
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Covers cars up to 20 years old/200K miles</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>1 year of FREE Elite Benefits</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Flexible down payment to fit your budget</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>6 coverage plans to choose from</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>No obligation fast quote</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>30 Day money back guarantee</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span> Quick and easy claims process</span>
                                </div>
                            </div>
                        </div>
                        <button class="more-btn">+ More</button>
                    </div>

                    <!-- american dream card -->
                    <div class="service-card">
                        <div class="top-rated-ribbon">3 MONTHS FREE </div>
                        <div class="card-header mb-3">
                            <div class="logo-section2">
                                <div class="logo2">
                                    <a href="https://www.americandreamautoprotect.com/u7izFNKM9E" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="/img/american-dream.png" alt="">
                                    </a>
                                </div>
                                <div class="promo-badge2">
                                    $350 off
                                </div>
                                <div class="rating-section2">
                                    <div class="rating-score2">9.2</div>
                                    <div class="stars">★★★★★</div>
                                </div>
                                <div class="cta-section2">
                                    <a href="https://www.americandreamautoprotect.com/u7izFNKM9E" class="get-quote-btn2"
                                        target="_blank" rel="noopener noreferrer">Get a Quote</a>
                                    <a href="tel:8333640947">
                                        <button class="phone-btn2">833-364-0947</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="divider-line"></div>
                        <div class="card-body-row2">
                            <div class="description2">
                                American Dream Auto Protect provides peace of mind by mitigating the high costs that come
                                with
                                unexpected repairs. Their stress-free claims process means you get approved in as little as
                                48
                                hours.
                            </div>

                            <div class="features-grid">
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Choose your own repair facility</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Customize your coverage plan</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>OFFER: $350 off + 3 months free!</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Flexible payment plan options</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>24/7 Roadside Assistance</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>30 Day money back guarantee</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Covers cars up to 20 years old / 200K miles</span>
                                </div>
                            </div>
                        </div>
                        <button class="more-btn">+ More</button>
                    </div>

                    <!-- chaiz card -->
                    <div class="service-card">
                        <div class="top-rated-ribbon">BUY NOW</div>
                        <div class="card-header mb-3">
                            <div class="logo-section2">
                                <div class="logo2">
                                    <a href="https://www.chaiz.com/?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="/img/chaiz.png" alt="Chaiz Logo">
                                    </a>
                                </div>
                                <div class="promo-badge2">
                                    Buy directly online — No Email or Phone needed
                                </div>
                                <div class="rating-section2">
                                    <div class="rating-score2">9.9</div>
                                    <div class="stars">★★★★★</div>
                                </div>
                                <div class="cta-section2">
                                    <a href="https://www.chaiz.com/?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                        class="get-quote-btn2" target="_blank" rel="noopener noreferrer">Buy Now</a>
                                    <a href="tel:8339429249">
                                        <button class="phone-btn2">833-942-9249</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="divider-line"></div>
                        <div class="card-body-row2">
                            <div class="description2">
                                Chaiz shows you several plans from multiple providers within 30 seconds.
                                Compare and buy breakdown protection from top providers today.
                            </div>

                            <div class="features-grid">
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Best price guaranteed</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>No email or phone needed</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Independent and unbiased</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Hundreds of 5* reviews</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>30-day money back guarantee</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>A+ customer service</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Purchase completely online 24/7</span>
                                </div>
                                <div class="feature2">
                                    <span class="checkmark">✓</span>
                                    <span>Compare live quotes within less than a minute</span>
                                </div>
                            </div>
                        </div>

                        <button class="more-btn">+ More</button>
                    </div>
                </div>
                <!-- omega card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/omega.png" alt="">
                            </div>
                            <div class="promo-badge"></div>
                            <div class="rating-section">
                                <div class="rating-score">8.2</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://www.chaiz.com/p/omega?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                    class="get-quote-btn" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Once you sign your Omega Auto Care vehicle service contract, you gain access to several member
                            benefits. And these are more than just simple perks, with benefits that will give you the peace
                            of mind and customer service you deserve.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Comprehensive coverage</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Peace of mind with great customer service</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Roadside assistance</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible plans tailored to different needs</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Nationwide network of authorized repair facilities</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Road Hazard Coverage</span>
                            </div>
                        </div>
                    </div>
                    <button class="more-btn">+ More</button>
                </div>

                <!-- naac card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/naac.png" alt="">
                            </div>
                            <div class="promo-badge"></div>
                            <div class="rating-section">
                                <div class="rating-score">8.1</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://www.chaiz.com/p/naac?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                    class="get-quote-btn" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            North American auto care offers convenient access to a variety of services provided by trained
                            technicians, with readily available parts and potential warranty coverage for added peace of
                            mind.
                        </div>
                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Variety of services</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Trained & certified professionals</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No obligation quote</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Easy access to replacements</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Over 100 years of combined experience</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Numerous service centers across North America</span>
                            </div>
                        </div>
                    </div>
                    <button class="more-btn">+ More</button>
                </div>
            </div>
        </div>
    </section>

    <section id="warranty-section" class="warranty-section mt-5">
        <div class="container">
            <div class="warranty-content">
                <h2 class="warranty-title">Is an extended warranty worth it?</h2>
                <p class="warranty-description">
                    That really depends on the car and the driver. If you’re someone who trades cars every couple of years,
                    you probably won’t get your money’s worth. But if you plan on keeping your ride for a while, an extended
                    warranty can be a lifesaver.</p>
                <p class="warranty-description">
                    Think of it like health insurance for your car. You hope you don’t need it, but when something big goes
                    wrong, it can save you from a bill that wipes out your savings. Modern cars are packed with electronics
                    and sensors. A single repair on one of those systems can cost more than the warranty itself.</p>

                <h2 class="warranty-title">How long does a car warranty last?</h2>
                <p class="warranty-description">
                    Most new cars come with a warranty that lasts three years or 36,000 miles. Some brands, like Hyundai and
                    Kia, give you longer coverage on the powertrain, sometimes as much as ten years or 100,000 miles.
                </p>
                <p class="warranty-description">
                    Once that factory coverage ends, you’re on your own unless you’ve picked up an extended plan. Extended
                    warranties can add several more years of protection, depending on the provider and the level of coverage
                    you choose.
                </p>

                <h2 class="warranty-title">Types of warranties</h2>

                <p>Car warranties aren’t one-size-fits-all. Some plans cover only the essentials, while others practically
                    babysit your car. The right choice really depends on how much risk you’re comfortable with and how much
                    you want to spend. Let’s break it down in plain English:</p>

                <ul class="warranty-list">
                    <li><strong>Powertrain warranty:</strong> This is the “big stuff” warranty. It takes care of the engine,
                        transmission, and the parts that keep the car moving. It won’t save you from smaller repair bills,
                        but it covers the most expensive problems you could face.</li>
                    <li><strong>Bumper-to-bumper warranty:</strong> This is the gold standard. It covers almost everything
                        from your electronics to your A/C. Of course, there are always exclusions, but if you want maximum
                        peace of mind, this is the one to look at.</li>
                    <li><strong>Named component warranty:</strong> This one is more selective. Instead of covering nearly
                        everything, it lists out specific parts that are protected. It’s a good fit if you know what systems
                        you want covered and don’t care about the rest.</li>
                    <li><strong>Wrap coverage:</strong> Think of this as the “gap filler.” If your powertrain is still under
                        factory warranty, a wrap plan can extend coverage to everything else. It rounds out your protection
                        without overlapping what you already have.</li>
                    <li><strong>Drivetrain warranty:</strong> Sounds a lot like powertrain, right? The difference is it
                        usually skips the engine. It focuses on the parts that send power to the wheels, like the
                        transmission and axles.</li>
                </ul>

                <p>So which should you pick? If you’re driving an older car, a simple powertrain plan might be enough to
                    save you from a nightmare repair bill. If you’ve got a newer or luxury car, bumper-to-bumper or wrap
                    coverage is usually the smarter move.</p>

                <h2 class="warranty-title">Car warranty for luxury vehicles</h2>
                <p class="warranty-description">
                    Luxury cars are incredible to drive, but they can be brutal on your wallet when something breaks. A
                    simple repair on a Mercedes, BMW, or Audi can cost more than fixing an entire economy car.
                </p>
                <p class="warranty-description">
                    That’s why a car warranty for luxury vehicles is worth looking into. These plans often cover the pricey
                    tech that makes high-end cars so special, like adaptive suspensions, advanced safety systems, or digital
                    dashboards. Yes, the warranties cost more, but so do the repairs. If you’re driving a luxury car,
                    extended coverage isn’t just nice to have. It can protect you from financial shock when something goes
                    wrong.
                </p>

                <h2 class="warranty-title">Extended car warranty cost</h2>
                <p class="warranty-description">
                    The price of an extended warranty is all over the place. On average, you’re looking at somewhere between
                    $1,500 and $4,000. The price is higher if you own an older car or a luxury vehicle.
                </p>
                <p class="warranty-description">
                    What you pay depends on the make and age of your car, the type of coverage you choose, the deductible,
                    and whether you’re buying through a dealer or a third-party provider. Some plans also include perks like
                    roadside assistance or rental car coverage. Those extras don’t sound exciting until you’re stuck on the
                    side of the road and suddenly truly grateful you have them.
                </p>

                <h2 class="warranty-title">Used automobile warranties</h2>
                <p class="warranty-description">
                    If you’re buying used, you still have options. Used automobile warranties are built for pre-owned cars
                    that don’t have factory coverage anymore. They can help cover things like transmission repairs or
                    electrical failures, which are the kinds of surprises no one wants to pay for out of pocket.
                </p>
                <p class="warranty-description">
                    Some dealers include a short warranty with certified pre-owned cars, but if you’re buying privately, a
                    third-party warranty is usually your best bet. Keep in mind that not every car qualifies. Ancient or
                    high-mileage cars might be excluded, so check before you buy.
                </p>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll(".more-btn").forEach(btn => {
            btn.addEventListener("click", function () {
                const cardBody = this.previousElementSibling;
                cardBody.classList.toggle("active");

                if (cardBody.classList.contains("active")) {
                    this.textContent = "- Less";
                } else {
                    this.textContent = "+ More";
                }
            });
        });
    </script>

    <section id="get-matched" style="padding: 40px 0;">
        <div class="container">
            <h1 class="match-title">How we connect you with the right provider</h1>

            <div class="match-steps-container">
                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/1icon.png" alt="">
                    </div>
                    <h3 class="match-step-title">Your vehicle details</h3>
                    <p class="match-step-description">Provide information about your vehicle and the coverage you require.
                    </p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/2icon.png" alt="">
                    </div>
                    <h3 class="match-step-title">Extensive provider network</h3>
                    <p class="match-step-description">We carefully review offers from leading warranty providers to identify
                        the best options for you.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/3icon.png" alt="">
                    </div>
                    <h3 class="match-step-title">Your personalized solution</h3>
                    <p class="match-step-description">Choose to submit a quote request for a tailored proposal or purchase
                        your selected warranty directly online for immediate coverage.</p>
                </div>
            </div>

            <button class="match-cta-button">Find My Match</button>
        </div>
    </section>

    <section id="score-section" class="score-section">
        <div class="container">
            <div class="score-content">
                <h1 class="score-title">How we work our magic</h1>
                <p class="score-description">
                    Each provider is rated out of 10 based on three key factors:
                    <span class="score-highlight">how often
                        they match successfully with drivers, how well their brand connects with users, and the strength of
                        their coverage.
                    </span>
                </p>
                <!-- <button class="score-cta-button">More about our scores</button> -->
            </div>

            <div class="score-illustration">
                <img src="/img/4icon.png" alt="">
            </div>
        </div>
    </section>

    <section class="faq-section container my-5">
        <div class="faq-card border-light shadow-sm">
            <div class="faq-card-body p-4">
                <h2 class="faq-card-title h4 mb-4">Frequently Asked Questions</h2>

                <div class="faq-accordion">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Our Comprehensive Review Process for Extended Car Warranties</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>We thoroughly evaluate each plan based on factors like coverage scope, options, pricing,
                                availability, support, and claims processing. This rigorous review process enables us to
                                recommend only the top extended car warranty providers.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Who Benefits from an Extended Car Warranty?</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>Typically, car owners seek extended warranties after their factory warranty expires (usually
                                between 3-5 years or 36,000-60,000 miles). An extended warranty prolongs your car's
                                protection, saving you money and providing peace of mind for future repairs.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Selecting the Right Plan</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>When selecting a plan, consider your vehicle's age, mileage, typical repair costs, and your
                                budget. Look for coverage that matches your vehicle's most likely repair needs while fitting
                                your financial situation.</p>

                            <ul>
                                <li><strong>Bumper-to-Bumper Warranties:</strong> Comprehensive coverage for most mechanical
                                    systems, excluding explicitly listed items.</li>
                                <li><strong>Powertrain Warranties:</strong> Covers engine, transmission, and related
                                    components.</li>
                                <li><strong>Wear-and-Tear Warranties:</strong> Repairs or replacements due to natural wear
                                    and tear.</li>
                                <li><strong>Maintenance Plans:</strong> Covers routine maintenance, plus some wear-and-tear
                                    parts.</li>
                                <li><strong>Emission Warranties:</strong> Protects against emission-related failures.</li>
                                <li><strong>Factory Accessory Plans:</strong> Extended coverage for factory-installed
                                    accessories.</li>
                                <li><strong>Rust or Corrosion Warranties:</strong> Covers repairs due to rust-through
                                    problems.</li>
                            </ul>
                        </div>

                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Sustainability Model</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>With numerous options available, choosing the best car warranty can be overwhelming. Our
                                reviews and ratings help you compare companies based on coverage, pricing, support, and
                                claims processing, ensuring you make an informed decision.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function (e) {
                    e.preventDefault();
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('.faq-icon');

                    if (answer.classList.contains('d-none')) {
                        // Open this FAQ
                        answer.classList.remove('d-none');
                        icon.textContent = '-';
                    } else {
                        // Close this FAQ
                        answer.classList.add('d-none');
                        icon.textContent = '+';
                    }
                });
            });
        });
    </script>

    <script>
        const title = document.getElementById('quiz-title');
        const now = new Date();
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const currentMonth = monthNames[now.getMonth()];
        title.textContent = `Best Extended Auto Warranty in ${currentMonth} ${now.getFullYear()}`;
    </script>
@endsection