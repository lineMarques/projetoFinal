<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>



    @include('layouts.app')

    {{ $userPost->links() }}

    <hr>

    @foreach ($userPost as $userPost)

    id Post: {{ $userPost->id }}<br>
    titulo: {{ $userPost->title }}<br>
    sub :{{ $userPost->subTitle }}<br>
    Por: {{ $userPost->name }} <br>
    criado em :{{ $userPost->created_at }}<br>

    <img src="{{ url("storage{$userPost->image}") }}" alt="{{ $userPost->title }}">


    <a href="{{ route('noticias.show', $userPost->id) }}">Ver</a><br><br>

    @endforeach


</body>
</html>
