<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\Jawaban;
use App\Models\TingkatKesulitan;
use App\Models\Topik;
use Illuminate\Http\Request;

class BankSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('soal.index', [
            'soals' => BankSoal::all(),
            'jawabans' => Jawaban::all(),
            'total_soal' => BankSoal::count(),
            'soal_aktif' => BankSoal::where('is_expired', 0)->count(),
            'soal_expired' => BankSoal::where('is_expired', 1)->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('soal.create', [
            'tingkats' => TingkatKesulitan::all(),
            'topiks' => Topik::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedDataSoal = $request->validate([
            'pertanyaan' => 'required|max:1023',
            'id_topik' => 'required',
            'id_tingkat_kesulitan' => 'required',
            'is_expired' => 'required'
        ]);

        $banksoal = BankSoal::create($validatedDataSoal);

        $id_soal = $banksoal->id;
        // dd($id_soal);
        $validatedDataJawaban = $request->validate([
            'jawaban1' => 'required',
            'jawaban_text1' => 'required|max:255',
            'jawaban2' => 'required',
            'jawaban_text2' => 'required|max:255',
            'jawaban3' => 'required',
            'jawaban_text3' => 'required|max:255',
            'jawaban4' => 'required',
            'jawaban_text4' => 'required|max:255',
        ]);

        Jawaban::create([
            'id_soal' => $id_soal,
            'jawaban' => $validatedDataJawaban['jawaban_text1'],
            'is_true' => $validatedDataJawaban['jawaban1']
        ]);

        Jawaban::create([
            'id_soal' => $id_soal,
            'jawaban' => $validatedDataJawaban['jawaban_text2'],
            'is_true' => $validatedDataJawaban['jawaban2']
        ]);

        Jawaban::create([
            'id_soal' => $id_soal,
            'jawaban' => $validatedDataJawaban['jawaban_text3'],
            'is_true' => $validatedDataJawaban['jawaban3']
        ]);

        Jawaban::create([
            'id_soal' => $id_soal,
            'jawaban' => $validatedDataJawaban['jawaban_text4'],
            'is_true' => $validatedDataJawaban['jawaban4']
        ]);

        return redirect('/soal');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankSoal $bankSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankSoal $bankSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankSoal $bankSoal)
    {
        $is_expired = $request->expired;

        BankSoal::where('id_soal', $bankSoal->id_soal)
            ->update('is_expired', $is_expired);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankSoal $bankSoal)
    {
        //
    }
}
