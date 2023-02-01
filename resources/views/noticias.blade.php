<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>
<body>

    @include('layouts.app')
    <section class="border-bottom pb-4 mb-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                    <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3"><h2>Noticias do dia</h2></span>

                        <div id="carouerlId" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($userPost as $key=>$userPost )
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ url("storage/{$userPost->path}") }}" class="d-block w-100 rounded" alt="{{ $userPost->title }}">

                                    <div class="col-md-6 mb-4">
                                        <h4><strong>{{ $userPost->title }}</strong></h4>
                                        <p class="text-muted">{{ $userPost->subTitle }}</p>
                                        <a href="{{ route('noticias.show', $userPost->id) }}">
                                            <button type="button" class="btn btn-primary">Leia Mais</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouerlId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouerlId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                </div>
            </div>
            <div class="col-md-2"></div>

        </div>

    </section>

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
