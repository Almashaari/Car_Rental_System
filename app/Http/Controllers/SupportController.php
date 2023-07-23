<?php

namespace App\Http\Controllers;

use App\appUser;
use App\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
  public function ushowSupport()
  {
    return view('usupport.support');
  }
  public function showSupport()
  {
    return view('support.support');
  }
  public function sendNotification(Request $request)
  {

    $firebaseToken = $request[0];

    $SERVER_API_KEY = ' AAAAwf76P_4:APA91bHyF4LFt8buKC51GomQsgfokke3P5dYny4ri_Pl4NDBGOUFyTOU1S0nFk4UptWi2qRlpRMSQk2VmldYMo__qbrVeWTpJspcPUECIabkudOItblJK0FDsplQtcCc5RKsH_gPoQbO';

    $data = [
      "registration_ids" => [$firebaseToken],
      "data" => ['kind' => 3],
      "notification" => [
        "title" => $request[1],
        "body" => $request[2],
        "content_available" => true,
        "priority" => "high",
      ]
    ];
    $dataString = json_encode($data);

    $headers = [
      'Authorization: key=' . $SERVER_API_KEY,
      'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    return $response;
  }
  public function sendMessageListToController(Request $request)
  {
    try {

      for ($i = 0; $i < count($request->all()); $i++) {
        ///  $request[0]['userOne'];
        $dataFromDB = User::where('id', '=', $request[$i]['sender'])->select('image', 'name')->get();
        $messages[$i]['userOne'] = $request[$i]['sender'];
        $messages[$i]['userTwo'] =
          1;

        $messages[$i]['image'] = $dataFromDB[0]['image'];
        $messages[$i]['name'] = $dataFromDB[0]['name'];
        $messages[$i]['aread'] =
          $request[$i]['rRead'];
        $messages[$i]['uread'] =
          $request[$i]['sRead'];
        $messages[$i]['messageID'] =
          $request[$i]['messageID'];
      }
      return [
        'status' => true,
        'data' => $messages,
      ];
    } catch (Exception $e) {
      return $e;
    }
  }
  public function showAllUsers()
  {

    return view('support.allUser');
  }
}