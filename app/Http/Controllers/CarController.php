<?php

namespace App\Http\Controllers;

use App\car;
use App\mycar;
use App\rented;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBookingCars($id)
    {
        $car = mycar::where('id', $id)->get();
        return view('cars.booking')->with('car', $car)->with(['success' => ''])->with(['error' => '']);
    }
    public function showCars(Request $request)
    {
        if ($request->post('search')) {
            $data = mycar::where([

                ['plate', $request->post('search')],

            ])->get();
        } else {
            $data = mycar::get();
        }

        return view('cars.car')->with('cars', $data);
    }
    public function booking(Request $request)
    {


        $request->validate([

            'from' => 'required',
            'to' => 'required',
        ]);
        $rented = new rented();
        $rented->car_id = $request->post('id');
        $rented->user_id = Auth()->user()->id;
        $rented->dfrom = $request->post('from');
        $rented->dto = $request->post('to');
        $rented->save();
        if ($rented) {
            return redirect()->back()->with(['success' => 'Booked successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not Booked, try again']);
        }
    }
    public function viewBooking(Request $request)
    {


        $request->validate([

            'from' => 'required',
            'to' => 'required',
        ]);
        $rented = new rented();
        $rented->car_id = $request->post('id');
        $rented->dfrom = $request->post('from');
        $rented->dto = $request->post('to');
        $rented->save();
        if ($rented) {
            return redirect()->back()->with(['success' => 'Booked successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not Booked, try again']);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCar()
    {
        return view('cars.show');
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
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car)
    {
        //
    }
}