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
        $this->crud->column('name');
        $this->crud->column('number_of_people');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VehicleTypeRequest::class);

        $this->crud->field('name');
        $this->crud->field('number_of_people');
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
