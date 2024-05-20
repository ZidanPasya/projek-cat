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
    public function show(Request $request, BankSoal $bankSoal)
    {
        $soal = BankSoal::where('id_soal', $request->input('soalId'))->first();

        $response = [
            'id_soal' => $soal->id_soal,
            'tingkat_kesulitan' => $soal->tingkat_kesulitan->nm_tingkat_kesulitan,
            'topik' => $soal->topik->nm_topik,
            'pertanyaan' => $soal->pertanyaan,
            'opsi' => Jawaban::where('id_soal', $soal->id_soal)->pluck('jawaban'),
            'jawaban' => Jawaban::where('id_soal', $soal->id_soal)->pluck('is_true'),
            'is_expired' => $soal->is_expired,
        ];

        return response()->json($response);
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
        // Update the expired status
        $bankSoal::where('id_soal', $request->input('soalId'))
            ->update(['is_expired' => $request->input('expired')]);

        $expired = $bankSoal::where('id_soal', $request->input('soalId'))
            ->get();

        // Return a JSON response indicating success
        return response()->json([
            'success' => true,
            'soal_aktif' => BankSoal::where('is_expired', 0)->count(),
            'soal_expired' => BankSoal::where('is_expired', 1)->count(),
            'isExpired' => $expired,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankSoal $bankSoal)
    {
        //
    }
}
