@extends('base')

@section('content')
    <div class="row g-5">
        <div class="col-md-10">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{ $post->title }}
            </h3>

            <div class="row">
                <div class="col-md-4 mb-2">
                    <img class="img-fluid shadow-sm" style="width: 100%; height: auto;" src="{{ $post->thumbnail }}"
                        alt="L'image de l'article qui a pour titre :{{ $post->title }}">
                </div>
                <div class="col-md-8">
                    <article class="blog-post shadow-sm">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-inline-block gap-2 mb-3">
                                        @if ($post->tags)
                                            @foreach ($post->tags as $tag)
                                                <span class="badge rounded-pill text-bg-dark">{{ $tag->name }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    @if ($post->category)
                                        <strong class="ms-auto text-secondary-emphasis"><a
                                                class="text-decoration-none text-secondary"
                                                href="{{ route('postByCategory', ['category' => $post->category]) }}">{{ $post->category->name }}</a></strong>
                                    @endif
                                </div>
                                <div class="mb-1 text-body-secondary mb-3">{{ $post->created_at->diffForHumans() }}</div>
                                <p class="card-text mb-auto">{!! nl2br(e($post->description)) !!}</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <hr>
            <h3 class="lead h5 text-s ml-0">Voulez vous rajouter quelque chose ?</h3>
            @guest
                <code class="card text-danger w-50 p-3">Connectez vous pour pouvoir laissez un commentaire ...</code>
            @endguest
            @auth
                <form action="{{ route('posts.comment', ['slug' => $post->slug, 'post' => $post->id]) }}" method="post"
                    class="d-flex gap-3">
                    @csrf
                    @method('POST')
                    <input @required(true) type="text" name="content" id="content" class="form-control w-50"
                        placeholder="Ecrivrez votre commentaire ici">
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button class="btn btn-sm btn-warning d-inline-block" type="submit">📤 Commentez</button>
                </form>
            @endauth

            @if ($post->comments->count() > 0)
                @foreach ($post->comments as $comment)
                    <div class="card shadow-sm mt-3 p-3 bg-light col-10 mb-5">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <h2 class="text-success h5">{{ $comment->user->name }}</h2>
                            <h2 class="lead h5 text-s">{{ $comment->created_at->diffForHumans() }}</h2>
                        </div>
                        <p class=" p-2">{{ $comment->content }}.</p>

                    </div>
                @endforeach
            @else
                <div class="alert alert-warning px-3 mt-3 w-50" role="alert">
                    <strong>Pas de commentaire pour ce post actuelement ...</strong>
                </div>
            @endif


        </div>
    </div>
@endsection
