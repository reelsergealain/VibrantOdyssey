@extends('base')

@section('content')

<div class="d-flex -align-item-center justify-content-between">
        <h2>Administration des posts</h2>
        <div><a class="btn btn-dark btn-sm" href="{{ route('admin.posts.create') }}">ajouter un post</a></div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titre du posts</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <div class="f-flex float-end">
                            <td><a class="btn btn-success btn-sm"
                                    href="{{ route('posts.show', ['slug' => $post->slug, $post]) }}">Voir l'article</a></td>
                            <td><a class="btn btn-warning btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editer</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger btn-sm"
                                    href="{{ route('admin.posts.destroy', $post) }}">Supprimer</a>
                                </form>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
