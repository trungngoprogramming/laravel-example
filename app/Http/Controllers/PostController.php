<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\User;
use App\Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = $request->only([
            'name',
            'content',
            'category_id',
        ]);
        $post['user_id'] = Auth::user()->id;
        $post = Post::create($post);
        return redirect()->route('posts.index')
            ->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);

        return view('posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        $request = $request->only([
            'name',
            'content',
            'category_id',
        ]);

        $post = Post::find($id)->update($request);

        return redirect()->route('posts.index')
            ->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_delete_post = Post::find($id)->delete();
        if($is_delete_post) {
            $message = 'Xóa thành công';
            return redirect()->route('posts.index')
                ->with('success', $message);
        }
        else {
            $error = 'Xóa không thành công';
            return redirect()->route('posts.index')
                ->with('error', $error);
        }
    }
}
