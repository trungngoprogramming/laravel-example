<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <span>{{ $errors->first('name') }}</span>
        <input type="text" name="name" placeholder="Tiêu đề" value="{{ old('name') }}">
    </div>
    <div>
        <span>{{ $errors->first('content') }}</span>
        <input type="text" name="content" placeholder="Nội dung" value="{{ old('content') }}">
    </div>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>
