@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="attendance__alert">
  {{ Auth::user()->name }}さんお疲れ様です!
</div>
<div class="attendance__content">
  <div class="attendance__panel">
    <form class="attendance__button" action="{{ route('timestamp.punchIn') }}" method="POST">
      @csrf
      @method('POST')
      @if (!$existTimestamp)
      <button class="attendance__button-submit" type="submit">勤務開始</button>
      @else
      <button class="attendance__button-submit" type="submit" disabled style="background:silver">勤務開始</button>
      @endif
    </form>
    <form class="attendance__button" action="{{ route('timestamp.punchOut') }}" method="POST">
      @csrf
      @method('POST')
      @if (!$existTimestamp)
      <button class="attendance__button-submit" type="submit">勤務終了</button>
      @else
      <button class="attendance__button-submit" type="submit" disabled style="background:silver">勤務終了</button>
      @endif
    </form>
  </div>
  <div class="attendance__panel">
    <form class="attendance__button" action="{{ route('timestamp.breakBegin') }}" method="POST">
      @csrf
      @method('POST')
      @if (!$existTimestamp)
      <button class="attendance__button-submit" type="submit">休憩開始</button>
      @else
      <button class="attendance__button-submit" type="submit" disabled style="background:silver">休憩開始</button>
      @endif
    </form>
    <form class="attendance__button" action="{{ route('timestamp.breakEnd') }}" method="POST">
      @csrf
      @method('POST')
      @if (!$existTimestamp)
      <button class="attendance__button-submit" type="submit">休憩終了</button>
      @else
      <button class="attendance__button-submit" type="submit" disabled style="background:silver">休憩終了</button>
      @endif
    </form>
  </div>
</div>
<footer class="footer">
  <div class="footer__inner">
    <small>Atte,inc.</small>
  </div>
</footer>
@endsection
</body>
</html>