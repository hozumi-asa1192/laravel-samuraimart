<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm samuraimart-header-contenier">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/')}}">
                        <img src="{{ asset('img\logo.jpg')}}">
                    </a>
                    <form action="{{ route('products.index')}}" method="get" class="row g-1">
                        <div class="col-auto">
                            <input name="keyword" class="form-control samuraimart-header-search-input">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn samuraimart-header-search-button"><i class="fas fa-search samuraimart-header-search-icon"></i></button>
                        </div>
                    </form>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation')}}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mr-5 mt-2">
                            <!-- guestはユーザー認証されているかどうかを判断guest~else~endguestでelseの左は非認証、右が認証になる -->
                            @guest
                                <li class="nav-item mr-5">
                                    <a href="{{ route('register')}}" class="nav-link">登録</a>
                                </li>
                                <li class="nav-item mr-5">
                                    <a href="{{ route('login')}}" class="nav-link">ログイン</a>
                                </li>
                                <hr>
                                <li class="nav-item mr-5">
                                    <a href="{{ route('login')}}" class="nav-link"><i class="far fa-heart"></i></a>
                                </li>
                                <li class="nav-item mr-5">
                                    <a href="{{ route('login')}}" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
                                </li>
                            @else
                               <li class="nav-item mr-5">
                                    <a class="nav-link" href="{{ route('mypage') }}">
                                        <i class="fas fa-user mr-1"></i><label>マイページ</label>
                                    </a>
                               </li>
                               <li class="nav-item mr-5">
                                <a class="nav-link" href="{{ route('mypage.favorite') }}">
                                    <i class="far fa-heart mt-1"></i>
                                </a>
                               </li>
                               <li class="nav-item mr-5">
                                <a class="nav-link" href="{{ route('carts.index') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                               </li>
                             @endguest
                        </ul>
                    </div>
                </div>
            </nav>