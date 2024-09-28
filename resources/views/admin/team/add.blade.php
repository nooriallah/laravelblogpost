@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{ $title }}</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            @if (session('message'))
                <script src="{{ asset('/admin/js/customscript.js') }}"></script>
                <script>
                    showAlert(event, "Done");
                </script>
            @endif

            <div class="container-fluid">
                <form action="{{ route('team.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Member name</label>
                        <input type="text" class="form-control bg-transparent" id="name" name="name"
                            placeholder="Write name here!">
                        @error('name')
                            <lable class="text-danger">{{ $message }}</lable>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Post description</label>
                        <textarea class="form-control bg-transparent" id="description" name="description" rows="6"
                            placeholder="Write description here"></textarea>
                        @error('description')
                            <lable class="text-danger">{{ $message }}</lable>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="position" class="form-label">Member position</label>
                        <input type="text" class="form-control bg-transparent" id="position" name="position"
                            placeholder="Write position here!">
                        @error('position')
                            <lable class="text-danger">{{ $message }}</lable>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Member image</label>
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
@endsection
