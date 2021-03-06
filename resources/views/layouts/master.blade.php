<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
</head>
<body>
<div id="app">
    <router-view></router-view>
    <receive-user user="{{\Illuminate\Support\Facades\Auth::user()->toJson()}}"/>
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>