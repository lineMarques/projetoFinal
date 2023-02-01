@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Notícia') }}</div>

                @if (session('msg'))
                <p class="msg">{{ session('msg') }} </p>
                @endif

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control p-2" name="title" aria-describedby="form-post">
                        </div>
                        <div class="form-group">
                            <label for="subTitle">Sub-título</label>
                            <input type="text" class="form-control p-2" name="subTitle">
                        </div>
                        <div class="form-group">
                            <label for="content">Notícia</label>
                            <input type="text" class="form-control p-2" name="content">
                        </div>
                        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="path"></label>
                                <input type="file" class="form-control-file p-2" name="path" aria-describedby="form-post">
                            </div>
                            <button type="submit" class="m-2 btn btn-primary">Enviar</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
