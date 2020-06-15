<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;
class ProductController extends BaseController{
    public function chitiet(){
        echo "Trang chi tiet san pham";
    }
    public function delete(){

    	$id = $_GET['id']; // lấy id từ đường dẫn
    	Product::destroy($id);
    	header("location: " . BASE_URL . "?msg=Xóa thành công!");
    }
    public function addForm(){
    	$category = Category::all();
        $this->render('home.add', ['category' => $category]);
        // include_once './app/views/home/add.php';
    }
    public function editForm(){
        $id = $_GET['id'];
        $model = Product::find($id);
        if(!$model){
            header("location: " . BASE_URL . "?msg=sản phẩm không tồn tại!");
        }
        $category = Category::all();

        include_once './app/views/home/edit.php';
    }
    public function saveAdd(){
	    $model = new Product();
        // gán dữ liệu cho model
        $model->fill($_POST);
        
        // upload ảnh
        $file = $_FILES['image'];
        if($file['size'] > 0){
            $filename = uniqid() . '-' . $file['name'];
            $destination = "./public/uploads/products/" . $filename;
            move_uploaded_file($file['tmp_name'], $destination);
            $model->image = ltrim($destination, './');
        }
        
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . '');
        die;
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $model = Product::find($id);
        if(!$model){
            header("location: " . BASE_URL . "?msg=sản phẩm không tồn tại!");
        }
        // gán dữ liệu cho model
        $model->fill($_POST);
        
        // upload ảnh
        $file = $_FILES['image'];
        if($file['size'] > 0){
            $filename = uniqid() . '-' . $file['name'];
            $destination = "./public/uploads/products/" . $filename;
            move_uploaded_file($file['tmp_name'], $destination);
            $model->image = ltrim($destination, './');
        }
        
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . '');
        die;
    }
}
?>