<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Anggota_kelas;
use App\Materi;
use App\Modul;
use App\Diskusi;
use Auth;

class KelasController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function index()
	{
		$kelas_id = Anggota_kelas::select('kelas_id')
			->where('user_id', '=', Auth::user()->id)
			->get();

		$kelas = Kelas::findMany($kelas_id);

		return view('kelas.index', compact('kelas'));
	}

	public function storeKelas(Request $request)
	{
		$data = $request->all();
		
		$data['creator_id'] = Auth::user()->id;
		$data['code'] = strtoupper(str_random(6)); //semua uppercase untuk kemudahan

		$kelas = Kelas::create($data);

		// $anggota = new Anggota_kelas([
		// 	'kelas_id' => $kelas->id,
		// 	'user_id' => Auth::user()->id,
		// 	]);
		// $anggota->save();

		\DB::select('call storeAnggotaKelas("'.$kelas->id.'", "'.Auth::user()->id.'")');
		return redirect()->route('show.kelas', $kelas->id);
	}

	public function editKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.edit', compact('materi'));
    }

    public function updateKelas($id, Request $request)
    {
        $data = $request->all();

        $kelas = Kelas::findOrFail($id);

		if($request->file('cover')){
            $file       = $request->file('cover');
            $fileName   = $file->getClientOriginalName();
            $request->file('cover')->move("img/", $fileName);
            $data['cover'] = $fileName; 
        }
        
        $kelas->update($data);

        return redirect('classroom/'.$id);
    }

    public function updateMateri($id, Request $request)
    {
        $data = $request->all();

        $materi = Materi::findOrFail($id);

		if($data['nilai_tugas'] + $data['nilai_quiz'] != 100){
			return redirect()->back();
		}
        
        $materi->update($data);

        return redirect('classroom/'.$materi->kelas_id);
    } 

	public function joinKelas(Request $request)
	{
		$data = $request->all();

		$kelas = Kelas::where('code','=', $data['code'])->first();

		if(!$kelas){
			return redirect()->back();
		}
		
		$anggota = new Anggota_kelas([
			'kelas_id' => $kelas->id,
			'user_id' => Auth::user()->id,
			]);
		$anggota->save();

		return redirect()->route('show.kelas', $kelas->id);
	}

	public function showKelas($id)
	 {
		$kelas = Kelas::findOrFail($id);
		$timeline = Diskusi::where('kelas_id', $kelas->id)->orderBy('created_at','DESC')->get();

		//dd($timeline);

	 	return view('kelas.show', compact('kelas','timeline'));
	 } 

	 public function storeMateri(Request $request)
	{
		$data = $request->all();

		if($data['nilai_tugas'] + $data['nilai_quiz'] != 100){
			return redirect()->back();
		}
		
		$data['creator_id'] = Auth::user()->id;

		$materi = Materi::create($data);

		return redirect(url('/form_materi/'.$materi->kelas->id));
	}

	public function storeModul(Request $request)
	{
		$data = $request->all();

		if($request->file('link')){
            $file       = $request->file('link');
            $fileName   = $file->getClientOriginalName();
            $request->file('link')->move("pdf/", $fileName);
            $data['link'] = $fileName; 
        }

		$modul = Modul::create($data);
		return redirect(url('/form_materi/'.$modul->materi->kelas->id));
	}

	public function destroyModul($id)
    {
    	$modul = Modul::findOrFail($id);
        Modul::destroy($id);

        return redirect(url('/form_materi/'.$modul->materi->kelas->id));
    }

    public function destroyMateri(Request $request)
    {
    	$checked = $request->input('checked');
    	$materi = Materi::findOrFail($checked[0]);
    	
	   	Materi::whereIn('id',$checked)->delete();

        return redirect(url('/form_materi/'.$materi->kelas->id));
    }

    public function form_materi($id){
    	$kelas = Kelas::findOrFail($id);
    	return view('kelas.form_materi', compact('kelas'));
    }

    public function nilai_akhir($id){
    	$kelas = Kelas::findOrFail($id);
    	return view('kelas.nilai_akhir', compact('kelas'));
    }
}
