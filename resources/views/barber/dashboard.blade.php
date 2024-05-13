<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
</head>
<body>
<h1>Manager Dashboard</h1>

<ul>
    @foreach ($barbers as $barber)
        <li>{{ $barber->name }}</li>
    @endforeach
</ul>
</body>
</html>
