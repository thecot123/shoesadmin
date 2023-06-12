<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        session()->flash('success', 'You are logged in!');
        return $this->redirectTo;
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Xử lý đăng nhập và tạo/sẵn sàng thông tin tài khoản người dùng
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
        }

        // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu hay không
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // Nếu người dùng chưa tồn tại, tạo mới người dùng và lưu vào cơ sở dữ liệu
            $user = new User();
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->google_id = $googleUser->id;

            $user->save();
        }

        // Đăng nhập người dùng vào ứng dụng Laravel
        Auth::login($user);

        // Chuyển hướng người dùng tới trang sau khi đăng nhập thành công
        return redirect('/home');
    }

}
