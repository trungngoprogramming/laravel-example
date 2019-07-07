<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Auth;

class UserController extends Controller
{
    public function login(StoreUserRequest $request)
    {
        $user = $request->only([
            'email',
            'password',
        ]);

        $user = User::where($user)->first();

        if (is_null($user)) {
            return redirect('/')
                ->with('error', 'Thông tin đăng nhập chưa đúng!');
        }

        Auth::setUser($user->id);

        return redirect()->route('posts.index')
            ->with('success', 'Đăng nhập thành công');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
