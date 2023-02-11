<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;

use Telegram\Bot\Laravel\Facades\Telegram;


class TelegramController extends Controller
{
    public function updatedActivity()
     {
        $activity = Telegram::getUpdates();
        dd($activity);
     }

     public function sendMessage()
     {
         return view('layouts.telegram.telegramView');
     }

     public function storeMessage(Request $request)
     {
    
         $text =  "<b>Name: </b>\n"
             . "$request->name\n"
             . "<b>Message: </b>\n"
             . $request->message;

         Telegram::sendMessage([
             'chat_id' => '-1001829391546',
             'parse_mode' => 'HTML',
             'text' => $text
         ]);

         return redirect()->back();
     }

     public function storePhoto(Request $request)
     {

         $photo = $request->file('file');

         Telegram::sendPhoto([
             'chat_id' => '-1001829391546',
             'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), str_random(10) . '.' . $photo->getClientOriginalExtension()),
             'caption' => 'Photo Image'
         ]);

         return redirect()->back();
     }

}
