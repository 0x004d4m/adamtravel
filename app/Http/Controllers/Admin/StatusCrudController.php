<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StatusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class StatusCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Status::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/status');
        $this->crud->setEntityNameStrings('status', 'statuses');
    }

    protected function setupListOperation()
    {
        $this->crud->column('code')->type('text');
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StatusRequest::class);

        $this->crud->field('code')->type('text');
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
