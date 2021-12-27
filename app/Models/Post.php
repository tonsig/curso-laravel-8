<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';  // qual tabela no banco esse model representa 
    protected $fillable = ['title', 'content']; // quais colunas podem ser preenchidas - evita um exception
    

}
