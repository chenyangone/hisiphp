<?php
namespace app\loan_shop\admin;
use app\admin\controller\Admin;

class Index extends Admin
{
    public function index()
    {
        return $this->afetch();
    }
}