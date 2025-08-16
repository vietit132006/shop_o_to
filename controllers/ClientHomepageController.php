<?php

class ClientHomepageController
{
    public $model;

    public function __construct()
    {
        $this->model = new ClientHomepageModel();
    }
}
