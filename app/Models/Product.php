<?php

namespace App\Models;

use App\Models\SubJasa;
use App\Models\JenisJasa;
use App\Models\SubSubJasa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'content',
        'jenisjasa_id',
        'subjasa_id',
        'subsubjasa_id',
    ];
        
    public function jenisjasa()
    {
        return $this->belongsTo(JenisJasa::class, 'jenisjasa_id', 'id');
    }
        
    public function subjasa()
    {
        return $this->belongsTo(SubJasa::class, 'subjasa_id', 'id');
    }
        
    public function subsubjasa()
    {
        return $this->belongsTo(SubSubJasa::class, 'subsubjasa_id', 'id');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function scopeSearchjj($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function scopeSearchsj($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function scopeSearchssj($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }
}
