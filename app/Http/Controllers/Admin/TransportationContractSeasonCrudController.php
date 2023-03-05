<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationContractSeasonRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationContractSeasonCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationContractSeason::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-contract-season');
        $this->crud->setEntityNameStrings(__('transportation contract season'), __('transportation contract seasons'));
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
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationContractSeasonRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
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
        $this->crud->field('starting_date')->type('date');
        $this->crud->field('ending_date')->type('date');
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
