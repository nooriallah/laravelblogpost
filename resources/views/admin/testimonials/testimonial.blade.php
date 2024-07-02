@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{ $title }}</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            @if ($testimonials->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h3>No testimonials, <a href="{{ route('createtesti') }}" class="underline">create new</a> </h3>
                </div>
            @else
                @if (session('message'))
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
                                        <a href="{{ route('createtesti') }}" class="btn btn-sm btn-outline-info">New
                                            testimonials <i class="fa fa-plus"></i></a>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Quotation</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($testimonials as $testi)
                                                <tr>
                                                    <td>{{ $testi->id }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($testi->name, 30, '...') }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($testi->quotation, $limit = 200, $end = '...') }}
                                                    </td>
                                                    <td>
                                                        <img width="70" height="70"
                                                            src="{{ asset("admin/testi/$testi->image") }}" alt="Post image">
                                                    </td>
                                                    <td style="width: 100px">
                                                        <a href="{{ route('deletetesti', $testi->id) }}" title="Delete"
                                                            class="btn btn-sm btn-outline-danger fa fa-trash "
                                                            onclick="showConfirm(event)">
                                                        </a>

                                                        <a href="{{ route('edittesti', $testi->id) }}" title="Edit"
                                                            class="btn btn-sm btn-outline-info fa fa-edit">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="mt-5 text-center">
                                        <strong style="width: 360px">
                                            {{-- {{ $testis->links() }} --}}
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
