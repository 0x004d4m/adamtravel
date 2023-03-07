<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationContractServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class TransportationContractServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationContractService::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-contract-service');
        $this->crud->setEntityNameStrings(__('transportation contract service'), __('transportation contract services'));
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
        $this->crud->addColumn('season_id',[
            'label' => "Season",
            'type' => "select",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->addColumn('transportation_service_id',[
            'label' => "Transportation Service",
            'type' => "select",
            'name' => 'transportation_service_id',
            'entity' => 'transportationService',
            'attribute' => "name",
            'model' => 'App\Models\TransportationService'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationContractServiceRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'transportation_contract_id',
            'default' => $_GET['transportation_contract_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Season",
            'type' => "relationship",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->addField([
            'label' => "Transportation Service",
            'type' => "relationship",
            'name' => 'transportation_service_id',
            'entity' => 'transportationService',
            'attribute' => "name",
            'model' => 'App\Models\TransportationService'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'TransportationContractServicePrices',
            'label'          => 'Routes',
            'backpack_crud'  => 'transportation-contract-service-price',
            'relation_attribute' => 'transportation_contract_service_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'vehicle type',
                    'name'  => 'vehicleType.name',
                ],
                [
                    'label' => 'price',
                    'name'  => 'price',
                ],
            ],
        ])->to('after_content');
    }
}
