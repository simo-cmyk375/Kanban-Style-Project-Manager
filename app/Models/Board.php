<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable=['user_id', 'title', 'description'];
    public function cards()
{
    // One list has many cards inside it
    return $this->hasMany(Card::class);
}
public function user(){
    return $this->belongsTo(User::class);
}
 public function KanbanLists()
{
    // One list has many cards inside it
    return $this->hasMany(KanbanList::class);
}
}
