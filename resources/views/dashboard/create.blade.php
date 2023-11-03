@extends('dashboard.layouts.noNav')

@section('container')
    <p class="mt-4 mb-3">

        <a href="/dashboard/laundry/"
            class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                class="fa-solid fa-arrow-left me-2"></i> Kembali
        </a>
    </p>
    <h1 class="mt-3 mb-5">Laundry Baru </h1>

    <form action="/dashboard/laundry" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Nama Laundry<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                    id="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Nomor WA<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="number" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                        id="phone" placeholder="8**********">
                </div>

                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="number" class="col-sm-2 col-form-label">Layanan</label>
            <div class="col-sm-10 row">
                @foreach ($services as $gr)
                    <div class="col-4">
                        <div class="form-check">
                            <div class="checkbox">
                                <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" class="form-check-input" name="service[]"
                                        value="{{ $gr->id }}"> {{ $gr->name }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mb-3">
            <label for="priceKg" class="col-sm-2 col-form-label">Harga Per Kilo<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="number" class="form-control  @error('priceKg') is-invalid @enderror" name="priceKg"
                    id="priceKg">
                @error('priceKg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="location" class="col-sm-2 col-form-label">Lokasi<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control  @error('location') is-invalid @enderror" name="location"
                    id="location">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="open" class="col-sm-2 col-form-label">Buka Jam<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="time" class="form-control  @error('open') is-invalid @enderror" name="open"
                    id="open">
                @error('open')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="close" class="col-sm-2 col-form-label">Tutup Jam<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="time" class="form-control  @error('close') is-invalid @enderror" name="close"
                    id="close">
                @error('close')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Gambar<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <img class="img-preview img-fluid mb-3 col-sm-5">

                <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image"
                    id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description" class="@error('description')border-danger @enderror"></trix-editor>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="d-flex">

            <button type="submit" class="btn btn-dark ms-auto mb-3">Kirim</button>
        </div>
    </form>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
