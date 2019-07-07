<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    @if(Session::has('success'))
        <div>{{Session::get('success')}}</div>
    @elseif(Session::has('error'))
        <div>{{Session::get('error')}}</div>
    @endif
    <a href="{{ route('posts.create') }}">Tạo mới</a>
    <a href="{{ route('user.logout') }}">Log out</a>
    <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Nội dung</th>
                    <th>Category</th>
                    <th>Nguoi Tao</th>
                    <th>Điều hướng</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $index => $post)
                <tr>
                    <td>{{$post->name}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <a href="{{ route('posts.edit', [$post->id]) }}">Chỉnh sửa</a>
                        <form action="{{route('posts.destroy', [$post->id])}}" method='post'>
                            @csrf
                            @method('DELETE')
                            <button>Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
