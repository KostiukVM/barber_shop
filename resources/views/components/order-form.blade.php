@extends('layouts.app') <!-- Визначаємо використання макету з фреймворку -->

@section('content') <!-- Вставляємо вміст в секцію 'content' макету -->

<main>
    <form action="{{ route('dashboard') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="position_id">Position:</label>
            <select name="position_id" id="position_id" class="form-control" required>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="working_schedule_id">Working Schedule:</label>
            <select name="working_schedule_id" id="working_schedule_id" class="form-control" required>
                @foreach($workingSchedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->schedule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</main>

@endsection <!-- Закриваємо секцію 'content' -->

