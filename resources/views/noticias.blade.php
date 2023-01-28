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
    @foreach ($userPost as $userPost)


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header m-2">{{ __("$userPost->title") }}</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form action="{{ route('noticias.store') }}">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" class="form-control p-2" name="title" aria-describedby="form-post" value="{{ $userPost->title }}">
                            </div>
                            <div class="form-group">
                                <label for="subTitle">Sub-título</label>
                                <input type="text" class="form-control p-2" name="subTitle" value="{{ $userPost->subTitle }}">
                            </div>

                            <div class="form-group">
                                <label for="subTitle">Autor</label>
                                <input type="text" class="form-control p-2" name="subTitle" value="{{ $userPost->name }}">
                            </div>
                            <div>{{ $userPost->created_at }}</div>
                            <a href="{{ route("noticias.show", $userPost->id) }}">
                                <button type="button" class="m-2 btn btn-primary">Ler Mais</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</body>
</html>
