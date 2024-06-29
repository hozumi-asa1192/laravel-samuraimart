@extends('layouts.app')
 
 @section('content')
 <a class="h5 ms-5" href="{{ route('shops.index')}}">＜店舗一覧に戻る</a>
 <div class="container d-flex justify-content-center mt-3">
     <div class="w-50">
         <h1>マイページ</h1>
 
         <hr>
         @if( $user->subscribed('premium_plan'))
         <div class="container">
                <a href="{{route('mypage.edit')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">会員情報の編集</h3>
                            <p class="mb-0 text-secondary">メールアドレスや住所などを変更できます</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
 
         <hr>
 
         <div class="container">
                <a href="{{route('mypage.reservation')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-regular fa-calendar-days fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">予約履歴</h3>
                            <p class="mb-0 text-secondary">予約履歴を確認できます</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
 
         <hr>

         <div class="container">
                <a href="{{route('mypage.edit_password')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-lock fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">パスワード変更</h3>
                            <p class="mb-0 text-secondary">パスワードを変更します</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
         
        <hr>

        <div class="container">
                <a href="{{route('mypage.favorite')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-heart fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">お気に入り一覧</h3>
                            <p class="mb-0 text-secondary">お気に入り一覧を表示します</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
         
        <hr>

        <div class="container">
                <a href="{{route('subscription.create')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-user-pen fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">有料会員の支払方法変更</h3>
                            <p class="mb-0 text-secondary">有料会員の支払方法の変更を行います</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>

        <hr>

        <div class="container">
                <a href="{{route('subscription.cancel')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-user-xmark fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">有料会員の退会</h3>
                            <p class="mb-0 text-secondary">有料会員を退会します</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>


         <hr>

         <div class="container">
                <a href="{{ route('logout') }}" class="link-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fas fa-sign-out-alt fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">ログアウト</h3>
                            <p class="mb-0 text-secondary">ログアウトします</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
         
         <hr>
         @else

         <div class="container">
                <a href="{{route('mypage.edit')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">会員情報の編集</h3>
                            <p class="mb-0 text-secondary">メールアドレスや住所などを変更できます</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
 
         <hr>

         <div class="container">
                <a href="{{route('mypage.edit_password')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-lock fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">パスワード変更</h3>
                            <p class="mb-0 text-secondary">パスワードを変更します</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
         
        <hr>

        <div class="container">
                <a href="{{route('subscription.create')}}" class="link-dark">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fa-solid fa-user-plus fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">有料会員登録</h3>
                            <p class="mb-0 text-secondary">有料会員の登録を行います</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>

        <hr>
        
        <div class="container">
                <a href="{{ route('logout') }}" class="link-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="row justify-content-between align-items-center py-4 samuraimart-mypage-link">
                        <div class="col-1 ps-0 me-3">
                            <i class="fas fa-sign-out-alt fa-3x"></i>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <h3 class="mb-0">ログアウト</h3>
                            <p class="mb-0 text-secondary">ログアウトします</p>
                        </div>
                        <div class="col text-end">
                            <i class="fas fa-chevron-right fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <hr>
        @endif
     </div>
 </div>
 @endsection