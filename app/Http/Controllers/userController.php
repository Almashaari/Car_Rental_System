<?php

namespace App\Http\Controllers;

use App\address as AppAddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;

use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use Illuminate\Support\Facades\Mail;
use Auth;
use Exception;
use Faker\Provider\ar_EG\Address;

class userController extends Controller
{


    public function showForget()
    {
        return view('auth.forget');
    }
    public function showEditProfile()
    {
        $data = User::where('id', Auth()->user()->id)->get();



        return view('profile.edit')->with('data', $data);
    }
    public function showRenterProfile($id)
    {
        $data = User::where('id', $id)->get();
        $address = AppAddress::where('user_id', $data[0]['id'])->get()[0];
        return view('profile.renterProfile')->with('data', $data)->with('address', $address);
    }
    public function uploadUserImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);


        $data = User::where('id', Auth()->user()->id)->update([
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->back();
    }
    public function changeProfile(Request $request)
    {
        try {
            $request->post('password') != null ?  User::where('id', Auth()->user()->id)->update(
                [
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'phone' => $request->post('phone'),
                    'address' => $request->post('address'),
                    'password' => bcrypt(
                        $request->post('password')
                    ),
                ]
            )
                : User::where('id', Auth()->user()->id)->update(
                    [
                        'name' => $request->post('name'),
                        'email' => $request->post('email'),
                        'phone' => $request->post('phone'),
                        'address' => $request->post('address'),
                    ]
                );
            return redirect('/profile');
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e,

            ]);
        }
    }
    public function showSign()
    {
        return view('auth.sign');
    }
    public function showProfile(Request $request)
    {


        // return view('profile.profile')->with('data', [$email, $imageProfile, $phone, $fname, $role]);
        return view('profile.profile');
    }
}