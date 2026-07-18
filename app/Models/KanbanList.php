<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanbanList extends Model
{
    protected $fillable=['board_id', 'title', 'position'];
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
