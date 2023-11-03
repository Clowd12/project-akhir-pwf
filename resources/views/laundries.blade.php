@extends('layouts.base')

@section('container')
    <h1 class="my-3 text-center">Laundries</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/laundry">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
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
    @endif
@endsection
