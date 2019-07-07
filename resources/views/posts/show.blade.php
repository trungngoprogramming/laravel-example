@extends('layouts.master')

@section('content')
    <div>
        <div>Tittle: {{ $post->name }}</div>
        <div>Content: {{ $post->content }}</div>
    </div>
@endsection
