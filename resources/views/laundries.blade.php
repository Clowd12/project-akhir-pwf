@extends('layouts.base')

@section('container')
    <h1 class="my-3 text-center">Laundries</h1>
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="/laundry">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </div>
                <div class="row mb-3">
                    @foreach ($services as $gr)
                        <div class="col-4">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" class="form-check-input" name="service[]"
                                            value="{{ $gr->id }}"
                                            @if (request('service')) @foreach (request('service') as $have)
                                                @if ($have == $gr->id) checked @endif
                                            @endforeach
                    @endif>
                    {{ $gr->name }}
                    </label>
                </div>
        </div>
    </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-8">
            <select class="form-select" name="sort" aria-label="Default select example">
                <option value="">Urutkan Harga</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Termurah</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Termahal</option>
            </select>
        </div>
        <div class="col-4">
            <a class="btn btn-dark" href="/laundry">Reset</a>
        </div>
    </div>
    </form>
    </div>
    </div>
    @if ($laundries->count())
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($laundries as $laundry)
                <div class="col">
                    <div class="card h-100 card-course">
                        <img src="{{ asset('storage/' . $laundry->image) }}" height="180" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <div class="fw-semibold mb-3">{{ mb_strimwidth($laundry->name, 0, 58, '...') }}</div>
                            <div class="text-secondary">Rp{{ number_format($laundry->priceKg, 0, '', '.') }}/Kg</div>
                            <div class="text-secondary mt-2">{{ mb_strimwidth($laundry->location, 0, 58, '...') }}</div>
                        </div>
                        <div class="card-footer border-0 bg-light">
                            <div class="text-center">
                                <a href="/laundry/{{ Crypt::encrypt($laundry->id) }}" class="btn btn-outline-primary">Lihat
                                    Selengkapnya</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Pencarian <span class="fw-bold">{{ request('search') }}</span> Tidak ditemukan
        </div>
    @endif
@endsection
