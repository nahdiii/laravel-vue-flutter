<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Datakirim extends Model
{
    protected $table = "datakirims";
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id', 'kategori_id'];

   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
