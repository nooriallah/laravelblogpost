@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{ $title }}</h2>
            </div>
        </div>
        <div class="page-content">
            <section class="no-padding-top no-padding-bottom">

                @if (session('message'))
                    <script src="{{ asset('/admin/js/customscript.js') }}"></script>
                    <script>
                        showAlert(event, "Done");
                    </script>
                @endif

                <div class="container-fluid">
                    <form action="{{ route('store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Post title</label>
                            <input type="text" class="form-control bg-transparent" id="title" name="title"
                                placeholder="Write the post title here!">
                            @error('title')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Post description</label>
                            <textarea class="form-control bg-transparent" id="description" name="description" rows="6"
                                placeholder="Write the post description here"></textarea>
                            @error('description')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-group-prepend">
                                <label class="input- group-text" for="status">Status</label>
                            </div>
                            <select class="custom-select" id="status" name="status">
                                <option value="">Choose...</option>
                                <option value="active">Activate</option>
                                <option value="pend">Pend</option>
                            </select>
                        </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Post image</label>
                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control bg-transparent" id="image"
                        name="image">
                    @error('image')
                        <lable class="text-danger">{{ $message }}</lable>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" onclick="showAlert(evt)">Add</button>
                </form>


        </div>
        </section>
    </div>
    </div>
@endsection
