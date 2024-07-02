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
                <form action="{{ route('updatesetting') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon</label>
                                <img src="{{ asset("admin/settingimages/$setting->icon") }}" width="30" class="mb-3">
                                <input type="file" accept=".png, .jpg, .jpeg" class="form-control bg-transparent"
                                    id="icon" name="icon">
                                @error('icon')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <img src="{{ asset("admin/settingimages/$setting->logo") }}" width="100" class="mb-3">
                                <input type="file" accept=".png, .jpg, .jpeg" class="form-control bg-transparent"
                                    id="logo" name="logo">
                                @error('logo')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control bg-transparent" id="email" name="email"
                                    value="{{ $setting->email }}">
                                @error('email')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" class="form-control bg-transparent" id="phone" name="phone"
                                    value="{{ $setting->phone }}">
                                @error('phone')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">facebook</label>
                                <input type="url" class="form-control bg-transparent" id="facebook" name="facebook"
                                    value="{{ $setting->facebook }}">
                                @error('facebook')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="instagram" class="form-label">instagram</label>
                                <input type="url" class="form-control bg-transparent" id="instagram" name="instagram"
                                    value="{{ $setting->instagram }}">
                                @error('instagram')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="youtube" class="form-label">youtube</label>
                                <input type="url" class="form-control bg-transparent" id="youtube" name="youtube"
                                    value="{{ $setting->youtube }}">
                                @error('youtube')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="linkedin" class="form-label">linkedin</label>
                                <input type="url" class="form-control bg-transparent" id="linkedin" name="linkedin"
                                    value="{{ $setting->linkedin }}">
                                @error('linkedin')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="twitter" class="form-label">twitter</label>
                                <input type="url" class="form-control bg-transparent" id="twitter" name="twitter"
                                    value="{{ $setting->twitter }}">
                                @error('twitter')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telegram" class="form-label">telegram</label>
                                <input type="url" class="form-control bg-transparent" id="telegram" name="telegram"
                                    value="{{ $setting->telegram }}">
                                @error('telegram')
                                    <lable class="text-danger">{{ $message }}</lable>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>

        </section>
    </div>
@endsection
