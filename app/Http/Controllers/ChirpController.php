<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\ChirpUser;


class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'min:3', 'max:255'],
        ]);

        $request->user()->chirps()->create($validated);

        return redirect()->route('chirps.index')
            ->with('status', __('Chirp created successfully!'));
    }

    
    public function like(Request $request, Chirp $chirp)
        {
            // Verifica si el usuario ya ha dado like antes
            $existingLike = ChirpUser::where('chirp_id', $chirp->id)
                ->where('user_id', auth()->id())
                ->where('action', 'like')
                ->exists();

            if (!$existingLike) {
                // Registra el like solo si el usuario no ha dado like antes
                $chirp->increment('likes');
                $chirp->save();

                // Registra el like en la tabla chirp_users
                ChirpUser::create([
                    'chirp_id' => $chirp->id,
                    'user_id' => auth()->id(),
                    'action' => 'like',
                ]);
            }

            return back()->with('status', __('Chirp liked successfully!'));
        }

        public function dislike(Request $request, Chirp $chirp)
        {
            // Verifica si el usuario ya ha dado dislike antes
            $existingDislike = ChirpUser::where('chirp_id', $chirp->id)
                ->where('user_id', auth()->id())
                ->where('action', 'dislike')
                ->exists();

            if (!$existingDislike) {
                // Registra el dislike solo si el usuario no ha dado dislike antes
                $chirp->increment('dislikes');
                $chirp->save();

                // Registra el dislike en la tabla chirp_users
                ChirpUser::create([
                    'chirp_id' => $chirp->id,
                    'user_id' => auth()->id(),
                    'action' => 'dislike',
                ]);
            }

            return back()->with('status', __('Chirp disliked successfully!'));
        }



    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => ['required', 'min:3', 'max:255'],
        ]);

        $chirp->update($validated);

        return redirect()->route('chirps.index')
            ->with('status', __('Chirp updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect()->route('chirps.index')
            ->with('status', __('Chirp deleted successfully!'));
    }
}
