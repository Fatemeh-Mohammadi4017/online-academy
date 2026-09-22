<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Academy</title>

    @vite(['resources/css/app.css', 'resources/css/welcome.css'])
</head>

<body>

    <header class="welcome-header">
        <h1> Online Academy</h1>

        <nav>
            <a href="{{ route('courses.index') }}">دوره‌ها</a>

            @auth
                <a href="{{ route('dashboard') }}">داشبورد</a>
            @else
                <a href="{{ route('login') }}">ورود</a>
                <a href="{{ route('register') }}">ثبت‌نام</a>
            @endauth
        </nav>
    </header>


    <main>

        <section class="hero">
            <h2>یادگیری آنلاین، ساده و کاربردی</h2>

            <a href="{{ route('courses.index') }}" class="hero-button">
                مشاهده دوره‌ها
            </a>
        </section>


        

    </main>

</body>
</html>