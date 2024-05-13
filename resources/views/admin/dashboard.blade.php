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
    @foreach ($admins as $admin)
        <li>{{ $admin->name }}</li>
    @endforeach
</ul>
</body>
</html>
