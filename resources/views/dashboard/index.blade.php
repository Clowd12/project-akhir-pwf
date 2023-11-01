@extends('dashboard.layouts.base')

@section('container')
    <h1 class="mt-3 mb-5">Laundry Saya</h1>

    <a href="/dashboard/laundry/create" class="btn btn-dark mb-3">Buat Laundry</a>

    @if ($laundries->count())
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pemateri</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laundries as $course)
                        {{-- <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->speaker->user->name }}</td>
                            <td>
                                <a class="btn btn-outline-primary rounded-0"
                                    href="/dashboard/super/courses/{{ $course->slug }}">Lihat</a>

                            </td>
                        </tr> --}}
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
