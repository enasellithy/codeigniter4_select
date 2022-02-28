<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use phpDocumentor\Reflection\Types\Null_;

class Categorys extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $cats = new Category();
        $data['cats'] = $cats->findAll();
        return view('category_index',$data);
    }

    public function create()
    {
        $cats = new Category();
        $data['cats'] = $cats->where('parent_id =', null)->findAll();
        return view('category_create',$data);
    }

    public function store()
    {
        $model = new Category();
        $data = [
            'name' => $this->request->getVar('name'),
            'parent_id'  => $this->request->getVar('parent_id'),
        ];
        $model->saveCategory($data);
        return $this->response->redirect('/');
    }

    public function getCatWithId($id = null)
    {
        $cats = new Category();
        $data = $cats->where('parent_id =', $id)->select('id,name')->findAll();
        return $this->response->setJson($data);
    }
}
