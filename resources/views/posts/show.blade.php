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
        </div>
    </div>
@endsection
