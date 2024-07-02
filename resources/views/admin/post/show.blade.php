@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{ $title }}</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            @if ($posts->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h3>No post, <a href="{{ route('create') }}" class="underline">create new</a> </h3>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                @if (session('message'))
                    <script src="{{ asset('/admin/js/customscript.js') }}"></script>
                    <script>
                        showAlert(event, "Done", "{{ session('message') }}");
                    </script>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block margin-bottom-sm">
                                <div class="title d-flex justify-content-between">
                                    <strong>All posts</strong>
                                    <div>
                                        <a href="{{ route('create') }}" class="btn btn-sm btn-outline-info">Add new <i
                                                class="fa fa-plus"></i></a>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td>{{ $post->id }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($post->title, 30, '...') }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($post->description, $limit = 200, $end = '...') }}
                                                    </td>
                                                    <td>{{ $post->status }}</td>
                                                    <td><img width="70" height="70"
                                                            src="{{ asset("/postimages/$post->image") }}" alt="Post image">
                                                    </td>
                                                    <td style="width: 100px">

                                                        <a href="{{ route('delete', $post->id) }}" title="Delete"
                                                            class="btn btn-sm btn-outline-danger fa fa-trash "
                                                            onclick="showConfirm(event)">
                                                        </a>

                                                        <a href="{{ route('edit', $post->id) }}" title="Edit"
                                                            class="btn btn-sm btn-outline-info fa fa-edit">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="mt-5 text-center">
                                        <strong style="width: 360px">
                                            {{ $posts->links() }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif


        </section>
    </div>
@endsection
