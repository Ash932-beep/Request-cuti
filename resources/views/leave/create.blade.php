@extends('layouts.app')

@section('content')

<style>
    .box {
        width: 450px;
        background: #1e293b;
        padding: 25px;
        border-radius: 10px;
        color: white;
        margin-top: 20px;
    }

    h2 {
        color: #f43f5e;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none;
    }

    textarea {
        height: 80px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #f43f5e;
        color: white;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background: #e11d48;
    }

    .success {
        background: green;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
</style>

<div class="box">

    <h2>Apply Leave</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/leave/store" method="POST">
    @csrf

    <!-- Leave Type -->
    <label>Leave Type</label>
    <select name="leave_type_id" required>
        <option value="">Select Leave Type</option>
        @foreach($leaveTypes as $type)
            <option value="{{ $type->id }}">
                {{ $type->name }}
            </option>
        @endforeach
    </select>

    <!-- Start Date -->
    <label>Start Date</label>
    <input type="date" name="start_date" required>

    <!-- End Date -->
    <label>End Date</label>
    <input type="date" name="end_date" required>

    <!-- Reason -->
    <label>Reason</label>
    <textarea name="reason" required></textarea>

    <button type="submit">Submit Leave</button>
</form>

</div>

@endsection