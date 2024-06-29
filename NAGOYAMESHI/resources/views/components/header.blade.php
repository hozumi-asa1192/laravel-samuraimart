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