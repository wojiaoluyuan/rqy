<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/center';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'string','size:11','unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
//            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => $data['password'],
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $parm = $_SERVER['HTTP_REFERER'];
        /*
         * 存在type
         * 邀请的买家
         */
        if (strstr($parm,'type')){
            $url = strstr($parm,'&type',true);
            $arr = explode('recommend=',$url);
            $user_id = $arr[1];
            //如果是买家，目前暂时是奖赏5块

            $data = DB::table('brokerage_record')
                ->where('user_id','=',$user_id)
                ->orderByDesc('ctime')
                ->first();
            if (empty($data->balance)){
                $pre_blance = 0;
            }else{
                $pre_blance =$data->balance;
            }
            $balance = $pre_blance+5;

            DB::table('brokerage_record')->insert(
                [
                    'user_id' => $user_id,
                    'type' => '0',
                    'in_out' => '0',
                    'content' => '邀请买家提成',
                    'quota' => '5',
                    'balance' => $balance,
                    'ctime'=> date('Y-m-d h:i:s',time()),
                ]
            );

        }elseif(!strstr($parm,'type') && strstr($parm,'recommend')){
            $arr = explode('recommend=',$parm);
            $user_id = $arr[1];

            //如果是商家，目前暂时是奖赏10块

            $data = DB::table('brokerage_record')
                ->where('user_id','=',$user_id)
                ->orderByDesc('ctime')
                ->first();

            if (empty($data->balance)){
                $pre_blance = 0;
            }else{
                $pre_blance =$data->balance;
            }

            $balance = $pre_blance+10;

            DB::table('brokerage_record')->insert(
                [
                    'user_id' => $user_id,
                    'type' => '1',
                    'in_out' => '0',
                    'content' => '邀请商家提成',
                    'quota' => '10',
                    'balance' => $balance,
                    'ctime'=> date('Y-m-d h:i:s',time()),
                ]
            );
        }
    }
}
