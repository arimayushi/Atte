@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
@endsection

@section('content')
<div class="Atte__content">
  <div class="Atte__heading">
    <h2></h2>
  </div>
<form class="form" action="/attendance" method="post">
  @csrf
  <div class="attendance__content">
    <div class="attendance-table">
      <table class="attendance-table__inner">
        <tr class="attendance-table__row">
          <th class="attendance-table__header">名前</th>
          <th class="attendance-table__header">勤務開始</th>
          <th class="attendance-table__header">勤務終了</th>
          <th class="attendance-table__header">休憩時間</th>
          <th class="attendance-table__header">勤務時間</th>
        </tr>
        <tr class="attendance-table__row">
          <td class="attendance-table__item">
            {{ Auth::user()->name }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchIn }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchOut }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakBegin }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakEnd }}
          </td>
        </tr>
        <tr class="attendance-table__row">
          <td class="attendance-table__item">
            {{ Auth::user()->name }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchIn }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchOut }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakBegin }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakEnd }}
          </td>
        </tr>
        <tr class="attendance-table__row">
          <td class="attendance-table__item">
            {{ Auth::user()->name }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchIn }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchOut }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakBegin }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakEnd }}
          </td>
        </tr>
        <tr class="attendance-table__row">
          <td class="attendance-table__item">
            {{ Auth::user()->name }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchIn }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchOut }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakBegin }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakEnd }}
          </td>
        </tr>
        <tr class="attendance-table__row">
          <td class="attendance-table__item">
            {{ Auth::user()->name }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchIn }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->punchOut }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakBegin }}
          </td>
          <td class="attendance-table__item">
            {{ Auth::user()->breakEnd }}
          </td>
        </tr>
      </table>
    </div>
  </div>
</form>
@foreach ($users as $user)
  <tr class="attendance-table__row">
    <td class="attendance-table__item">
      {{$user->getDetail()}}
    </td>
  </tr>
  @endforeach
</table>
{{ $employees->links() }}
{{ $employees->count() }}
{{ $employees->perPage() }}
{{ $employees->total() }}
{{ $employees->currentPage() }}
{{ $employees->lastPage() }}
{{ $employees->firstItem() }}
{{ $employees->lastItem() }}
{{ $employees->hasMorePages() }}
{{ $employees->nextPageUrl() }}
{{ $employees->previousPageUrl() }}
<footer class="footer">
  <div class="footer__inner">
    <small>Atte,inc.</small>
  </div>
</footer>
@endsection
</body>
</html>