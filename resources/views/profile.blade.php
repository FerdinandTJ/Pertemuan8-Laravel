<!DOCTYPE html>
<html>
<head>
    <title>Profile {{ $user['name'] }}</title>
</head>
<body>
    <h1>Profil Pengguna</h1>

    <p><strong>Nama:</strong> {{ $user['name'] }}</p>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
    <p><strong>Bio:</strong> {{ $user['bio'] }}</p>
</body>
</html>
