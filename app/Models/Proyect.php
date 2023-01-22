<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;
    protected $table = 'proyects';
    protected $fillable = ['title', 'content', 'image', 'category_id'];
    public function categories(){
    return $this->belongsTo(Category::class,'category_id');
    }
}
