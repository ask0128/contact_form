@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-form.css') }}">
@endsection
@section('content')
<div class="form__container">
  <div class="form__title">
    <p class="form__title--text">
      Confirm
    </p>
  </div>
  <form class="form" action="{{ route('thanks') }}" method="post">
  @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="name" value="{{ $inquiry['first_name'] . ' ' . $inquiry['last_name'] }}" disabled/>
            <input type="hidden" name="first_name" value="{{ $inquiry['first_name'] }}" />
            <input type="hidden" name="last_name" value="{{ $inquiry['last_name'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="hidden" name="gender" value="{{ $inquiry['gender']}}" />
            @switch($inquiry['gender'])
                @case(1)
                    <p>男性</p>
                    @break
                @case(2)
                    <p>女性</p>
                    @break
                @case(3)
                    <p>その他</p>
                    @break
            @endswitch
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="hidden" name="email" value="{{ $inquiry['email']}}" />
            <input type="email" name="email" value="{{ $inquiry['email']}}" disabled/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $inquiry['first_number'] . $inquiry['middle_number']. $inquiry['last_number']}}" disabled/>
            <input type="hidden" name="first_number" value="{{ $inquiry['first_number'] }}" />
            <input type="hidden" name="middle_number" value="{{ $inquiry['middle_number'] }}" />
            <input type="hidden" name="last_number" value="{{ $inquiry['last_number'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="hidden" name="address" value="{{ $inquiry['address']}}" />
            <input type="text" name="address" value="{{ $inquiry['address']}}" disabled/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $inquiry['building'] ?? ''}}" />
            <input type="text" name="building" value="{{ $inquiry['building'] ?? ''}}" disabled/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category_id" value="{{ $category->id}}" />
            <input type="text" value="{{ $category->content}}" disabled/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $inquiry['detail']}}" />
            <input type="text" name="detail" value="{{ $inquiry['detail']}}" disabled/>
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
    <div class="form__button">
    <button type="submit" name='back' value="back">戻る</button>
    </div>
  </form>
</div>
    @endsection
