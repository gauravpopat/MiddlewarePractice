<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <form action="{{ route('userlogin') }}" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter Email">
        <br>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password" placeholder="Enter Password">
        <br>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <input type="submit" value="Login">
        
        @if (Session::has('success'))
            <p style="text-align: left;color: green;">
                {{ Session::get('success') }} </p>
        @endif
        @if (Session::has('error'))
            <p style="text-align: left;color: red;">
                {{ Session::get('error') }}</p>
        @endif
    </form>
</body>

</html>
