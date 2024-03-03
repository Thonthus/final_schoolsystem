<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | BanNongJingleBell School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/953/953610.png" type="image/x-icon">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-4" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BanNongJingleBell School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">เข้าสู่ระบบ</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ Auth::user()->role == 'admin' ? '/dashboardAdmin' : '/dashboard' }}">เมนูหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="return confirm('ต้องการออกจากระบบใช่หรือไม่ ?')">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        style="border: none; background-color: transparent; color: rgb(155, 157, 160);">
                                        ออกจากระบบ
                                    </button>
                                </form>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>


        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Bai Jamjuree', sans-serif;
        background-image: url('images/FinalStudentCareBG.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
