<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class VerificationCode extends Model
{

    protected $fillable = ['phone', 'code'];


    public static function generate($phone) {

        $code = rand(pow(10, 3), pow(10, 4)-1);

        $exist_code = static::where('phone', $phone)->first();

        if($exist_code) {
            $exist_code->delete();
        }

         $verification_code = static::create([
           'phone' => $phone,
            'code' => $code
        ]);

        return static::send($verification_code);

    }

    public static function send($verification_code) {

        $client = new Client();

        $data = [
            'json' => [
                "Username" => "0505349879",
                "Password" => "EID9879eid",
                "Tagname" => "MJALATTK-AD",
                "RecepientNumber" => $verification_code->phone,
                "Message" => $verification_code->code,
            ]
        ];

        $response = $client->post("http://api.yamamah.com/SendSMS", $data);

        $body = json_decode($response->getBody()->getContents());

        if($body->Status == 1) {

            return true;

        }else{

            $verification_code->delete();

            return false;

        }

    }

}
