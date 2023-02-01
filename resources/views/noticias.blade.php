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
                    <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">
                        <h2>Noticias do dia</h2>
                    </span>

                    <div id="carouerlId" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($userPost as $key=>$userPostItem )
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ url("storage/{$userPostItem->path}") }}" class="d-block w-100 rounded" alt="{{ $userPostItem->title }}">

                                <div class="col-md-6 mb-4">
                                    <h4><strong>{{ $userPostItem->title }}</strong></h4>
                                    <p class="text-muted">{{ $userPostItem->subTitle }}</p>
                                    <a href="{{ route('noticias.show', $userPostItem->id) }}">
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

    @foreach ($userPost as $post )

    <div class="post-preview">
        <a href="{{ route("noticias.show", $post->id) }}">
            <h2 class="post-title">{{ $post->title}}</h2>
            <h3 class="post-subtitle">{{ $post->subTitle }}</h3>
        </a>
        <p class="post-meta">
            Posted by {{ $post->name }}
            {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}
        </p>
    </div>
    <!-- Divider-->
    <hr class="my-4" />
    @endforeach
    {{ $userPost->links() }}


    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                </div>
            </div>
        </div>
    </footer>





</body>
</html>
