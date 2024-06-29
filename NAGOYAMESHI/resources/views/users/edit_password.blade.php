@extends('layouts.app')

@section('content')
<a class="h5 ms-5" href="{{route('mypage')}}">＜戻る</a>

<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="mb-3">パスワード変更</h1>

            <hr class="mb-4">

            <form method="post" action="{{ route('mypage.update_password') }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group row mb-3">
                    <label for="password" class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード</label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード（確認用）</label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control samuraimart-login-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <hr class="mb-4">

                <div class="d-grid gap-2 col-3 mx-auto">
                    <button type="submit" class="btn btn-warning">
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection