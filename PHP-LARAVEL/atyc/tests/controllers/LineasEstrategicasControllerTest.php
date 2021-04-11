<?php

namespace Tests\Controllers;

use App\Http\Controllers\LineasEstrategicasController;
use App\Models\Cursos\LineaEstrategica;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;
use DB;

class LineasEstrategicasControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->controller = $this->app->make(LineasEstrategicasController::class);
        $this->model = $this->app->make(LineaEstrategica::class);
    }

    public function requestProvider()
    {
        $this->refreshApplication();
        return factory(LineaEstrategica::class, 3)
        ->make()
        ->map(function ($i) {
            return [new Request($i->toArray())];
        })
        ->all();
    }

    /**
     * Model table is present but not filled with records
     *
     * @test
     */
    public function empty()
    {
        DB::statement("truncate cursos.lineas_estrategicas cascade");
        $this->assertCount(0, $this->model->all());
    }

    /**
     * Create view of the model
     *
     * @test
     */
    public function create()
    {
        $this->assertEquals('0b81e2ee7ace239134f2e9f6b366f656', md5($this->controller->create()));
    }

    /**
     * Store model with request
     *
     * @param Request $request
     * @dataProvider requestProvider
     * @test
     */
    public function store(Request $request)
    {
        $id = $this->controller->store($request)->id_linea_estrategica;
        $this->assertTrue($this->model->find($id)->exists, 'No se persistio');
    }

    /**
     * Show model with request
     *
     * @param Request $request
     * @dataProvider requestProvider
     * @test
     */
    public function show(Request $request)
    {
        $id = $this->controller->store($request)->id_linea_estrategica;
        $array = $this->controller->show($id);
        $this->assertArrayHasKey('linea', $array);
    }

    /**
     * Update model with request
     *
     * @param Request $request
     * @dataProvider requestProvider
     * @test
     */
    public function update(Request $request)
    {
        $id = $this->controller->store($request)->id_linea_estrategica;
        $antes = $this->model->findOrFail($id)->first()->nombre;
        $request->replace(['nombre' => strtoupper($request->nombre)]);
        $this->controller->update($request, $id);
        $despues = $this->model->findOrFail($id)->nombre;
        $this->assertFalse($antes === $despues, 'Son iguales no se hizo el update');
    }

    /**
     * SoftDelete model with request
     *
     * @param Request $request
     * @dataProvider requestProvider
     * @test
     */
    public function destroy(Request $request)
    {
        $id = $this->controller->store($request)->id_linea_estrategica;
        $bool = $this->controller->destroy($id);
        $this->assertTrue($bool);
    }
}
