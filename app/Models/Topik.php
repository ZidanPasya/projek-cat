<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;

    protected $table = 'topiks';
    protected $guarded = ['id'];

    public function bank_soal()
    {
        return $this->hasMany(BankSoal::class);
    }
}
