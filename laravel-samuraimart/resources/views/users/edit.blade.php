@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-center">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
            </span>

            <h1 class="mt-3 mb-3">会員情報の編集</h1>
            <hr>
            <form method="post" action="{{ route('mypage')}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left samuraimart-edit-user-info-label">氏名</label>
                    </div>
                    <div class="collapse show editUserName">
                        <!-- autocomplateは自動入力を有効にする -->
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left samuraimart-edit-info-label">メールアドレス</label>
                    </div>
                    <div class="collapse show editUserMail">
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
                        @error('emai')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力したください</strong>
                        </span> 
                        @enderror   
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="postal_code" class="text-md-left samuraimart-edit-info-label">郵便番号</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code" autofocus placeholder="xxx-xxxxx">
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>郵便番号を入力してください</strong>
                        </span> 
                        @enderror   
                    </div>
                </div>
                <br>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="address" class="text-md-left samuraimart-edit-info-label">住所</label>
                    </div>
                    <div class="collapse show editUserMailPhone">
                        <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus placeholder="東京都渋谷区道玄坂x-x-x">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>住所を入力してください</strong>
                        </span> 
                        @enderror   
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="phone" class="text-md-left samuraimart-edit-info-label">電話番号</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus placeholder="xxx-xxxx-xxxxx">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>電話番号を入力してください</strong>
                        </span> 
                        @enderror   
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn samuraimart-submit-button mt-3 w-25">
                    保存
                </button>
            </form>
        </div>
    </div>
</div>
@endsection