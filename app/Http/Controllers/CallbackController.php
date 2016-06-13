<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\GuzzleHTTPClient;

class CallbackController extends Controller
{
    protected $config;
    protected $bot;
    protected $req;

    public function __construct(Request $request)
    {
        $this->config = [
            'channelId' => getenv('CHANNEL_ID'),
            'channelSecret' => getenv('CHANNEL_SECRET'),
            'channelMid' => getenv('MID'),
            // 'defaults'  => [
            //     'proxy' => ''
            // ]
        ];
        $this->bot = new LINEBot($this->config, new GuzzleHTTPClient($this->config));
        $this->req = $request;
    }

    public function callback()
    {
        $bot = $this->bot;
        $receives = $bot->createReceivesFromJSON($this->req->getContent());
        foreach ($receives as $receive) {
            if ($receive->isMessage()) {

                if ($receive->isText()) {
                    /** テキストを受け取った時 */
                    $text = $receive->getText();
                    $bot->sendText($receive->getFromMid(), $text);
                } elseif ($receive->isImage() || $receive->isVideo()) {
                    /** イメージを受け取った時 */
                    // $content = $bot->getMessageContent($receive->getContentId());
                    // $meta = stream_get_meta_data($content->getFileHandle());
                    // $contentSize = filesize($meta['uri']);
                    // $type = $receive->isImage() ? 'image' : 'video';
                    // $previewContent = $bot->getMessageContentPreview($receive->getContentId());
                    // $previewMeta = stream_get_meta_data($previewContent->getFileHandle());
                    // $previewContentSize = filesize($previewMeta['uri']);
                    // $bot->sendText(
                    //     $receive->getFromMid(),
                    //     "Thank you for sending a $type.\nOriginal file size: " .
                    //     "$contentSize\nPreview file size: $previewContentSize"
                    // );

                } elseif ($receive->isAudio()) {
                    /** 音声を受け取った時 */
                    // $bot->sendText($receive->getFromMid(), "Thank you for sending a audio.");
                } elseif ($receive->isLocation()) {
                    /** 位置情報を受け取った時 */
                    // $bot->sendLocation(
                    //     $receive->getFromMid(),
                    //     sprintf("%s\n%s", $receive->getText(), $receive->getAddress()),
                    //     $receive->getLatitude(),
                    //     $receive->getLongitude()
                    // );
                } elseif ($receive->isSticker()) {
                    /** スタンプを受け取った時 */
                    // $bot->sendSticker(
                    //     $receive->getFromMid(),
                    //     $receive->getStkId(),
                    //     $receive->getStkPkgId(),
                    //     $receive->getStkVer()
                    // );
                } elseif ($receive->isContact()) {
                    /** 連絡先を受け取った時 */
                    // $bot->sendText(
                    //     $receive->getFromMid(),
                    //     sprintf("Thank you for sending %s information.", $receive->getDisplayName())
                    // );
                } else {
                    throw new \Exception("Received invalid message type");
                }
            } elseif ($receive->isOperation()) {

                if ($receive->isAddContact()) {
                    $bot->sendText($receive->getFromMid(), "nice to meet you! this is laravel-line-bot-starter");
                } elseif ($receive->isBlockContact()) {

                } else {
                    throw new \Exception("Received invalid operation type");
                }
            } else {
                throw new \Exception("Received invalid receive type");
            }
        }
        return ;
    }


}
