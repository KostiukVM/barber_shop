@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Barber</h1>
        <form action="{{ route('barbers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create Barber</button>
        </form>
    </div>
@endsection
