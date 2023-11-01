@extends('dashboard.layouts.base')

@section('container')
    <p class="mt-4 mb-3 fs-5">

        <a href="/dashboard/laundry/"
            class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                class="fa-solid fa-arrow-left me-2"></i> Kembali
        </a>
    </p>
    <h1 class="mt-3 mb-5">Laundry Baru</h1>


    <form action="/dashboard/super/courses" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-0 @error('title') is-invalid @enderror" name="title"
                    id="title">
                <input type="hidden" class="form-control rounded-0 @error('slug') is-invalid @enderror" name="slug"
                    id="slug">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-0 @error('location') is-invalid @enderror" name="location"
                    id="location">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control rounded-0 @error('price') is-invalid @enderror" name="price"
                    id="price">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <img class="img-preview img-fluid mb-3 col-sm-5">

                <input type="file" class="form-control rounded-0 @error('image') is-invalid @enderror" name="image"
                    id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" class="@error('body')border-danger @enderror"></trix-editor>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Kirim</button>
    </form>
@endsection
