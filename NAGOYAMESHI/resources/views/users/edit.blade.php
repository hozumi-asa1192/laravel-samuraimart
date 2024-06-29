@extends('layouts.app')

@section('content')
<a class="h5 ms-5" href="{{route('mypage')}}">＜戻る</a>
 <div class="container pt-2">
     <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="mb-3">会員情報の編集</h1>

            <hr class="mb-4">

            <form method="POST" action="{{ route('mypage') }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-left fw-medium">氏名<span class="ms-2 fw-bold text-danger">必須</span></label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samuraimart-login-input" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>氏名を入力してください</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-md-5 col-form-label text-md-left fw-medium">メールアドレス<span class="ms-2 fw-bold text-danger">必須</span></label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="samurai@samurai.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>メールアドレスを入力してください</strong>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="postal_code" class="col-md-5 col-form-label text-md-left fw-medium">郵便番号<span class="ms-2 fw-bold text-danger">必須</span></label>

                    <div class="col-md-7">
                        <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror samuraimart-login-input" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code" placeholder="150-0043">

                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>郵便番号を入力してください</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="address" class="col-md-5 col-form-label text-md-left fw-medium">住所<span class="ms-2 fw-bold text-danger">必須</span></label>

                    <div class="col-md-7">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror samuraimart-login-input" name="address" value="{{ $user->address }}" required autocomplete="address" placeholder="東京都渋谷区道玄坂２丁目１１−１">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>住所を入力してください</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="phone" class="col-md-5 col-form-label text-md-left fw-medium">電話番号<span class="ms-2 fw-bold text-danger">必須</span></label>

                    <div class="col-md-7">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror samuraimart-login-input" name="phone" value="{{ $user->phone }}" required autocomplete="phone" placeholder="03-5790-9039">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>電話番号を入力してください</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <hr class="mb-4">

                <div class="d-grid gap-2 col-3 mx-auto">
                    <button type="submit" class="btn btn-warning">
                        保存
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection