<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = \DB::table('employees')
        //     ->get();

        // return \Response::json($employees);
        
        // 2========
        // $queries = \Request::query();

        // dd($queries);

        // 3========
        $queries = \Request::query();

        if (isset($queries['gender'])) {
            $employees = \DB::table('employees')
                ->where('gender', strtoupper($queries['gender']))
                ->get();
        } else {
            $employees = \DB::table('employees')
                ->get();
        }
        
        return \Response::json($employees);
    }

    // *
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
     
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(\Request::all());

        $employee = \Request::all();

        try {
            \DB::table('employees')
                ->insert($employee);

            \Response::make(['message' => 'success'], 200);
        } catch(Exception $e) {
            \Response::make(['message' => $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = \DB::table('employees')
            ->where('id', $id)
            ->first();

        return \Response::json($employee);
    }

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = \Request::all();

        try {
            \DB::table('employees')
                ->where('id', $id)
                ->update($employee);

            \Response::make(['message' => 'success'], 200);
        } catch (Exception $e) {
            \Response::make(['message' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            \DB::table('employees')
                ->where('id', $id)
                ->delete();

            \Response::make(['message' => 'success'], 200);
        } catch (Exception $e) {
            \Response::make(['message' => $e], 500);
        }
    }
}
