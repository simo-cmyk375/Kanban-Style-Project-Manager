<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable=['kanban_list_id', 'title', 'description', 'position'];
    public function kanbanList()
{
    // A card belongs to one specific list
    return $this->belongsTo(KanbanList::class); 
}
}
