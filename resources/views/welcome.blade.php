<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>Login</div>
    <strong>{{ Session::get('error') }}</strong>
    <br>
    <form action="{{ route('user.login') }}" method="POST">
        @csrf
        <div>
            <span>{{ $errors->first('email') }}</span>
            <input type="text" placeholder="email" name="email" value="{{ old('email') }}">
        </div>
        <br>
        <div>
            <span>{{ $errors->first('password') }}</span>
            <input type="password" placeholder="password" name="password">
        </div>
        <br>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
