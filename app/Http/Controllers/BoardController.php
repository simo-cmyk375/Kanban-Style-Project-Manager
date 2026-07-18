<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board; // Added import
use Illuminate\Support\Facades\Auth; // Added import
use Illuminate\Support\Facades\Gate;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Auth::user()->boards;
        return view('boards.index', compact('boards')); // 'compact' is a cleaner way to pass variables
    }

    public function create()
    {
        return view('boards.create'); // Usually, create has its own view, or you use a modal on index
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable', // Fixed contradiction
        ]);

        Auth::user()->boards()->create($validated); // Fixed capitalization to boards()
        
        return redirect('/boards')->with('success', 'Board created successfully!');
    }

    public function show(Board $board) // Used Route Model Binding
    {
        // SECURITY: Prevent users from viewing other people's boards
        if(Gate::denies('view',$board)){
            return abort(403);
        }

        return view('boards.show', compact('board'));
    }

    public function edit(Board $board) // Used Route Model Binding
    {
        // SECURITY Check
        if(Gate::denies('edit',$board)){
            return abort(403);
        }

        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        // SECURITY Check
        if(Gate::denies('update',$board)){
            return abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable', // Fixed contradiction
        ]);

        $board->update($validated);
        
        return redirect('/boards')->with('success', 'Board updated successfully!');
    }

    public function destroy(Board $board)
    {
        // SECURITY Check
        if(Gate::denies('delete',$board)){
            return abort(4003);
        }

        $board->delete();
        
        return redirect('/boards')->with('success', 'Board deleted successfully!');
    }
}