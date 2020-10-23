<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="{{route('login.index')}}" method="post">
    @csrf
    <input type="submit" value="Login with twitter">
</form>
</body>
</html>
