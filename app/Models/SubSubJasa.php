<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubJasa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubJasa extends Model
{
    use HasFactory;
    
    protected $table = 'subsubjasas';
    protected $fillable = ['title', 'slug', 'subjasa_id'];

    public function subjasa()
    {
        return $this->belongsTo(SubJasa::class);
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
