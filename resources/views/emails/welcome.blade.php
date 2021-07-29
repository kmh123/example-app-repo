<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title> welcome here </title>
    </head>

    <h1> Welcome here {{ $user->name; }} </h1>

</html>  