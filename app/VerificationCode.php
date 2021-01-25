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

        $message = 'رمز التفعيل لتطبيق مجالات تك هو : '.$verification_code->code;

        $options = [
            'form_params' => [
                'username' => 'Majalattk',
                'password' => 'EID9879eid',
                'message' => $message,
                'numbers' => $verification_code->phone,
                'sender' => 'A-sh-est',
                'unicode' => 'E',
                'return' => 'json'
            ]
        ];
        $response = $client->post('http://www.alsaad2.net/api/sendsms.php', $options);

        $body = json_decode($response->getBody()->getContents(), true);

        if($body['Code'] == 100) {

            return true;

        }else{

            $verification_code->delete();

            return false;

        }

    }

}
