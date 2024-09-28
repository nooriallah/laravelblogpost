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
                        showAlert(event, "Done", "{{ session('message') }}");
                    </script>
                @endif

                <div class="container-fluid">
                    <form action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Member name</label>
                            <input type="text" class="form-control bg-transparent" id="name" name="name"
                                placeholder="Write  name here!" value="{{ $team->name }}">
                            @error('name')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control bg-transparent" id="description" name="description" rows="6"
                                placeholder="Write the post description here">{{ $team->description }}</textarea>
                            @error('description')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="position" class="form-label">Member position</label>
                            <input type="text" class="form-control bg-transparent" id="position" name="position"
                                placeholder="Write position here!" value="{{ $team->postion }}">
                            @error('position')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <p>Current image</p>
                            <img src="{{ asset("/admin/team/$team->image")}}" class="mb-3" width="100">
                            <label for="image" class="form-label">Select new image</label>
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
