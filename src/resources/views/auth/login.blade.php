@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')
<div class="form__container user-form__container">
  <div class="form__title">
    <p class="form__title--text">
      Login
    </p>
  </div>
  <div class="user-form__wrapper">
    <form action="/login" method="post">
      @csrf
      <div class="user-form__group">
        <label class="user-form__detail-title" for="mail">メールアドレス</label>
        @if ($errors->has('email'))
          @foreach($errors->get('email') as $message)
          <p> {{ $message }} </p>
          @endforeach
        @endif
        <div class="user-form__detail-content">
        <input type="text" name="email" id="mail" value="{{ old('email') }}" placeholder="例:test@example.com">
        </div>
      </div>
      <div class="user-form__group">
        <label class="user-form__detail-title" for="tell">パスワード</label>
        <div class="user-form__detail-content">
          <input type="password" id="tell" name="password" value="{{ old('first_number') }}" placeholder="例:coachtech1106"/>
        </div>
      </div>
      <div class="user-form__group user-form__submit-button">
        <button type="submit">ログイン</button>
      </div>
    </form>
  </div>
</div>
@endsection
