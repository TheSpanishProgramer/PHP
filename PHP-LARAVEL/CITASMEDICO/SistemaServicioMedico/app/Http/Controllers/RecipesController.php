<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\MedicalRecord;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('status')->paginate();
        return view('recipes.index', ['recipes'=>$recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        if(!Auth::user()->hasPermissionTo('CrearRecipe'))
            abort(403, 'Acceso Prohibido');

        $medicalrecord = MedicalRecord::findOrFail($id);
        $medicines = Medicine::all();
        return view('recipes.create', ['medicines'=>$medicines, 'medicalrecord'=>$medicalrecord]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $v = Validator::make($request->all(), [
            'medicalrecord_id' =>'required',
            'indications' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $recipe = Recipe::create([
                'medicalrecord_id'=>$request->input('medicalrecord_id'),
                'indications'=> $request->input('indications'),
            ]);
            if(count($request->input('medicines'))>0){
                $recipe->medicines()->sync($request->input('medicines'));                
            }

        } catch (\Exception $e) {
            \DB::rollback();
            if(Auth::user()->hasRole('Medico'))
                return redirect('/myappointments')->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');
            else
                return redirect('/appointments')->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');
        } finally {
            \DB::commit();
        }
        if(Auth::user()->hasRole('Medico'))
            return redirect('/myappointments')->with('mensaje', 'Recipe creado con ??xito');
        else
            return redirect('/appointments')->with('mensaje', 'Recipe creado con ??xito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->hasPermissionTo('EditarRecipe'))
            abort(403, 'Acceso Prohibido');

        $medicines = Medicine::all();
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', ['medicines'=>$medicines, 'recipe'=>$recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'indications' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $recipe = Recipe::findOrFail($id);
            $medicines = Medicine::all();

            $recipe->update([
                'indications'=> $request->input('indications'),
            ]);

            if(count($request->input('medicines'))>0){
                $recipe->medicines()->sync($request->input('medicines'));                
            }

        } catch (\Exception $e) {
            \DB::rollback();
            if(Auth::user()->hasRole('Medico'))
            return redirect('/myappointments')->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');
        else
            return redirect('/recipes')->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');

        } finally {
            \DB::commit();
        }
        if(Auth::user()->hasRole('Medico'))
            return redirect('/myappointments')->with('mensaje', 'Recipe Modificado con ??xito');
        else
            return redirect('/recipes')->with('mensaje', 'Recipe Modificado con ??xito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasRole('Administrador'))
            abort(403, 'Permiso Denegado.');

        try{
            \DB::beginTransaction();
            $recipe = Recipe::findOrFail($id);
            $recipe->medicines()->sync([]);
            $recipe->destroy();
        }catch(\Exception $e){
            \DB::rollback();
            return redirect('/recipes')->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');
        }finally{
            \DB::commit();
        }
        return redirect('/recipes')->with('mensaje', 'Recipe eliminado satisfactoriamente');
    }

    public function vistastatusrecipe($id)
    {
        $recipe = Recipe::findOrFail($id);
        $status = ['Activo', 'Entregado', 'Cancelado'];
        return view('recipes.statusrecipes', ['recipe'=>$recipe, 'status'=>$status]);
    }

    public function cambiarstatusrecipe(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $status = ['Activo', 'Entregado', 'Cancelado'];
        
        try { 
            \DB::beginTransaction();

            $recipe = Recipe::findOrFail($id);
            
            $recipe->update([
                'status' => ($request->input('status') !='') ? $request->input('status') : 'Activo',
                'pharmacist_id' => Auth::user()->id,
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('mensaje', 'No se pudo procesar su solicitud. Ocurri?? un Error Inesperado');
        } finally {
            \DB::commit();
        }
        return redirect('/recipes')->with('mensaje', 'Cambio de Status de Recipe realizado satisfactoriamente');
    }

    public function verrecipe($id)
    {
        
        if(!Auth::user()->hasPermissionTo('VerRecipe'))
            abort(403, 'Permiso Denegado.');

        $recipe = Recipe::findOrFail($id);
        $medicines = Medicine::all();

        return view('recipes.viewrecipe', ['recipe'=>$recipe, 'medicines'=>$medicines]);
    }
}
