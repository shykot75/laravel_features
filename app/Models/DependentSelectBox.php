<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependentSelectBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'tags',
        'category_id',
        'subcategory_id',
        'sub_subcategory_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
    public function subSubCategory(){
        return $this->belongsTo(SubSubCategory::class, 'sub_subcategory_id', 'id');
    }






}
