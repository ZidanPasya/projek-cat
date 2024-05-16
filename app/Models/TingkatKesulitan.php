<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKesulitan extends Model
{
    use HasFactory;

    protected $table = 'tingkat_kesulitan';
    protected $guarded = ['id_tingkat_kesulitan'];

    public function bank_soal()
    {
        return $this->hasMany(BankSoal::class);
    }
}
