<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubJasa;
use App\Models\SubSubJasa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisJasa extends Model
{
    use HasFactory;
    
    protected $table = 'jenisjasas';
    protected $fillable = ['title', 'slug'];

    public function subjasa()
    {
        return $this->hasMany(SubJasa::class);
    }

    public function subsubjasa()
    {
        return $this->hasMany(SubSubJasa::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }
}
