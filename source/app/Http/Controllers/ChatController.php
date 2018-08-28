<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Validator\MessageValidator;

class ChatController extends Controller
{
    public static function getChatList($user_id)
    {
        try {
            $user = \App\Cliente::findOrFail($user_id);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->withErrors($e);
        }
        $chatList = array();
        
        /*Seleciona a última mensagem de cada conversa da qual o $user_id participa*/
        $lastMessages = \App\Message::where('sender_id', $user_id)
                                        ->orWhere('recipient_id', $user_id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        /***************************************************************************/
                  
        foreach ($lastMessages as $lastMessage) {
            $chatData = [
                'last_message_other_id' => $user_id == $lastMessage->sender_id ? 
                                $lastMessage->recipient_id : $lastMessage->sender_id,
                'last_message_other_name' => $user_id == $lastMessage->sender_id ? 
                                \App\Cliente::find($lastMessage->recipient_id)->nome : 
                                \App\Cliente::find($lastMessage->sender_id)->nome,
                'last_message_time' => $lastMessage->created_at,
                'last_message_text' => $lastMessage->text,
                'last_message_sender_id' => $lastMessage->sender_id,
                'last_message_read' => $lastMessage->b_read,
                'last_message_ad_id' => $lastMessage->ad_id,
                'last_message_ad_title' => \App\Http\Controllers\AnuncioController::getDadosAnuncio($lastMessage->ad_id)['title'],
            ];
            
            $chatList[] = $chatData;
        }
        return $chatList;
    }

    public function getChat($user_id, $other_id, $ad_id)
    {
        $message_list = \App\Message::where('ad_id', $ad_id)
                                    ->where('sender_id', $user_id)
                                    ->orWhere('recipient_id', $user_id)
                                    ->orderBy('created_at')
                                    ->get();
        $other_name = \App\Cliente::find($other_id)->nome;
        $self_name = \App\Cliente::find($user_id)->nome;
        $ad_title = \App\Http\Controllers\AnuncioController::getDadosAnuncio($ad_id)['title'];
        return view('Chat',
                    [
                        'message_list' => $message_list,
                        'other_name' => $other_name,
                        'other_id' => $other_id,
                        'self_name' => $self_name,
                        'ad_title' => $ad_title,
                        'ad_id' => $ad_id,
                    ]);
    }

    public function sendMessage(Request $request)
    {
        try{
            MessageValidator::validateMessage($request->all());
            $message = new \App\Message();
            $message->text = $request->text;
            $message->ad_id = $request->ad_id;
            $message->sender_id = $request->sender_id;
            $message->recipient_id = $request->recipient_id;
            $message->save();
            return back();
        } catch (\App\Validator\ValidationException $e) {
            return back()->withErrors($e->getValidator())
                        ->withInput();
        }
    }

    public static function markAsRead($message_id)
    {
        try{
            $message = \App\Message::findOrFail($message_id);
            $message->b_read = true;
            $message->save();
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return back()->withErrors($e); 
        }
    }
}
?>
