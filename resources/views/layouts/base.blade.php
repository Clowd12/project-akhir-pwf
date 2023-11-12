<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>
    {{-- fontawesome --}}

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    {{-- sweetalert --}}

    {{-- trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    {{-- trix --}}
    <style>
        .message {
            padding: 15px 40px;
            background-color: #4e94fd;
            cursor: pointer;
            box-shadow: 0 7px #0d6efd;
        }

        .message:active {
            position: relative;
            top: 7px;
            box-shadow: none;
        }

        .btn2 {
            bottom: 36px;
            right: 3px;
            opacity: 0.8;
            color: white;
            position: fixed;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.75rem;
            text-align: center;
            display: inline-block;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        }

        .btn2:hover {
            opacity: 1;
        }

        .contact {
            background-color: #4e94fd;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">LAUNDRY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('laundry*') ? 'active' : '' }}" href="/laundry">Pencarian</a>
                    </li>

                </ul>
                <a class="btn btn-dark " href="/login">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('container')
    </main>

    <span class="btn2 contact" data-bs-toggle="modal" data-bs-target="#exampleModal" id="contact-button">
        <i class="fa-regular fa-envelope fa-lg"></i> Hubungi kami!
    </span>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header shadow-sm">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row gx-4">
                    <div class="col-lg-7">
                        <div>
                            <p class="mb-4 lh-lg col-sm-10">
                                <span class="text-danger">
                                    Kami akan berada pada periode libur, dari tanggal 17/11/2023 -
                                    31/11/2023, sehingga pesan yang anda kirim akan membutuhkan waktu yang
                                    lebih lama untuk direspon.
                                </span>
                            </p>
                            <p class="mb-4 lh-lg text-body-secondary">
                                Terima kasih sudah mengunjungi di website kami. Jika Anda memiliki
                                pertanyaan atau komentar, silahkan hubungi kami menggunakan formulir
                                ini.
                            </p>
                            <div class="text-center p-5 text-body-secondary">
                                <p class="fs-1 shadow-lg fst-italic">
                                    PESAN <i class="fa-regular fa-comments fa-2xl px-2"></i><i
                                        class="fa-solid fa-question fa-2xl px-2"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <form id="contact-form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-1" id="email_id" name="email_id"
                                    required />
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="from_name" name="from_name" class="form-control rounded-1"
                                    required />
                                <label for="from_name">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" style="height: 200px" required></textarea>
                                <label for="message">Pesan</label>
                            </div>
                            <input type="submit" class="btn btn-primary w-100" value="Kirim" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>
