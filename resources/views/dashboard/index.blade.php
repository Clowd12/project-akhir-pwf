@extends('dashboard.layouts.base')

@section('container')
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @elseif(session()->has('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    <h1 class="mt-3 mb-5">Laundry Saya</h1>

    @if ($laundries->count())
        <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Buat Laundry
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi <i
                                class="fa-solid fa-exclamation fa-shake"></i></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="text-warning fw-medium">Berlangganan</span> untuk menambah laundry lagi
                    </div>
                </div>
            </div>
        </div>
    @else
        <a href="/dashboard/laundry/create" class="btn btn-dark mb-3">Buat Laundry</a>
    @endif
    @if ($laundries->count())
        <div class="table-responsive">
            <table class="table table-striped align-middle ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Laundry</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laundries as $laundry)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ asset('storage/' . $laundry->image) }}" width="100" class="rounded-1"
                                    alt=""></td>
                            <td>{{ $laundry->name }}</td>
                            <td>{{ $laundry->location }}</td>
                            <td>
                                <a
                                    class="btn btn-warning"href="/dashboard/laundry/{{ Crypt::encrypt($laundry->id) }}">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show rounded-0" role="alert">
            Laundry Masih Kosong! <a href="/dashboard/laundry/create" class="alert-link">Buat Laundry</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
