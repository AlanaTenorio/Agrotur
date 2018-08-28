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
}
?>
