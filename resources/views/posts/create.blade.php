<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SNS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="create">
    </x-slot>
    <body>
        <h1>post name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>投稿内容</h2>
                <textarea name="post[body]" placeholder="このプレイリストを見てください。"></textarea>
            </div>
            <input type="submit" value="投稿する">
            </input>
        </form>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>