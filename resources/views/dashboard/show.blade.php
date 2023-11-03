@extends('dashboard.layouts.noNav')

@section('container')
    <div class="container mb-5">
        <p class="mt-4 mb-5">

            <a href="/dashboard/laundry/"
                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                    class="fa-solid fa-arrow-left me-2"></i> Kembali
            </a>
        </p>

        <a class="btn btn-warning " href="/dashboard/laundry/{{ Crypt::encrypt($laundry->id) }}/edit">Edit</a>
        <form action="/dashboard/laundry/{{ Crypt::encrypt($laundry->id) }}" id="delete" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger " onclick="delete_laundry()" type="button">
                Hapus<i class="bi bi-x-circle"></i>
            </button>
        </form>

        <div class="row">
            <div class="col-lg-8 mt-3">
                <img src="{{ asset('storage/' . $laundry->image) }}" class="img-fluid rounded" alt="">
                <div class="mt-3">
                    <h3 class="mb-2">Deskripsi</h3>
                    {!! $laundry->description !!}
                    @if ($haveService->count())
                        <h3 class="my-5"><i class="fa-solid fa-list"></i> Service</h3>
                        {{-- <h3>{{ $haveService }}</h3> --}}
                        <div class="row">
                            @foreach ($haveService as $gr)
                                <div class="col-6">
                                    <h5>✅{{ $gr->service->name }}</h5>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt-3 ">
                <div class="card p-4 border-warning border-2">
                    <h1 class="fw-bold mb-5">{{ $laundry->name }}</h1>
                    <div class="fs-5 fw-semibold">Infromasi <i class="fa-solid fa-circle-info"></i></div>
                    <hr>
                    <div class="fw-medium"><i class="fa-solid fa-location-dot"></i> Alamat : <span class="text-secondary">
                            {{ $laundry->location }}</span></div>
                    <div class="fw-medium"><i class="fa-solid fa-money-bill-wave"></i> Harga : <span
                            class="text-secondary">Rp{{ number_format($laundry->priceKg, 0, '', '.') }} / Kg</span></div>
                    <a class="btn btn-warning fw-semibold mt-5 mb-2" target="_blank"
                        href="https://api.whatsapp.com/send?phone=62{{ $laundry->phone }}"><i
                            class="fa-brands fa-whatsapp fa-xl"></i>
                        WhatsApp</a>
                    {{-- <a class="btn btn-outline-warning fw-semibold mb-1" target="_blank" href="https://api.whatsapp.com/send?phone={{ $laundry->phone }}"><i class="fa-brands fa-whatsapp fa-xl"></i> WhatsApp</a>                         --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function delete_laundry() {
            Swal.fire({
                title: 'Yakin Ingin Hapus?',
                icon: 'warning',
                showDenyButton: true,
                confirmButtonText: 'Ya',
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete").submit();
                } else if (result.isDenied) {
                    Swal.fire({
                        title: 'Batal',
                        icon: 'info',
                        timer: 1000,
                        showConfirmButton: false
                    })
                }
            })
        };
    </script>
@endsection
