<?php

namespace App\Helpers\Student;
use App\Helpers\Student\HelperStudent;
use Auth;

class HelperMessage
{
    public static function displayMessage($messages,$id)
    {
        $output = '';
        $output .= '<div class="message-container">'; 
        $output .= '<div class="h4">'.HelperStudent::studentInfoHandler($id)->name.'</div>';
        $output .= '<div class="message-wrapper">';
        if($messages->isNotEmpty())
        {
            foreach($messages as $message)
            {
                if($message->from == Auth::user()->id){ $output .= '<div class="direct-chat-msg right">'; }
                else{ $output .= '<div class="direct-chat-msg">'; }
                    $output .= '<div class="direct-chat-infos clearfix">';
                    // if($message->from == Auth::user()->id){ $output .= '<span class="direct-chat-name float-right">'.HelperStudent::studentInfoHandler($message->from)->name.'</span>'; }
                    // else{ $output .= '<span class="direct-chat-name">'.HelperStudent::studentInfoHandler($message->to)->name.'</span>'; }
                    if($message->from == Auth::user()->id){ $output .= '<span class="direct-chat-timestamp float-left">'.$message->created_at->diffForHumans().'</span>'; }
                    else{ $output .= '<span class="direct-chat-timestamp float-right">'.$message->created_at->diffForHumans().'</span>'; }
                    $output .= '</div>';
                    $output .= '<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="">';
                    if($message->from == Auth::user()->id){
                        $output .= '<div class="direct-chat-text bg-info">';
                    }else{$output .= '<div class="direct-chat-text">';}
                    
                    $output .= $message->message;
                    $output .= '</div>';
                $output .= '</div>';    
            }   
        }
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="input-group mt-3">';
        $output .= '<input type="text" name="message" placeholder="Type Message ..." class="form-control input-message">';
        $output .= '<span class="input-group-append">';
        $output .= '<button type="button" class="btn "><i class="fas fa-paper-plane"></i></button>';
        $output .= '</span>';
        $output .= '</div>';
        return $output;
    }

}

?>