<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'link', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
