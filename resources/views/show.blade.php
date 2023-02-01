
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<img src="{{ url("storage/{$image->path}") }}">

<form action="{{ route('noticias.store') }}">
    <div class="form-group">
        <h1 for="title">{{ $post->title }}</h1>
    </div>
    <div class="form-group">
        <h2 for="subTitle">{{ $post->subTitle }}</h2>
    </div>

    <div class="form-group">
        <label for="subTitle">Autor</label>
        <input type="text" class="form-control p-2" name="subTitle" value="{{ $user['name'] }}">
    </div>
    <div>{{ $post->created_at }}</div>
    <a href="{{ route("noticias.index", $post->id) }}">
        <button type="button" class="m-2 btn btn-primary">Voltar</button>
    </a>
</form>

<main class="my-5">
    <div class="container">
      <!--Section: News of the day-->
      <section class="border-bottom pb-4 mb-5">
        <div class="row gx-5">
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
              <img src="https://mdbootstrap.com/img/new/slides/080.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
            <h4><strong>Facilis consequatur eligendi</strong></h4>
            <p class="text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
              eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
              sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
            </p>
            <button type="button" class="btn btn-primary">Read more</button>
          </div>
        </div>
      </section>
      <!--Section: News of the day-->

      <!--Section: Content-->
      <section>
        <div class="row gx-lg-5">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <!-- News block -->
            <div>
              <!-- Featured image -->
              <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/fluid/city/113.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>

              <!-- Article data -->
              <div class="row mb-3">
                <div class="col-6">
                  <a href="" class="text-info">
                    <i class="fas fa-plane"></i>
                    Travels
                  </a>
                </div>

                <div class="col-6 text-end">
                  <u> 15.07.2020</u>
                </div>
              </div>

              <!-- Article title and description -->
              <a href="" class="text-dark">
                <h5>This is title of the news</h5>

                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, iste aliquid. Sed
                  id nihil magni, sint vero provident esse numquam perferendis ducimus dicta
                  adipisci iusto nam temporibus modi animi laboriosam?
                </p>
              </a>

              <hr />





