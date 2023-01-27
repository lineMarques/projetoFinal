@if($post->image)
<img src="{{ url("noticias/{$post->id}/storage{$post->image}") }}" alt="{{ $post->title }}">
@endif

id Post: {{ $post->id }}<br>
titulo: {{ $post->title }}<br>
sub :{{ $post->subTitle }}<br>
{{ $post->user()->get('name') }} <br>
criado em :{{ $post->created_at }}<br>

