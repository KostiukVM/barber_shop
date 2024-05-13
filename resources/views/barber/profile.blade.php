<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>
</head>
<body>
<h1>Manager Profile</h1>
<!-- Виведення інформації про кожного менеджера -->
<ul>
    @foreach ($barbers as $barber)
        <li>Name: {{ $barber->name }}</li>
        <li>Email: {{ $barber->email }}</li>
        <li>Role: Barber</li>

    @endforeach
</ul>
</body>
</html>
