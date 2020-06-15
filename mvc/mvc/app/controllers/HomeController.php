<?php
namespace App\Controllers;
use App\Models\Product;

class HomeController extends BaseController{

    public function index(){
        $products = Product::all();
        $this->render('home.trang-chu', ['products' => $products]);
        // include_once './app/views/home/trang-chu.php';
    }
    public function testLayout(){
        $this->render('layouts.main');
    }
}

?>