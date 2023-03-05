<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationService::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-service');
        $this->crud->setEntityNameStrings('transportation service', 'transportation services');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('kilo_meters')->type('text');
        $this->crud->column('is_extra_mileage')->label('extra mileage')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationServiceRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('kilo_meters')->type('text');
        $this->crud->field('is_extra_mileage')->label('extra mileage')->type('boolean');
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
