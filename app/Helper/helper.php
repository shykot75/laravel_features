<?php
use App\Models\SendGmail;

function mail_count(){
    $mail = SendGmail::count();
    return $mail;
}

