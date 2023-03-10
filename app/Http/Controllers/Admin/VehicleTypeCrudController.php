<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VehicleTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class VehicleTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\VehicleType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/vehicle-type');
        $this->crud->setEntityNameStrings('vehicle type', 'vehicle types');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('seats')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VehicleTypeRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('seats')->default(0)->type('text');
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
