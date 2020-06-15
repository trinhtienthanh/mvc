<?php

$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './common/util.php';
require_once './vendor/autoload.php';
require_once './common/database.php'; // bắt buộc require sau vendor/autoload

use App\Controllers\HomeController;
use App\Controllers\ProductController;


switch($url){
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'demo-layout':
        $ctr = new HomeController();
        $ctr->testLayout();
        break;
    case 'delete-product':
        $ctr = new ProductController();
        $ctr->delete();
        break;
    case 'add-product':
        $ctr = new ProductController();
        $ctr->addForm();
        break;
    case 'save-add':
        $ctr = new ProductController();
        $ctr->saveAdd();
        break;
    case 'save-edit':
        $ctr = new ProductController();
        $ctr->saveEdit();
        break;
    case 'edit-product':
        $ctr = new ProductController();
        $ctr->editForm();
        break;
    case 'chi-tiet':
        $ctr = new ProductController();
        $ctr->chitiet();
        break;
    default:
        echo "Đường dẫn không tồn tại";
        break;
}
?>