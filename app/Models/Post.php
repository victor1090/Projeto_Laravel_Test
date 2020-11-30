<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public $timestamps =false; //Desabilita timestamps da Tabela para
    // não dar erro caso tire o campo da tabela.
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'author'
    ]; //Método pra evitar fazer a inserção campo a campo no Controllador

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
