<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'views', 'cate_id',
                            'short_desc', 'star', 'detail'];
}

?>