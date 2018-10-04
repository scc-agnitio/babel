<?php

namespace App;

/**
 * Class CognitiveTranslator
 *
 * @package App
 */
class CognitiveTranslator implements Translates
{

    /**
     * @var
     */
    private $key;

    /**
     * @var string
     */
    private $host = "https://api.cognitive.microsofttranslator.com";
    /**
     * @var string
     */
    private $path = "/translate?api-version=3.0";

    /**
     * CognitiveTranslator constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $text
     * @param        $language
     * @return mixed
     */
    public function getTranslation(string $text, $language)
    {
        $params = "&to={$language}";
        $requestBody = [
            [
                'Text' => $text,
            ],
        ];
        $content = json_encode($requestBody);

        $headers = $this->createHeaders($content);
        $options = [
            'http' => [
                'header'  => $headers,
                'method'  => 'POST',
                'content' => $content
            ]
        ];
        $context  = stream_context_create ($options);
        $result = file_get_contents($this->host . $this->path . $params, false, $context);

        return json_decode($result, true)[0]['translations'][0]['text'];
    }

    /**
     * @param $content
     * @return string
     */
    private function createHeaders($content)
    {
        return "Content-type: application/json\r\n" .
            "Content-length: " . strlen($content) . "\r\n" .
            "Ocp-Apim-Subscription-Key: $this->key\r\n" .
            "X-ClientTraceId: " . $this->createGuid() . "\r\n";
    }

    /**
     * @return string
     */
    private function createGuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
