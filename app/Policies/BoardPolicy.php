<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Board;

class BoardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }
    public function view(User$user,Board $board)
    {
        return $user->id===$board->user_id ;
    }
    public function delete(User$user,Board $board)
    {
        return $user->id===$board->user_id ;
    }
    public function update(User$user,Board $board)
    {
        return $user->id===$board->user_id ;
    }
     public function edit(User$user,Board $board)
    {
        return $user->id===$board->user_id ;
    }
}
