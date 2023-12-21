<?php

namespace Thielander\Text2Speech;

/*****************************************************
 * PHP CLASS:   OPENAI TEXT 2 SPEECH                 *
 * WEB:         www.alexanderthiele.de               *
 * Author:      Alexander Thiele                     *
 * E-mail:      mail@alexanderthiele.de              *
 *****************************************************/
class chatGPT 
{

    private $apiKey;
    private $voice;

    function __construct($voice = "nova")
    {
        $this->apiKey = "YOUR-OPENAI-API-KEY";

        //alloy, echo, fable, onyx, nova, shimmer
        $this->voice = $voice;
    }

    public function getSoundfile($file = "test", $text = "")
    {

        //languages
        //Afrikaans, Arabic, Armenian, Azerbaijani, Belarusian, Bosnian, Bulgarian, Catalan, Chinese, Croatian, Czech, Danish, Dutch, 
        //English, Estonian, Finnish, French, Galician, German, Greek, Hebrew, Hindi, Hungarian, Icelandic, Indonesian, Italian, Japanese, 
        //Kannada, Kazakh, Korean, Latvian, Lithuanian, Macedonian, Malay, Marathi, Maori, Nepali, Norwegian, Persian, Polish, Portuguese, 
        //Romanian, Russian, Serbian, Slovak, Slovenian, Spanish, Swahili, Swedish, Tagalog, Tamil, Thai, Turkish, Ukrainian, Urdu, Vietnamese, and Welsh.

        $apiUrl = "https://api.openai.com/v1/audio/speech";
        $data = [
            "model" => "tts-1", //tts-1, tts-1-hd
            "input" => $text,
            "voice" => $this->voice
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $this->apiKey",
            "Content-Type: application/json"
        ]);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            //mp3, opus, aac, flac
            file_put_contents($file . ".mp3", $result);
        }
        curl_close($ch);
    }
}