<?php

class AdminController
{
    public function index()
    {
        // Logic for admin dashboard
        $title = "Admin Dashboard";
        $view = "admin/dashboard";
        require_once PATH_VIEW_MAIN;
    }

    public function manageProducts()
    {
        // Logic for managing products
        $title = "Manage Products";

        $view = "admin/manage_products";
        require_once PATH_VIEW_MAIN;
    }
    public function dashboard()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }

        $title = "Admin Dashboard";
        $view = "admin/dashboard";


        require_once PATH_VIEW_MAIN;
    }
}
