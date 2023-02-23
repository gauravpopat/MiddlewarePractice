<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="{{route('userregister')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter Name">
        @error('name')
            <p style="display: inline; color:red; text-align: left;">{{$message}}</p>
        @enderror
        <br>
        <input type="email" name="email" id="email" placeholder="Enter Email">
        @error('email')
            <p style="display: inline; color:red; text-align: left;">{{$message}}</p>
        @enderror
        <br>
        <input type="password" name="password" id="password" placeholder="Enter Password">
        @error('password')
            <p style="display: inline; color:red; text-align: left;">{{$message}}</p>
        @enderror
        <br>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password">
        <br>
        <input type="submit" value="Register">
    </form>
</body>
</html>