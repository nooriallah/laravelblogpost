@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{ $title }}</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            @if ($teams->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h3>No team member, <a href="{{ route('team.create') }}" class="underline">create new</a> </h3>
                </div>
            @else
                @if (session('message'))
                    <script src="{{ asset('/admin/js/customscript.js') }}"></script>
                    <script>
                        showAlert(event, "Deleted", "{{ session('message') }}");
                    </script>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block margin-bottom-sm">
                                <div class="title d-flex justify-content-between">
                                    <strong>All members</strong>
                                    <div>
                                        <a href="{{ route('team.create') }}" class="btn btn-sm btn-outline-info">Add new
                                            <i class="fa fa-plus"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Full name</th>
                                                <th>Description</th>
                                                <th>Position</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($teams as $team)
                                                <tr>
                                                    <td>{{ $team->id }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($team->name, 30, '...') }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($team->description, $limit = 200, $end = '...') }}
                                                    </td>
                                                    <td>{{ $team->position }}</td>
                                                    <td>
                                                        <img width="70" height="70"
                                                            src="{{ asset("/admin/team/$team->image") }}" alt="Post image">
                                                    </td>
                                                    <td style="width: 140px">

                                                        {{-- <a href="{{ route('team.destroy2', $team->id) }}" title="Delete"
                                                            class="btn btn-sm btn-outline-danger fa fa-trash "
                                                            onclick="showConfirm(event)">
                                                        </a> --}}

                                                        <form action="{{ route('team.destroy', $team->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger fa fa-trash" onclick="showConfirm(event)"></button>
                                                        </form>

                                                        <a href="{{ route('team.edit', $team->id) }}" title="Edit"
                                                            class="btn btn-sm btn-outline-info fa fa-edit">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="mt-5 text-center">
                                        <strong style="width: 360px">
                                            {{-- {{ $teams->links() }} --}}
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
