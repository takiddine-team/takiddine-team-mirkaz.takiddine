<?php

namespace App\Bots;

use CURLFile;

/**
 * *********************************************
 *  USAGE
 * *********************************************
 * 
 *  Send message|document to different channels
 * 
 *      (new \App\Bots\Telegram())::channel( $channel1 )->sendMessage( $message );
 *      (new \App\Bots\Telegram())::channel( $channel2 )->sendDocument( $document_path );
 * 
 *  Send one or multiple message|document to same channel
 * 
 *      (new \App\Bots\Telegram())::channel( $channel )->sendMessage( $message )->sendDocument( $document_path );
 * 
 */

class Telegram
{
    private $botId;
    private static $channelId;

    public function __construct()
    {
        if(!config('bots.telegram.active')) return;

        $this->botId = config('bots.telegram.bot_id');
    }

    public function sendMessage(string $message): Telegram
    {
        $url        = "https://api.telegram.org/bot".$this->botId;
        $params         = [
            'chat_id'   => self::$channelId,
            'text'      => $message,
        ];
        $ch = curl_init($url . '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_exec($ch);
        curl_close($ch);

        return $this;
    }

    public function sendDocument(string $document): Telegram
    {
        $url = "https://api.telegram.org/bot".$this->botId;
        $params = [
            'chat_id' => self::$channelId,
            'document' => new CURLFile($document)
        ];

        $ch = curl_init($url . '/sendDocument');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($ch);
        curl_close($ch);
        
        return $this;
    }

    public static function channel(string $channel): Telegram
    {
        self::$channelId = config("bots.telegram.channels.$channel.active")
            ? config("bots.telegram.channels.$channel.id")
            : null;
        
        return new self;
    }
}
