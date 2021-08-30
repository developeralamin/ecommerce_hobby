<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
   protected $fillable = [
      'product_name',
      'category_id',
      'subcategory_id',
      'product_price',
      'product_quantity',
      'product_summary',
      'product_description',
      'product_thumbnail',

     ];

    use HasFactory;
    public function category(){
   	   return $this->belongsTo(Category::class,'category_id','id');
   }

   public function subcategory(){
   	   return $this->belongsTo(SubCategory::class,'category_id','id');
   }

}
