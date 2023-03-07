<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationContractServicePriceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationContractServicePriceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationContractServicePrice::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-contract-service-price');
        $this->crud->setEntityNameStrings(__('transportation contract service price'), __('transportation contract service prices'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('transportation_contract_service_id',[
            'label' => "Transportation Contract Service",
            'type' => "select",
            'name' => 'transportation_contract_service_id',
            'entity' => 'transportationContractService',
            'attribute' => "name",
            'model' => 'App\Models\TransportationContractService'
        ]);$this->crud->addColumn('vehicle_type_id',[
            'label' => "Vehicle Type",
            'type' => "select",
            'name' => 'vehicle_type_id',
            'entity' => 'vehicleType',
            'attribute' => "name",
            'model' => 'App\Models\VehicleType'
        ]);
        $this->crud->column('price')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationContractServicePriceRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'transportation_contract_service_id',
            'default' => $_GET['transportation_contract_service_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Vehicle Type",
            'type' => "relationship",
            'name' => 'vehicle_type_id',
            'entity' => 'vehicleType',
            'attribute' => "name",
            'model' => 'App\Models\VehicleType'
        ]);
        $this->crud->field('price')->default(0)->type('text');
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
