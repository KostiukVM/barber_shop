@extends('layouts.app') <!-- Визначаємо використання макету з фреймворку -->

@section('content') <!-- Вставляємо вміст в секцію 'content' макету -->

<main>
    <div class="row">
        <div class="container marketing">

            <div class="col-lg-4">
                <img src="{{ asset('img/barber_photo/'.$photo) }}"> <!-- Вставляємо фото барбера -->
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h2 class="fw-normal">{{ $barberName }}</h2> <!-- Вставляємо ім'я барбера -->
                <p>{{ $comment }}</p> <!-- Вставляємо коментар -->
                <p><a class="btn btn-secondary" href="https://getbootstrap.com/docs/5.3/examples/carousel/#">Choice</a></p> <!-- Додавання посилання на вибір -->
            </div><!-- /.col-lg-4 -->

        </div>
    </div>
</main>

@endsection <!-- Закриваємо секцію 'content' -->

