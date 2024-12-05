@extends('Layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Manage Timetable</h1>

 
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form action="{{ route('manage-timetable.store') }}" method="POST">
        @csrf

        


        <div class="mb-3">
            <label for="class" class="form-label">Select Class</label>
            <select id="class" name="class" class="form-select" required>
                <option value="" disabled selected>Choose a class</option>
                @foreach (range(1, 7) as $class)
                    <option value="{{ $class }}">Class {{ $class }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('timetable.show') }}" class="btn btn-primary">View Timetable</a>
        

        <div class="mb-3">
            <label for="days" class="form-label">Number of Days</label>
            <input type="number" id="days" name="days" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label for="periods" class="form-label">Number of Periods</label>
            <input type="number" id="periods" name="periods" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Start Time</label>
            <input type="time" id="time" name="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration of Each Period (in minutes)</label>
            <input type="number" id="duration" name="duration" class="form-control" required min="1">
        </div>

        <div class="mb-3">
    <label for="breaks" class="form-label">Number of Breaks</label>
    <select id="breaks" name="breaks" class="form-select" required onchange="showBreakInputs()">
        <option value="" disabled selected>Select number of breaks</option>
        @foreach (range(1, 3) as $break)
            <option value="{{ $break }}">{{ $break }}</option>
        @endforeach
    </select>
</div>

<!-- <script>
    function showBreakInputs() {
        const breaksContainer = document.getElementById('breaks-container');
        breaksContainer.innerHTML = ''; // Clear previous input fields
        
        const breaksSelect = document.getElementById('breaks');
        const numberOfBreaks = breaksSelect.value;

        if (numberOfBreaks) {
            for (let i = 1; i <= numberOfBreaks; i++) {
                const div = document.createElement('div');
                div.classList.add('mb-3');

                const label = document.createElement('label');
                label.classList.add('form-label');
                label.textContent = `Break ${i} Time`;

                const input = document.createElement('input');
                input.type = 'time';
                input.name = `break_${i}`;
                input.classList.add('form-control');
                input.required = true;

                div.appendChild(label);
                div.appendChild(input);

                breaksContainer.appendChild(div);
            }
        }
    }
</script> -->
<script>
    function showBreakInputs() {
        const breaksContainer = document.getElementById('breaks-container');
        breaksContainer.innerHTML = ''; // Clear previous input fields
        
        const breaksSelect = document.getElementById('breaks');
        const numberOfBreaks = breaksSelect.value;

        if (numberOfBreaks) {
            for (let i = 1; i <= numberOfBreaks; i++) {
                const div = document.createElement('div');
                div.classList.add('mb-3');

                const label = document.createElement('label');
                label.classList.add('form-label');
                label.textContent = `Break ${i} Time (MM:SS)`;

                const input = document.createElement('input');
                input.type = 'text';
                input.name = `break_${i}`;
                input.classList.add('form-control');
                input.placeholder = '00:00';
                input.required = true;

                // Input validation for MM:SS format
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9:]/g, ''); // Allow only numbers and colon
                    if (this.value.length > 5) {
                        this.value = this.value.substring(0, 5); // Limit to MM:SS format
                    }
                });

                div.appendChild(label);
                div.appendChild(input);

                breaksContainer.appendChild(div);
            }
        }
    }
</script>


<div id="breaks-container"></div> <!-- Container to hold break input fields -->


        <button type="submit" class="btn btn-primary">Create Timetable</button>
    </form>
</div>
@endsection
