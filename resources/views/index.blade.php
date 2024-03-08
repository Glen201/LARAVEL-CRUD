<!-- resources/views/subscribers/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Subscribers</title>
</head>
<body>
    <h1>Subscribers</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        @foreach ($subscribers as $subscriber)
        <tr>
            <td>{{ $subscriber->id }}</td>
            <td>{{ $subscriber->first_name }}</td>
            <td>{{ $subscriber->last_name }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
