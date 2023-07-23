<?php

namespace App\Http\Controllers;

use App\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddress()
    {
        $address = address::where('user_id', Auth()->user()->id)->get();
        if (count($address) > 0) {
            return view('address.address')->with(['success' => ''])->with(['error' => ''])->with('address', [
                'line' => $address[0]['line'],
                'city' => $address[0]['city'],
                'state' => $address[0]['state'],
                'zipCode' => $address[0]['zipCode'],
            ]);
        } else {
            return view('address.address')->with(['success' => ''])->with(['error' => ''])->with('address', [
                'line' => "",
                'city' => "",
                'state' => "",
                'zipCode' => "",
            ]);
        }
    } //
    public function editAddress(Request $request)
    {
        $userID = Auth()->user()->id;
        $checkAddress = address::where('user_id', $userID)->count();
        if ($checkAddress == 0) {
            $address = new address();
            $address->user_id = $userID;
            $address->line = $request->post('line');
            $address->city = $request->post('city');
            $address->state = $request->post('state');
            $address->zipCode = $request->post('zip');
            $address->save();
            if ($address) {
                return redirect()->back()->with(['success' => 'Added successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Not saved, try again']);
            }
        } else {
            $address = address::where('user_id', $userID)->update(
                [
                    'line' => $request->post('line'),
                    'city' => $request->post('city'),
                    'state' => $request->post('state'),
                    'zipCode' => $request->post('zip'),
                ]
            );
            if ($address) {
                return redirect()->back()->with(['success' => 'Added successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Not saved, try again']);
            }
        }
        return $checkAddress;
    }
}