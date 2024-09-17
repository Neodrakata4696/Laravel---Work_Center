<?php

namespace App\Http\Controllers;

use App\Models\work_center;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class WorkCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('works.index', ['works' => work_center::with('user')->latest()->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        
        $request->user()->works()->create($validated);
        
        return redirect(route('works.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(work_center $work_center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(work_center $work_center): View
    {
        Gate::authorize('update', $work_center);
        
        return view('works.edit', ['work_center' => $work_center,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, work_center $work_center): RedirectResponse
    {
        Gate::authorize('update', $work_center);
        
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        
        $work_center->update($validated);
        
        return redirect(route('works.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(work_center $work_center): RedirectResponse
    {
        Gate::authorize('delete', $work_center);
        
        $work_center->delete();
        
        return redirect(route('works.index'));
    }
}
