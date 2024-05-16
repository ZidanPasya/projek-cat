<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('topik.index', [
            'topiks' => Topik::all(),
            'soals' => BankSoal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nm_topik' => 'required|max:255',
        ]);

        Topik::create(['nm_topik' => $validatedData['nm_topik']]);

        return redirect('/topik');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topik $topik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topik $topik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topik $topik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topik $topik)
    {
        //
    }
}
