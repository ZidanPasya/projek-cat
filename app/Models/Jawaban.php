<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $guarded = ['id_jawaban'];

    public function bank_soal()
    {
        return $this->belongsTo(BankSoal::class, 'id_soal', 'id_soal');
    }
}
