<?php

namespace App\Http\Controllers;

use App\rented;
use Illuminate\Http\Request;

class RentedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRented()
    {
        $renteds = rented::with('car')->with('user')->get();
        return view('rented.rented')->with('renteds', $renteds);
    }
    public function showSearchRented(Request $request)
    {

        $renteds = rented::join(
            'mycars',
            'renteds.car_id',
            '=',
            'mycars.id',
            // [],
        )
            ->where('mycars.plate', '=', $request->post('search'))
            ->with('user')->get();
        //   dd($renteds);
        return view('rented.rented')->with('renteds', $renteds);
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
     * @param  \App\rented  $rented
     * @return \Illuminate\Http\Response
     */
    public function show(rented $rented)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rented  $rented
     * @return \Illuminate\Http\Response
     */
    public function edit(rented $rented)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rented  $rented
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rented $rented)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rented  $rented
     * @return \Illuminate\Http\Response
     */
    public function destroy(rented $rented)
    {
        //
    }
}