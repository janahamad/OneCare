<div class="vendor-dashboard container my-5">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 p-4">
            <h4 class="fw-bold mb-0 text-primary">{{ __('My Appointment Calendar') }}</h4>
        </div>
        <div class="card-body p-4">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- FullCalendar.js Dependencies -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            events: '{{ route("beauty-services.calendar-events", ["provider_id" => auth("vendor")->user()->store_id]) }}',
            eventClick: function(info) {
                alert('Booking ID: ' + info.event.id + '\nStatus: ' + info.event.extendedProps.status);
            },
            eventDidMount: function(info) {
                // Initialize tooltips or popovers
            },
            themeSystem: 'bootstrap5'
        });
        calendar.render();
    });
</script>

<style>
    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
    .fc-header-toolbar {
        margin-bottom: 2rem !important;
    }
    .fc-event {
        cursor: pointer;
        padding: 2px 4px;
        border-radius: 4px;
    }
</style>
