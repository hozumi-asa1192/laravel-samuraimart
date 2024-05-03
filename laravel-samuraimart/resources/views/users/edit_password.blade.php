@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('mypage.update_password' )}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group row mb-3">
            <label for="password" class="col-md-3 col-form-label text-md-right">新しいパスワード</label>

            <div class="col-md-7">
                <input type="password" name="password" id="password" required autocomplete="new-password" class="form-control">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="password_confirm" class="col-md-3 col-form-label text-md-right">確認用</label>

            <div class="col-md-7">
                <input type="password" name="password_confirmation" id="password_confirm" required autocomplete="new-password" class="form-control">           
            </div>
        </div>

        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-danger w-25">
                パスワード更新
            </button>
        </div>
    </form>
</div>
@endsection