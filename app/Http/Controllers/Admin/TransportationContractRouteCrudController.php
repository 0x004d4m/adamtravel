<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationContractRouteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationContractRouteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationContractRoute::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-contract-route');
        $this->crud->setEntityNameStrings(__('transportation contract route'), __('transportation contract routes'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('transportation_contract_id',[
            'label' => "Transportation Contract",
            'type' => "select",
            'name' => 'transportation_contract_id',
            'entity' => 'transportationContract',
            'attribute' => "name",
            'model' => 'App\Models\TransportationContract'
        ]);
        $this->crud->addColumn('route_id',[
            'label' => "Route",
            'type' => "select",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
        $this->crud->column('car_price')->type('text');
        $this->crud->column('van_price')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationContractRouteRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'transportation_contract_id',
            'default' => $_GET['transportation_contract_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Route",
            'type' => "relationship",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
        $this->crud->field('car_price')->type('text');
        $this->crud->field('van_price')->type('text');
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
