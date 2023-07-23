<?php

namespace App\Http\Controllers;

use App\mycar;
use App\rented;
use Illuminate\Http\Request;

class MycarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddCars()
    {
        return view('myCar.add')->with(['success' => ''])->with(['error' => '']);
    }

    public function showMyCars(Request $request)
    {
        if ($request->post('search')) {
            $cars = mycar::where([
                ['user_id', Auth()->user()->id],
                ['plate', $request->post('search')],

            ])->get();
        } else {
            $cars = mycar::where('user_id', Auth()->user()->id)->get();
        }



        return view('myCar.myCar')->with('cars', $cars)->with(['success' => ''])->with(['error' => '']);
    }
    public function showEditMyCars($id)
    {
        $cars = mycar::where('id', $id)->get();


        return view('myCar.edit')->with('cars', $cars);
    }


    public function deleteMyCars($id)
    {


        $myCar = mycar::where('id', $id)->delete();

        if ($myCar) {
            $rented = rented::where('car_id', $id)->delete();

            return redirect()->back()->with(['success' => 'Deleted successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not deleted, try again']);
        }
    }
    public function editMyCar(Request $request)
    {

        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            $myCar = mycar::where('id', $request->post("id"))->update([
                'image' =>
                $imageName,
                'plate' => $request->post('plate'),
                'colour' => $request->post('colour'),
                'condition' => $request->post('condition'),
                'type' => $request->post('type'),
                'model' => $request->post('model'),
                'year' => $request->post('year'),
                'price' => $request->post('price'),
            ]);
        } else {
            $myCar = mycar::where('id', $request->post("id"))->update([

                'plate' => $request->post('plate'),
                'colour' => $request->post('colour'),
                'condition' => $request->post('condition'),
                'type' => $request->post('type'),
                'model' => $request->post('model'),
                'year' => $request->post('year'),
                'price' => $request->post('price'),
            ]);
        }




        if ($myCar) {
            return redirect()->back()->with(['success' => 'Edit successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not saved, try again']);
        }
    }
    public function addMyCar(Request $request)
    {
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'carIcon.png';
        }




        $myCar = new mycar();
        $myCar->image = $imageName;
        $myCar->user_id = Auth()->user()->id;
        $myCar->plate = $request->post("plate");
        $myCar->colour = $request->post("colour");
        $myCar->condition = $request->post("condition");
        $myCar->type = $request->post("type");
        $myCar->model = $request->post("model");
        $myCar->year = $request->post("year");
        $myCar->price = $request->post("price");
        $myCar->save();

        if ($myCar) {
            return redirect()->back()->with(['success' => 'Added successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Not saved, try again']);
        }
    }
}