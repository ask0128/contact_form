@extends('layouts.app')
@extends('admin.modal')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endsection
@section('content')
<div class="form__container">
  <div class="form__title">
    <p class="form__title--text">
      Admin
    </p>
  </div>
  <div>
    <form action="{{ route('search')}}" method="post">
    @csrf
      <input type="text" name="keyword" value="" placeholder="名前やメールアドレスを入力してください"/>
      <select name="gender" id="inquiry-type" class="">
          <option disabled selected value>性別</option>
          <option value="1">男性</option>
          <option value="2">女性</option>
          <option value="3">その他</option>
      </select>
      <select name="category_id" id="inquiry-type" class="">
          <option disabled selected value>お問い合わせの種類</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">
            {{$category->content}}
          </option>
          @endforeach
      </select>
      <!-- <input type="text" id="datepicker" class="form-control" placeholder="Select date"> -->
      <button type="submit">検索</button>
      <a href="{{ route('index')}}">リセット</a>
    </form>
  </div>
  <div>
    <table>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせ</th>
        <th></th>
      </tr>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->last_name.$contact->first_name }}</td>
        @switch($contact['gender'])
        @case(1)
          <td>男性</td>
        @break
        @case(2)
          <td>女性</td>
        @break
        @case(3)
          <td>その他</option>
        @break
        @endswitch
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->detail }}</td>
        <td><button class="button js-modal-button" data-contact-id="{{ $contact->id }}">詳細</button></td>
      </tr>
      @endforeach
    </table>
    <p>{{ $contacts->links() }}</p>
  </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection
