<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProvidedServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ProvidedServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\ProvidedService::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/provided-service');
        $this->crud->setEntityNameStrings('provided service', 'provided services');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('description');
        $this->crud->column('child_per_person');
        $this->crud->column('child_per_groub');
        $this->crud->column('adult_per_groub');
        $this->crud->column('adult_per_person');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProvidedServiceRequest::class);

        $this->crud->field('name');
        $this->crud->field('description');
        $this->crud->field('child_per_person');
        $this->crud->field('child_per_groub');
        $this->crud->field('adult_per_groub');
        $this->crud->field('adult_per_person');
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
