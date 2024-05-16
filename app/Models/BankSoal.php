<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    use HasFactory;

    protected $table = 'bank_soal';
    protected $guarded = ['id_soal'];

    public function topik()
    {
        return $this->belongsTo(Topik::class, 'id_topik');
    }

    public function tingkat_kesulitan()
    {
        return $this->belongsTo(TingkatKesulitan::class, 'id_tingkat_kesulitan', 'id_tingkat_kesulitan');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
