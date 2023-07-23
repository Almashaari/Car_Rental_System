<?php

namespace App\Http\Controllers;

use App\booking;
use App\rented;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DeleteBooking($id)
    {

        $rented =  rented::where('id', $id)->delete();
        if ($rented) {
            return redirect()->back()->with(['success' => 'Edited successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not Edited, try again']);
        }
    }
    public function editBooking(Request $request)
    {

        $rented =  rented::where('id', $request->post('id'))->update(
            [
                'dfrom' => $request->post('from'),
                'dto' => $request->post('to'),
            ]
        );
        if ($rented) {
            return redirect()->back()->with(['success' => 'Edited successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not Edited, try again']);
        }
    }
    public function viewEditBooking($id)
    {

        $booking = rented::where('id', $id)->with('car')->get()[0];

        return view('booking.edit')->with('booking', $booking)->with(['success' => ''])->with(['error' => '']);
    }
    public function showbookings()
    {
        $bookings = rented::where('user_id', Auth()->user()->id)->with('car')->get();

        return view('booking.bookings')->with('bookings', $bookings);
    }
    public function showSearchbookings(Request $request)
    {
        $bookings  = rented::where('renteds.user_id', Auth()->user()->id)->join(
            'mycars',
            'renteds.car_id',
            '=',
            'mycars.id',
            // [],
        )
            ->where('mycars.plate', '=', $request->post('search'))
            ->get();
        //$bookings = rented::where('user_id', Auth()->user()->id)->with('car')->get();

        return view('booking.bookings')->with('bookings', $bookings);
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
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        //
    }
}