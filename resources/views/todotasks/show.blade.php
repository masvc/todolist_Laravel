@extends('layouts.app')

@section('content')
<h1>{{ $todotask->task }}</h1>
@if($todotask->img)
<img src="{{ asset('storage/' . $todotask->img) }}" alt="タスク画像">
@endif
<p>完了: {{ $todotask->done ? 'はい' : 'いいえ' }}</p>
<a href="{{ route('todotasks.index') }}">戻る</a>
@endsection