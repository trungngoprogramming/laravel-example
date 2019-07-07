@extends('layouts.master')

@section('content')
    <form action="{{ route('posts.patch', [$post->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <span>{{ $errors->first('name') }}</span>
            <input type="text" name="name" placeholder="Tiêu đề" value="{{ old('name') ? old('name') : $post->name }}">
        </div>
        <div>
            <span>{{ $errors->first('content') }}</span>
            <input type="text" name="content" placeholder="Nội dung" value="{{ old('content') ? old('content') : $post->content }}">
        </div>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
@endsection

