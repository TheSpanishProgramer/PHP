<?php

namespace App\Http\Controllers;

use App\Models\GTAAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateResetPassController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function updatePassword(Request $request){
        $social_club = $request->socialName;
        $password = md5($request->password);
//        dd($request->all());
        $account = GTAAccount::where('socialName', '=', $social_club)->first();

        $account->password = $password;
        $account->save();
        return response(['message' => 'update succesfull'],'200');
    }
}

