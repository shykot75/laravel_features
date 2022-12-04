<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendGmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'subject',
        'body'
    ];


}
