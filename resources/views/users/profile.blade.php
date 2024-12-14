<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>Profile de {{ $user->name }}</h1>

    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role }}</p>

    @if($user->profile_photo_path)
        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Photo de profil">
    @else
        <p>Aucune photo de profil.</p>
    @endif
</body>
</html>
