<?php

namespace App\Http\Controllers;

use App\Models\CertificationQuestion;
use App\Models\CertificationQuestionAnswer;
use App\Models\UserCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PCUController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!empty($user->certification()) && $user->certification()->status == UserCertification::VALIDADO){
            return view('pcu.index');
        }else if (!empty($user->certification()) && $user->certification()->status == UserCertification::PENDIENTE){
            return view('pcu.waiting');
        }else if (!empty($user->certification()) && $user->certification()->status == UserCertification::RECHAZADO){
            return view('pcu.character_description');
        }

        return view('pcu.welcome');
    }

    public function show(){
        return view('pcu.test');
    }

    public function getPCUTest(){
        $questions = CertificationQuestion::with('certificationQuestionAnswers')->get();
//        dd('asdasd');
        return view('pcu.test', ['questions' => $questions]);
    }

    public function postPCUTest(Request $request){

        $inputs = $request->except('_token');
//        $cont = 1;
        foreach ($inputs as $userAnswer){
            $answer = CertificationQuestionAnswer::find($userAnswer);
            if(!$answer->valid){
                Flash::error('Ciertas respuestas no son correctas revisalo, último error en ('.$answer->answers.')');
                return redirect(route('pcu.test'));
            }
        }

        return view('pcu.character_description');
    }

    public function postUserCertification(Request $request){
//        dd(Auth::user());
//        dd($request->character_description);
        $user =  Auth::user();
        $actual_certification = UserCertification::where('user_id','=', $user->id)->first();
        if(!empty($actual_certification)){
            $actual_certification->character_description = $request->character_description;
            $actual_certification->status = UserCertification::PENDIENTE;
            $actual_certification->save();
            return redirect(route('pcu.index'));
        }
        $certification = new UserCertification();
        $certification->character_description = $request->character_description;
        $certification->user_id =$user->id;
        $certification->save();

        return redirect(route('pcu.index'));
    }
}
