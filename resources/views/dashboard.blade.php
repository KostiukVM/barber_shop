@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Barbers</h2>
                <ul>
                    @extends('components.barber-form')

                </ul>
            </div>
            <div class="col-md-4">
                <h2>Working Schedules</h2>
                <ul>
                    @extends('components.time-form')
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Offers</h2>
                <ul>
                    @extends('components.order-form')
                </ul>
            </div>
        </div>
    </div>
@endsection
