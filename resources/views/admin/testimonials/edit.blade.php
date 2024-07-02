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
                    <form action="{{ route('updatetesti', $testi->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="image" class="form-label">Client image</label>
                            <img src="{{ asset("admin/testi/$testi->image") }}" width="100" class="mb-3">
                            <input type="file" accept=".png, .jpg, .jpeg" class="form-control bg-transparent"
                                id="image" name="image">
                            @error('image')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control bg-transparent" id="name" name="name"
                                value="{{ $testi->name }}">
                            @error('name')
                                <lable class="text-danger">{{ $message }}</lable>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="quotation" class="form-label">Quotation</label>
                            <textarea class="form-control bg-transparent" id="quotation" name="quotation" rows="6">{{ $testi->quotation }}</textarea>
                            @error('quotation')
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
