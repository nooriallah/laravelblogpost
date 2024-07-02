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
                    <script>
                        showAlert(event, "Updated!", "{{ session('message') }}");
                    </script>
                @endif

                <div class="container-fluid">
                    <form action="{{ route('updateabout', $about->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                         
                        <div class="mb-3">
                            <label for="text" class="form-label">About text</label>
                            <textarea class="form-control bg-transparent" id="text" name="text" rows="6"
                                placeholder="Write the post text here">{{ $about->text }}</textarea>
                            @error('text')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">About image</label>
                            <img src="{{ asset("/admin/aboutimage/$about->image") }}" width="100" alt="Post image"
                                class="mb-3">
                            <input type="file" accept=".png, .jpg, .jpeg" class="form-control bg-transparent"
                                id="image" name="image">
                                @error('image')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


                </div>
            </section>
        </div>
    </div>
@endsection
