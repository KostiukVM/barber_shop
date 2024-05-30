@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($offers as $offer)
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                    <h2 class="fw-normal">{{$offer->name}}</h2>
                    <h2 class="fw-normal">Price = {{$offer->price}}</h2>
                    <h2 class="fw-normal">Duration = {{$offer->duration}} hour</h2>
                    <p>Description.</p>
                    <p><button class="btn btn-secondary" onclick="">Choose</button></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
