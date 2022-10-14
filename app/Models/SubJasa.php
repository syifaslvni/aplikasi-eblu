<?php

namespace App\Models;

use App\Models\Product;
use App\Models\JenisJasa;
use App\Models\SubSubJasa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubJasa extends Model
{
    use HasFactory;
    
    protected $table = 'subjasas';
    protected $fillable = ['title', 'slug', 'jenisjasa_id'];

    public function jenisjasa()
    {
        return $this->belongsTo(JenisJasa::class);
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
