<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InclusionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class InclusionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Inclusion::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/inclusion');
        $this->crud->setEntityNameStrings('inclusion', 'inclusions');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('is_inclusion');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InclusionRequest::class);

        $this->crud->field('name');
        $this->crud->field('is_inclusion');
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
