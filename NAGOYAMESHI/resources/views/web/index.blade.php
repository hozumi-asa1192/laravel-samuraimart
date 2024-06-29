<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/758ba40309.js" crossorigin="anonymous"></script>

        <!-- stylesheet -->
        <link href="{{ asset('css\nagoyameshi.css')}}" rel="stylesheet">
    
    </head>
    <body class="nagoyamesi-bockground-img">
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm samuraimart-header-container">
     <div class="container">
         <a class="navbar-brand" href="{{ url('/') }}">
             {{ config('app.name', 'Laravel') }}
         </a>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mr-5 mt-2">
                 @guest
                     <li class="nav-item mr-5">
                         <a class="nav-link" href="{{ route('register') }}">登録</a>
                     </li>
                     <li class="nav-item mr-5">
                         <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                     </li>
                     <hr>
                     <li class="nav-item mr-5">
                         <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                     </li>
                 @else
                     <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('mypage') }}">
                            <label class="fw-bold">マイページ</label>
                        </a>
                     </li>
                     <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('subscription.create') }}">
                        <label class="fw-bold">有料会員</label>
                        </a>
                    </li>
                 @endguest
                </ul>
             </div>
        </div>
    </nav>
 <main class="py-4">
        <div class="d-flex justify-content-center align-items-center top-wrapper">
            <div class="d-flex justify-content-center">
                <div class="search-area px-5 py-4 position-absolute bottom-50">
                    <h1 class="text-center mt-2 text-white">名古屋のB級グルメを探す</h1>
                    <form action="{{route('shops.index')}}" method="get">
                    @csrf
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-2">
                    <select class="form-control form-select" name="category" id="category"> 
                        <option value="">カテゴリー</option>  
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="me-2 mb-2">
                        <input  type="text" class="form-control" placeholder="キーワード" name="keyword">
                    </div>
            
                <div class="mb-2">
                    <button type="submit" class="btn text-white shadow-sm w-20 nagoyameshi-btn">検索する</button>
                </div>
                    </form>
                    </div>    
                </div>
            </div>
        </div>
    </main>
    <nav class="navbar navbar-expand-md navbar-light bg-warning shadow fixed-bottom mt-5">
     <a class="navbar-brand mx-auto" href="{{ url('/') }}">
     {{ config('app.name', 'Laravel') }}
     </a>
    </nav>

    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
