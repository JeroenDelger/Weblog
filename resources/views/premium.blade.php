@extends('layout')
@section('content')
<table>
    <thead id='register'>
        <th>Naam</th>
        <th>Wachtwoord</th>
        <th>Herhaal Wachtwoord</th>
    </thead>


    <tbody>
        <form method='POST' action='/overview'>
            @csrf
            <td><input id='Username' type="text" name="username" minlength="3" required value="{{old('username')}}"></input></td>
            <td><input id='Password' type="text" name="password" minlength="3" required value=""></input></td>
            <td><input id='PasswordRepeat' type="text" name="password" minlength="3" required value=""></input></td>
            <td><input type="submit"></td>
        </form>
    </tbody>
</table>
@endsection