<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id','namaKategori', 'jumlah'];

    public function datakirim()
    {
        return $this->hasMany(Datakirim::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
