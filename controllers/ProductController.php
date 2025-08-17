<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $title = "Trang chủ";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        $view = 'client/product_detail';
        require_once PATH_VIEW_MAIN;
    }
}
