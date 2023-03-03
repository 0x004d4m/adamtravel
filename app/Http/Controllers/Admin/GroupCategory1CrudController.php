<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupCategory1Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GroupCategory1CrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\GroupCategory1::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/group-category1');
        $this->crud->setEntityNameStrings('group category1', 'group category1s');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GroupCategory1Request::class);

        $this->crud->field('name')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
