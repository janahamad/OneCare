<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="bookingModalLabel">{{ __('Book Appointment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Progress Stepper -->
                <div class="d-flex justify-content-between mb-4 position-relative">
                    <div class="step-line"></div>
                    <div class="step-circle active" data-step="1">1</div>
                    <div class="step-circle" data-step="2">2</div>
                    <div class="step-circle" data-step="3">3</div>
                </div>

                <form id="bookingForm">
                    <!-- Step 1: Service Selection (Selected from Profile) -->
                    <div class="step-content" id="step1">
                        <h6 class="fw-bold mb-3">{{ __('Confirm Service') }}</h6>
                        <div id="selectedServiceDisplay" class="p-3 border rounded mb-4 bg-light">
                            {{ __('Please select a service from the list.') }}
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary next-step" disabled>{{ __('Next') }}</button>
                        </div>
                    </div>

                    <!-- Step 2: Date & Time -->
                    <div class="step-content d-none" id="step2">
                        <h6 class="fw-bold mb-3">{{ __('Select Date & Time') }}</h6>
                        <div class="mb-3">
                            <label class="form-label small">{{ __('Pick a Date') }}</label>
                            <input type="date" class="form-control" name="booking_date" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="time-slots row g-2 mb-4" id="timeSlotsContainer">
                            <!-- Time slots will be injected here -->
                            <p class="text-muted small">{{ __('Select a date to see available slots.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary prev-step">{{ __('Back') }}</button>
                            <button type="button" class="btn btn-primary next-step" disabled>{{ __('Next') }}</button>
                        </div>
                    </div>

                    <!-- Step 3: Confirmation -->
                    <div class="step-content d-none" id="step3">
                        <h6 class="fw-bold mb-3">{{ __('Final Details') }}</h6>
                        <div class="confirmation-details mb-4">
                            <p class="mb-1 small text-muted">{{ __('Service:') }} <span id="summaryService" class="fw-bold text-dark"></span></p>
                            <p class="mb-1 small text-muted">{{ __('Date:') }} <span id="summaryDate" class="fw-bold text-dark"></span></p>
                            <p class="mb-1 small text-muted">{{ __('Time:') }} <span id="summaryTime" class="fw-bold text-dark"></span></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">{{ __('Personal Notes (Optional)') }}</label>
                            <textarea class="form-control" name="notes" rows="2"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary prev-step">{{ __('Back') }}</button>
                            <button type="submit" class="btn btn-success px-4">{{ __('Confirm Booking') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #adb5bd;
        z-index: 2;
        position: relative;
    }
    .step-circle.active {
        background-color: #d4a373;
        color: white;
    }
    .step-line {
        position: absolute;
        top: 15px;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #e9ecef;
        z-index: 1;
    }
    .time-slot-btn {
        cursor: pointer;
        padding: 8px;
        text-align: center;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .time-slot-btn:hover, .time-slot-btn.active {
        background-color: #d4a373;
        color: white;
        border-color: #d4a373;
    }
</style>

<script>
    $(document).ready(function() {
        let currentStep = 1;
        let selectedService = null;
        let selectedTime = null;

        $('.select-service').on('click', function() {
            selectedService = {
                id: $(this).data('id'),
                name: $(this).data('name')
            };
            $('#selectedServiceDisplay').text(selectedService.name);
            $('#summaryService').text(selectedService.name);
            $('#step1 .next-step').prop('disabled', false);
            $('#bookingModal').modal('show');
        });

        $('.next-step').on('click', function() {
            $(`#step${currentStep}`).addClass('d-none');
            currentStep++;
            $(`#step${currentStep}`).removeClass('d-none');
            $(`.step-circle[data-step="${currentStep}"]`).addClass('active');
        });

        $('.prev-step').on('click', function() {
            $(`.step-circle[data-step="${currentStep}"]`).removeClass('active');
            $(`#step${currentStep}`).addClass('d-none');
            currentStep--;
            $(`#step${currentStep}`).removeClass('d-none');
        });

        $('input[name="booking_date"]').on('change', function() {
            // Mock fetching available slots
            const slots = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00'];
            let html = '';
            slots.forEach(time => {
                html += `<div class="col-4"><div class="time-slot-btn" data-time="${time}">${time}</div></div>`;
            });
            $('#timeSlotsContainer').html(html);
            $('#summaryDate').text($(this).val());
        });

        $(document).on('click', '.time-slot-btn', function() {
            $('.time-slot-btn').removeClass('active');
            $(this).addClass('active');
            selectedTime = $(this).data('time');
            $('#summaryTime').text(selectedTime);
            $('#step2 .next-step').prop('disabled', false);
        });

        $('#bookingForm').on('submit', function(e) {
            e.preventDefault();
            // Perform AJAX call to /beauty-services/bookings
            alert('Booking requested for ' + selectedService.name + ' at ' + selectedTime);
            $('#bookingModal').modal('hide');
        });
    });
</script>
