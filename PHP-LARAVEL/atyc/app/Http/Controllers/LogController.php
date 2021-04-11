<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        Cache::forever(
            json_encode(
                Carbon::now()->format('Y-m-d H:i:s')
            ),
            json_encode(
                [
                    'path' => request()->path(),
                    'request' => request()->all(),
                    'user' => Auth::guest()?'guest':Auth::user()
                ]
            )
        );

        return response()->json([
            'path' => request()->path(),
            'request' => request()->all(),
            'user' => Auth::guest()?'guest':Auth::user(),
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function log($date)
    {
        $requests = [];
        $filename = storage_path("/logs/laravel-{$date}.log");

        $f = fopen($filename, 'r');

        while (!feof($f)) {
            $line = fgets($f);
            array_push($requests, $line);
        }
        return $requests;
    }
}
