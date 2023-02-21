<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GroupCategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\GroupCategory::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/group-category');
        $this->crud->setEntityNameStrings('group category', 'group categories');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GroupCategoryRequest::class);

        $this->crud->field('name');
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
