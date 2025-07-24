@extends('layouts.app')

@section('content')

    <section id="hero-section" class="position-relative" style="height: auto;">
        <img src="{{ asset('img/banner3.jpg') }}" alt="Banner" class="object-fit-cover banner-img"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">

        <div class="hero-text-overlay py-5">
            <div class="container text-white">
                <p class="quiz-heading">Compare Alternatives</p>
                <p class="quiz-subtext">Take our short quiz to find an Auto Warranty suited to you.</p>

                <!-- Quiz starts directly below text -->
                <div class="quiz-content-box mt-4">
                    <form id="quiz-start-form">
                        <h3 class="quiz-question">Choose your vehicle type:</h3>


                        <div class="vehicle-grid">
                            <button type="button" class="vehicle-option" data-value="Hatchback">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/hatchback.svg?width=58&height=25&format=webply"
                                        alt="Hatchback" />
                                </span>
                                <span class="vehicle-label">Hatchback <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Sedan">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/sedan.svg?width=58&height=25&format=webply"
                                        alt="Sedan" />
                                </span>
                                <span class="vehicle-label">Sedan <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Coupe">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/coupe.svg?width=63&height=25&format=webply"
                                        alt="Coupe" />
                                </span>
                                <span class="vehicle-label">Coupe <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Truck">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/truck-1.svg?width=51&height=25&format=webply"
                                        alt="Truck" />
                                </span>
                                <span class="vehicle-label">Truck <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="SUV">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/suv.svg?width=51&height=25&format=webply"
                                        alt="SUV" />
                                </span>
                                <span class="vehicle-label">SUV <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Other">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/question.svg?width=16&height=25&format=webply"
                                        alt="Other" />
                                </span>
                                <span class="vehicle-label">Other <span class="arrow">→</span></span>
                            </button>
                        </div>

                        <input type="hidden" name="car_make" id="car-make" required>

                        <p class="quiz-disclaimer">
                            <span class="quiz-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none"
                                    viewBox="0 0 25 24">
                                    <path
                                        d="M11.45 16.55L17.1 10.9 15.675 9.475 11.45 13.7 9.325 11.575 7.9 13l3.55 3.55ZM12.5 22a9.5 9.5 0 1 1 0-19 9.5 9.5 0 0 1 0 19ZM6.1 2.35 7.5 3.75 3.25 8 1.85 6.6 6.1 2.35ZM18.9 2.35 23.15 6.6 21.75 8 17.5 3.75 18.9 2.35Z"
                                        fill="#1C1B1F" />
                                </svg>
                            </span>
                            It only takes a minute!
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- quiz modal start -->
    <!-- Car Quiz Modal -->
    <div id="car-quiz" class="car-quiz-modal">
        <button class="car-quiz-close" aria-label="Close modal">×</button>
        <div class="car-quiz-split">
            <div class="car-quiz-left">
                <div class="car-quiz-body">

                    <!-- Step 1: Year, Make, Model -->
                    <div id="quiz-step1">
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
                        <button id="to-step2" class="to-step-btn">Continue</button>
                    </div>

                    <!-- Step 2: Mileage -->
                    <div id="quiz-step2" class="d-none">
                        <h3 class="modal-question">Roughly, how many miles are on the vehicle?</h3>
                        <div class="options-grid1">
                            <button type="button" class="mile-opt1" data-value="<100000">Less than 100k</button>
                            <button type="button" class="mile-opt1" data-value="130000">100-140k</button>
                            <button type="button" class="mile-opt1" data-value="180000">140-200k</button>
                            <button type="button" class="mile-opt1" data-value=">200000">More than 200k</button>
                        </div>
                        <button id="to-step3" class="to-step-btn">Continue</button>
                        <input type="hidden" name="car_mileage" id="input-mileage" value="">
                    </div>

                    <div id="quiz-step3" class="d-none">
                        <h3 class="modal-question1">How soon do you want your new auto warranty?</h3>
                        <div class="options-grid1">
                            <button type="button" class="warranty-urgency-opt1" data-value="As soon as possible">As soon as
                                possible</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="1-2 weeks">1-2 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="3-4 weeks">3-4 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="4+ weeks">4+ weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="Unsure">Unsure</button>
                        </div>
                        <button id="to-step4" class="to-step-btn">Continue</button>
                        <input type="hidden" name="warranty" id="warranty" value="">
                    </div>

                    <div id="quiz-step4" class="d-none">
                        <h3 class="modal-question1">What state do you live in?</h3>
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
                        <button id="to-step5" class="to-step-btn">Continue</button>
                    </div>

                    <div id="quiz-step5" class="d-none">
                        <h3 class="modal-question1">What's your ZIP code?</h3>
                        <input type="text" name="user-zip" id="user-zip" class="modal-dropdown1"
                            placeholder="Enter your ZIP code" maxlength="5" pattern="\d{5}" inputmode="numeric" required />
                        <button id="to-step6" class="to-step-btn">Continue</button>
                    </div>

                    <div id="quiz-step6" class="d-none">
                        <h3 class="modal-question1">What's your Email Address?</h3>
                        <input type="email" name="email" id="user-email" class="modal-dropdown1"
                            placeholder="Enter your Email" required />
                        <button id="to-step7" class="to-step-btn">Continue</button>
                    </div>

                    <div id="quiz-step7" class="d-none">
                        <h3 class="modal-question1">What's your Full Name?</h3>
                        <input type="text" name="user-name" id="user-name" class="modal-dropdown1"
                            placeholder="Enter your name" required />
                        <button id="to-step8" class="to-step-btn">Continue</button>
                    </div>

                    <div id="quiz-step8" class="d-none">
                        <h3 class="modal-question1">What's your Phone Number?</h3>
                        <input type="text" name="user-number" id="user-number" name="number" class="modal-dropdown1"
                            placeholder="Enter your number" required />
                        <button id="to-card" class="to-step-btn">Submit</button>
                    </div>

                </div>
            </div>

            <div class="car-quiz-right">
                <img src="{{ asset('img/logo.png') }}" alt="Company Logo" />
                <h2>Best Extended Auto Warranty in May 2025</h2>
                <p>Continue our short quiz to get matched to an auto warranty provider suited to you.</p>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Show the quiz modal after vehicle type selected
            document.querySelectorAll('.vehicle-option').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('car-make').value = button.dataset.value;
                    document.getElementById('car-quiz').classList.add('show');
                });
            });

            // Close buttons to close the modal
            document.querySelector('.car-quiz-close').addEventListener('click', () => {
                document.getElementById('car-quiz').classList.remove('show');
            });

            // Optional: Close modal on outside click
            document.getElementById('car-quiz').addEventListener('click', (e) => {
                if (e.target.id === 'car-quiz') {
                    e.currentTarget.classList.remove('show');
                }
            });

            // Get dropdown elements
            const yearSelect = document.getElementById("sel_year");
            const makeSelect = document.getElementById("sel_make");
            const modelSelect = document.getElementById("sel_model");

            // Populate years dropdown (current year to 2005)
            const currentYear = new Date().getFullYear();
            for (let y = currentYear; y >= 2005; y--) {
                const opt = document.createElement("option");
                opt.value = y;
                opt.textContent = y;
                yearSelect.appendChild(opt);
            }

            // Example vehicle data (make and models)
            const vehicles = [
                "ACURA 2.3CL",
                "ACURA ILX",
                "ACURA MDX",
                "ACURA RDX",
                "ACURA TLX",
                "VOLVO XC90",
                "VOLVO XC60",
                "VOLVO S60",
                "BMW 3 SERIES",
                "BMW X5",
                "FORD F-150",
                "FORD MUSTANG",
                "TOYOTA CAMRY",
                "TOYOTA RAV4"
            ];

            // Build make → models map
            const makesModelsMap = {};
            vehicles.forEach(vehicle => {
                const [make, ...modelParts] = vehicle.split(" ");
                const model = modelParts.join(" ");
                if (!makesModelsMap[make]) makesModelsMap[make] = [];
                if (!makesModelsMap[make].includes(model)) {
                    makesModelsMap[make].push(model);
                }
            });

            // Populate make dropdown
            makeSelect.innerHTML = `<option value="">Select Make</option>`;
            Object.keys(makesModelsMap).forEach(make => {
                const opt = document.createElement("option");
                opt.value = make;
                opt.textContent = make;
                makeSelect.appendChild(opt);
            });

            // When make changes, populate model dropdown
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

            // Step navigation with proper validation
            // Step 1 → Step 2 (Vehicle Info Validation)
            document.getElementById("to-step2").addEventListener("click", function (e) {
                e.preventDefault();
                const year = yearSelect.value;
                const make = makeSelect.value;
                const model = modelSelect.value;

                if (!year || !make || !model) {
                    alert("Please fill out year, make & model.");
                    return;
                }

                // Store data in memory (not sessionStorage for Claude compatibility)
                window.carData = window.carData || {};
                window.carData.year = year;
                window.carData.make = make;
                window.carData.model = model;

                document.getElementById("quiz-step1").classList.add("d-none");
                document.getElementById("quiz-step2").classList.remove("d-none");
            });

            // Step 2 → Step 3 (Mileage Selection)
            document.getElementById("to-step3").addEventListener("click", function (e) {
                e.preventDefault();
                const selectedMileage = document.querySelector('.mile-opt1.selected');

                if (!selectedMileage) {
                    alert("Please select your vehicle's mileage range.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.mileage = selectedMileage.dataset.value;
                document.getElementById('input-mileage').value = selectedMileage.dataset.value;

                document.getElementById("quiz-step2").classList.add("d-none");
                document.getElementById("quiz-step3").classList.remove("d-none");
            });

            // Step 3 → Step 4 (Warranty Selection)
            document.getElementById("to-step4").addEventListener("click", function (e) {
                e.preventDefault();
                const selectedWarranty = document.querySelector('.warranty-urgency-opt1.selected');

                if (!selectedWarranty) {
                    alert("Please select your warranty preference.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.warranty = selectedWarranty.dataset.value;
                document.getElementById('warranty').value = selectedWarranty.dataset.value;

                document.getElementById("quiz-step3").classList.add("d-none");
                document.getElementById("quiz-step4").classList.remove("d-none");
            });

            // Step 4 → Step 5 (State Validation)
            document.getElementById("to-step5").addEventListener("click", function (e) {
                e.preventDefault();
                const state = document.getElementById("user-state").value.trim();

                if (!state) {
                    alert("Please enter your state.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.state = state;

                document.getElementById("quiz-step4").classList.add("d-none");
                document.getElementById("quiz-step5").classList.remove("d-none");
            });

            // Step 5 → Step 6 (ZIP Validation)
            document.getElementById("to-step6").addEventListener("click", function (e) {
                e.preventDefault();
                const zip = document.getElementById("user-zip").value.trim();

                if (!/^\d{5}$/.test(zip)) {
                    alert("Please enter a valid 5-digit ZIP code.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.zip = zip;

                document.getElementById("quiz-step5").classList.add("d-none");
                document.getElementById("quiz-step6").classList.remove("d-none");
            });

            // Step 6 → Step 7 (Email Validation)
            document.getElementById("to-step7").addEventListener("click", function (e) {
                e.preventDefault();
                const email = document.getElementById("user-email").value.trim();

                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Please enter a valid email address.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.email = email;

                document.getElementById("quiz-step6").classList.add("d-none");
                document.getElementById("quiz-step7").classList.remove("d-none");
            });

            // Step 7 → Step 8 (Name Validation)
            document.getElementById("to-step8").addEventListener("click", function (e) {
                e.preventDefault();
                const name = document.getElementById("user-name").value.trim();

                if (!name || !/^[a-zA-Z]+(?: [a-zA-Z]+)+$/.test(name)) {
                    alert("Please enter your full name (first and last name).");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.name = name;

                document.getElementById("quiz-step7").classList.add("d-none");
                document.getElementById("quiz-step8").classList.remove("d-none");
            });

            // Handle mileage option selection
            const mileOptions = document.querySelectorAll('.mile-opt1');
            mileOptions.forEach(button => {
                button.addEventListener('click', () => {
                    mileOptions.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                });
            });

            // Handle warranty option selection
            const warrantyOptions = document.querySelectorAll('.warranty-urgency-opt1');
            warrantyOptions.forEach(button => {
                button.addEventListener('click', () => {
                    warrantyOptions.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                });
            });

            // Final step (phone validation and form submission)
            const finalButton = document.getElementById("to-card") || document.getElementById("to-final");
            if (finalButton) {
                finalButton.addEventListener("click", function (e) {
                    e.preventDefault();
                    const phone = document.getElementById("user-number").value.trim();

                    if (!phone || !/^\d{10}$/.test(phone.replace(/\D/g, ''))) {
                        alert("Please enter a valid 10-digit phone number.");
                        return;
                    }

                    window.carData = window.carData || {};
                    window.carData.phone = phone;

                    // Submit form to Laravel controller
                    submitFormData();
                });
            }

            // Function to submit form data to Laravel controller
            function submitFormData() {
                // Show loading state
                const submitButton = finalButton;
                const originalText = submitButton.textContent;
                submitButton.disabled = true;
                submitButton.textContent = 'Submitting...';

                // Get CSRF token (Laravel requirement)
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                    document.querySelector('input[name="_token"]')?.value;

                console.log('CSRF Token:', csrfToken);
                console.log('Car Data:', window.carData);

                // Prepare form data matching your controller's expected field names
                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('sel-year', window.carData.year);
                formData.append('sel-make', window.carData.make);
                formData.append('sel-model', window.carData.model);
                formData.append('car_mileage', window.carData.mileage);
                formData.append('warranty', window.carData.warranty);
                formData.append('user-state', window.carData.state);
                formData.append('user-zip', window.carData.zip);
                formData.append('email', window.carData.email);
                formData.append('user-name', window.carData.name);
                formData.append('user-number', window.carData.phone);

                // Debug: Log form data
                console.log('Form data being sent:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                // Check if we have all required data
                const requiredFields = ['year', 'make', 'model', 'mileage', 'warranty', 'state', 'zip', 'email', 'name', 'phone'];
                const missingFields = requiredFields.filter(field => !window.carData[field]);

                if (missingFields.length > 0) {
                    alert('Missing required fields: ' + missingFields.join(', '));
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                    return;
                }

                // Submit to your Laravel route (matches your actual route)
                const submitUrl = '/lead-submit'; // Updated to match your route

                fetch(submitUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        console.log('Response status:', response.status);
                        console.log('Response headers:', response.headers);

                        // Handle different content types
                        const contentType = response.headers.get('content-type');

                        if (response.status === 422) {
                            // Validation error - expect JSON
                            return response.json().then(data => {
                                throw { status: 422, data: data };
                            });
                        }

                        if (!response.ok) {
                            // Other HTTP errors
                            return response.text().then(text => {
                                throw new Error(`HTTP ${response.status}: ${text}`);
                            });
                        }

                        // Check if response is JSON or redirect
                        if (contentType && contentType.includes('application/json')) {
                            return response.json();
                        } else {
                            // Likely a redirect or HTML response
                            return { success: true, redirect: response.url };
                        }
                    })
                    .then(data => {
                        // Handle successful submission
                        console.log('Success response:', data);

                        // Close the current quiz modal
                        document.getElementById('car-quiz').classList.remove('show');

                        // Show success modal with lead destination info
                        showSuccessModal(data);
                    })
                    .catch(error => {
                        console.error('Full error:', error);

                        // Handle validation errors (422)
                        if (error.status === 422 && error.data && error.data.errors) {
                            let errorMessage = 'Please fix the following errors:\n';
                            Object.keys(error.data.errors).forEach(key => {
                                errorMessage += `- ${error.data.errors[key][0]}\n`;
                            });
                            alert(errorMessage);
                        } else if (error.message) {
                            alert('Error: ' + error.message);
                        } else {
                            alert('Error: Failed to submit your information. Please check the console for details and try again.');
                        }
                    })
                    .finally(() => {
                        // Reset button state
                        submitButton.disabled = false;
                        submitButton.textContent = originalText;
                    });
            }

            // Function to show success modal with lead destination
            function showSuccessModal(responseData) {
                // Create success modal HTML with improved styling
                const successModal = document.createElement('div');
                successModal.id = 'success-modal';
                successModal.className = 'car-quiz-modal show';
                successModal.innerHTML = `
                <div class="success-modal-container">
    <div class="success-modal-content">
        <div class="success-header">
            <h3>Your Lead Has Been Submitted Successfully!</h3>
        </div>

        <div class="lead-destination-card">
            <p class="lead-destination-info">
                <strong>Submitted to:</strong> <span id="destination-name">Processing...</span>
            </p>
        </div>

        <div class="content-grid">
            <div class="what-happens-next">
                <h4>What happens next?</h4>
                <div class="steps-container">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <p>If there is a match between your specifications and our provider's criteria, you will receive a call from between 1-5 providers within the next working day.</p>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <p>You will have a free phone consultation with the relevant provider(s) to discuss prices and ask any questions.</p>
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

        <button class="btn btn-continue" onclick="closeSuccessModal()">Continue</button>
    </div>
</div>

<style>
    .success-modal-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        padding: 20px;
        box-sizing: border-box;
    }

    .success-modal-content {
        background: white;
        border-radius: 12px;
        width: 100%;
        max-width: 600px;
        max-height: 90vh;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .success-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .success-header h3 {
        color: #2c3e50;
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 15px 0;
    }

    .lead-destination-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        text-align: center;
        border-left: 4px solid #ffcf4b;
    }

    .lead-destination-info {
        margin: 0;
        font-size: 16px;
        color: #2c3e50;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }

    .what-happens-next {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }

    .what-happens-next h4 {
        color: #2c3e50;
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 15px 0;
        text-align: center;
    }

    .steps-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .step-item {
        display: flex;
        gap: 10px;
    }

    .step-number {
        background: #ffcf4b;
        color: #2c3e50;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        flex-shrink: 0;
        font-size: 14px;
    }

    .step-content p {
        margin: 0;
        color: #495057;
        font-size: 14px;
        line-height: 1.4;
    }

    .awareness-section {
        background: #fff3cd;
        padding: 15px;
        border-radius: 8px;
    }

    .awareness-section h5 {
        color: #856404;
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 12px 0;
        text-align: center;
    }

    .awareness-items {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .awareness-item {
        display: flex;
        gap: 8px;
    }

    .awareness-number {
        background: #ffc107;
        color: #856404;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        flex-shrink: 0;
        font-size: 12px;
    }

    .awareness-item p {
        margin: 0;
        color: #856404;
        font-size: 13px;
        line-height: 1.4;
    }

    .btn-continue {
        background: #ffcf4b;
        color: #2c3e50;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: block;
        margin: 0 auto;
        width: 100%;
        max-width: 200px;
    }

    .btn-continue:hover {
        background: #ffd700;
        transform: translateY(-2px);
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .success-modal-content {
            padding: 20px;
        }
        
        .content-grid {
            grid-template-columns: 1fr;
        }
        
        .success-header h3 {
            font-size: 20px;
        }
        
        .what-happens-next h4,
        .awareness-section h5 {
            font-size: 16px;
        }
        
        .step-content p,
        .awareness-item p {
            font-size: 13px;
        }
        
        .btn-continue {
            padding: 10px 20px;
            font-size: 15px;
        }
    }
</style>
            `;

                // Add modal to page
                document.body.appendChild(successModal);

                // Set lead destination from response data
                setLeadDestination(responseData.destination);
            }

            // Function to set lead destination display
            function setLeadDestination(destination) {
                const destinationElement = document.getElementById('destination-name');
                if (destinationElement) {
                    let destinationText = '';
                    let destinationColor = '';

                    if (destination) {
                        switch (destination) {
                            case 'Endurance API':
                                destinationText = 'Endurance';
                                destinationColor = '#28a745';
                                break;
                            case 'LeadConduit (Backup System)':
                                destinationText = 'American Dream';
                                destinationColor = '#ffc107';
                                break;
                            case 'Submission Failed':
                                destinationText = '❌ Submission Failed';
                                destinationColor = '#dc3545';
                                break;
                            case 'System Error':
                                destinationText = '⚠️ System Error';
                                destinationColor = '#dc3545';
                                break;
                            default:
                                destinationText = '✅ Successfully Submitted';
                                destinationColor = '#28a745';
                        }
                    } else {
                        destinationText = '✅ Successfully Submitted';
                        destinationColor = '#28a745';
                    }

                    destinationElement.innerHTML = destinationText;
                    destinationElement.style.color = destinationColor;
                }
            }

            // Function to close success modal
            window.closeSuccessModal = function () {
                const successModal = document.getElementById('success-modal');
                if (successModal) {
                    successModal.remove();
                }
            }

            // Function to show success step (keeping for backward compatibility)
            function showSuccessStep() {
                showSuccessModal({});
            }
        });
    </script>

    <!-- quiz modal end -->

    <section id="card-section">
        <div class="container">
            <h3 class="mt-5 mb-3" style="font-weight: 700;">Our providers</h3>

            <div class="mb-4">
                <!-- endurance card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/1.png" alt="">
                            </div>
                            <div class="promo-badge">
                                $300 off any new plan!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">9.9</div>
                                <div class="stars">★★★★★</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back
                            guarantee
                            for
                            peace of mind. Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance,
                            Complete
                            Tire
                            Coverage, Key Replacement, and more!
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Covers cars up to 20 years old/200K miles</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>1 year of FREE Elite Benefits</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible down payment to fit your budget</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>6 coverage plans to choose from</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No obligation fast quote</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30 Day money back guarantee</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span> Quick and easy claims process</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- american dream card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/american-dream.png" alt="">
                            </div>
                            <div class="promo-badge">
                                $350 off + 3 months free!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.4</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            American Dream Auto Protect provides peace of mind by mitigating the high costs that come with
                            unexpected repairs. Their stress-free claims process means you get approved in as little as 48
                            hours.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Choose your own repair facility</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Covers cars up to 20 years old / 200K miles</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Customize your coverage plan</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>OFFER: $350 off + 3 months free!</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible payment plan options</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>24/7 Roadside Assistance</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30 Day money back guarantee</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- omega card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/omega.png" alt="">
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.9</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
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
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- naac card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/naac.png" alt="">
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.1</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
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
                    <button class="learn-more-btn">Learn More</button>
                </div>
            </div>

            <div class="mt-5 divider-line"></div>
            <h3 class="mt-5 mb-3" style="font-weight: 700;">Looking for a quick solution? Buy your Auto Warranty direct
                today!</h3>

            <div class="mb-4">
                <!-- chaiz card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/chaiz.png" alt="">
                            </div>
                            <div class="promo-badge">
                                Buy directly online
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.9</div>
                                <div class="stars">★★★★★</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Chaiz shows you several plans from multiple providers within 30 seconds. Compare and buy
                            breakdown protection from top providers today.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Compare live quotes within less than a minute</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Best price guaranteed</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Purchase completely online 24/7</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No email or phone needed</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Independent and unbiased</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Hundreds of 5* reviews</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>A+ customer service</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30-day money back guarantee</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>
            </div>
        </div>
    </section>


    <section id="get-matched" style="padding: 40px 0;">
        <div class="container">
            <h1 class="match-title">How we match you with the right provider</h1>

            <div class="match-steps-container">
                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Your vehicle</h3>
                    <p class="match-step-description">Tell us a bit about your vehicle and what you need covered.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon2.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Our network</h3>
                    <p class="match-step-description">We'll search our network of top providers to find the right match for
                        you.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon3.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Your quote</h3>
                    <p class="match-step-description">Receive your personalized match and a quote specific to your needs.
                    </p>
                </div>
            </div>

            <button class="match-cta-button">Get Matched</button>
        </div>
    </section>

    <section id="score-section" class="score-section">
        <div class="container">
            <div class="score-content">
                <h1 class="score-title">How we work our magic</h1>
                <p class="score-description">
                    Our ratings are scored on a scale of up to 10 and are assessed based on
                    three parameters - <span class="score-highlight">Successful matches, brand engagement and
                        coverage</span>.
                </p>
                <button class="score-cta-button">More about our scores</button>
            </div>

            <div class="score-illustration">
                <img src="/img/icon4.svg" alt="">
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

    <section class="advertising-disclosure container my-5">
        <div class="advertising-card border-light shadow-sm">
            <div class="advertising-card-body p-4">
                <h2 class="advertising-card-title h4 mb-3">Disclaimer, please read.</h2>
                <div class="advertising-card-text">
                    <p>comparewarranties.org is a trading site of Chaiz, Inc. comparewarranties.org is a free online
                        resource committed to helping you find Vehicle Service Contract providers ("Products").</p>
                    <p>Unlike our main site at chaiz.com, we may accept advertising compensation from some of the companies
                        advertised. The compensation may impact the location and order in which these Products are
                        presented. We may also list Products for which we receive no compensation. This site does not
                        feature all Products on the market.</p>

                    <div class="more-content d-none">
                        <p>By clicking through the links on this site you agree to allow us to pass on your name, address,
                            email and telephone number to providers of Products advertised on this site. In doing so we may
                            receive a small fee from the Product provider for the introduction.</p>
                        <p>This is an advertising site only and does not offer or sell the Products displayed on this site.
                            We are nor responsible for nor do we control Products advertised on this site. If you wish to
                            purchase a Product (other than thru the advertisers on this site) you can do so through our site
                            at chaiz.com.</p>
                        <p>The Terms of Use and Privacy Policy of Chaiz, Inc. as set out below apply to this site and your
                            use of it.</p>
                    </div>

                    <a href="#" class="btn advertising-btn-link px-0 read-more-btn">Read more →</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const readMoreBtn = document.querySelector('.read-more-btn');
            const moreContent = document.querySelector('.more-content');
            const advertisingCard = document.querySelector('.advertising-card');

            readMoreBtn.addEventListener('click', function (e) {
                e.preventDefault();

                if (moreContent.classList.contains('d-none')) {
                    // Expand
                    moreContent.classList.remove('d-none');
                    readMoreBtn.textContent = 'Read less →';
                } else {
                    // Collapse
                    moreContent.classList.add('d-none');
                    readMoreBtn.textContent = 'Read more →';
                }
            });
        });
    </script>
@endsection