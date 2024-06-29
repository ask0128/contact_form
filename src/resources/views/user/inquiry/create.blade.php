@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-form.css') }}">
@endsection

@section('content')
<div class="form__container">
  <div class="form__title">
    <p class="form__title--text">
      Contact
    </p>
  </div>
  <div class="input-form__wrapper">
    <form action="{{ route('confirm') }}" method="post">
      @csrf
      <div class="input-form__group">
        <label class="input-form__detail-title" for="name">お名前</label>
        <div class="input-form__detail-content">
          <input type="text" name="first_name" id="name" value="{{ old('first_name') }}" placeholder="例:山田">
          @if ($errors->has('first_name'))
            @foreach($errors->get('first_name') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
        <div class="input-form__detail-content">
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例:太郎">
          @if ($errors->has('last_name'))
            @foreach($errors->get('last_name') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="gender">性別</label>
        <div class="input-form__detail-content">
          <label>
          <input type="radio" name="gender" id="gender_male" value="1" {{ old('gender', '1') === '1' ? 'checked' : '' }}>
            男性
          </label>
          <label>
            <input type="radio" name="gender" id="gender_female" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>
            女性
          </label>
          <label>
            <input type="radio" name="gender" id="gender_female" value="3" {{ old('gender') === '3' ? 'checked' : '' }}>
            その他
          </label>
          @if ($errors->has('gender'))
            @foreach($errors->get('gender') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="mail">メールアドレス</label>
        <div class="input-form__detail-content">
        <input type="text" name="email" id="mail" value="{{ old('email') }}" placeholder="例:test@example.com">
          @if ($errors->has('email'))
            @foreach($errors->get('email') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="tell">電話番号</label>
        <div class="input-form__detail-content">
          <input type="tel" id="tell" name="first_number" value="{{ old('first_number') }}" placeholder="080"/>
          &nbsp;-&nbsp;
          <input type="tel" id="tell" name="middle_number" value="{{ old('middle_number') }}" placeholder="1234"/>
          &nbsp;-&nbsp;
          <input type="tel" id="tell" name="last_number" value="{{ old('last_number') }}" placeholder="5678"/>
          @if ($errors->has('phone_number_input'))
              <p>{{ $errors->first('phone_number_input') }}</p>
          @endif
          @if ($errors->has('phone_number_format'))
              <p>{{ $errors->first('phone_number_format') }}</p>
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="address">住所</label>
        <div class="input-form__detail-content">
        <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3"/>
          @if ($errors->has('address'))
            @foreach($errors->get('address') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="building">建物名</label>
        <input type="text" id="building" name="building" value="{{ old('building') }}" placeholder="例:千駄ヶ谷マンション101"/>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="inquiry-type">お問い合わせ内容の種類</label>
        <div class="input-form__detail-content">
        <select name="category_id" id="inquiry-type" class="">
            <option disabled selected value>選択してください</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{$category->content}}
            </option>
            @endforeach
        </select>
          @if ($errors->has('category_id'))
            @foreach($errors->get('category_id') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group">
        <label class="input-form__detail-title" for="input-detail">お問い合わせ内容
        </label>
        <div class="input-form__detail-content">
        <textarea id="input-detail" name="detail" placeholder="例:千駄ヶ谷マンション101">{{ old('detail') }}</textarea>
          @if ($errors->has('detail'))
            @foreach($errors->get('detail') as $message)
            <p> {{ $message }} </p>
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-form__group input-form__submit-button">
        <button type="submit">送信</button>
      </div>
    </form>
  </div>
</div>
@endsection
