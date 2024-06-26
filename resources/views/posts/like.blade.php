<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SNS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="likeposts"></x-slot>
    <body>
        <h1>いいねした投稿</h1>
    </body>
    </x-app-layout>
</html>