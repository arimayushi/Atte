@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection

@section('content')
<div class="Atte__content">
  <div class="Atte__heading">
    <h2></h2>
  </div>
<form class="form" action="/home" method="post">
@csrf
  <table>
    <tr>
      <th>ID</th>
      <th>名前</th>
    </tr>
    @foreach ($users as $user)
    <tr>
      <td>{{ $users->id }}</td>
      <td>{{ $users->name }}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection