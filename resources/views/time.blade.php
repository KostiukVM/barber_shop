@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form>
{{--                    <input type="date" min="{{date('Y\-m\-d')}}" value="{{date('Y\-m\-d')}}" name="date" required>--}}
                    <select>
                        <option value="">
                            Monday
                        </option>
                        <option>
                            Tuesday
                        </option>
                        <option>
                            Wednesday
                        </option>
                        <option>
                            Thursday
                        </option>
                        <option>
                            Friday
                        </option>
                        <option>
                            Saturday
                        </option>
                    </select>
                    <select name="time">
                        @foreach($times as $time )
                            <option value="{{$time}}"> {{$time}} </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-secondary">Choose</button>
                </form>
            </div>
        </div>
    </div>
@endsection
