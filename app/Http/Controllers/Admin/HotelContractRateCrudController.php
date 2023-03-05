<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractRateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractRateCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractRate::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-rate');
        $this->crud->setEntityNameStrings(__('hotel contract rate'), __('hotel contract rates'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('hotel_contract_id',[
            'label' => "Hotel Contract",
            'type' => "select",
            'name' => 'hotel_contract_id',
            'entity' => 'hotelContract',
            'attribute' => "name",
            'model' => 'App\Models\HotelContract'
        ]);
        $this->crud->addColumn('season_id',[
            'label' => "Season",
            'type' => "select",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->column('double')->type('text');
        $this->crud->column('single_supplement')->type('text');
        $this->crud->column('third_person')->type('text');
        $this->crud->column('breakfast')->type('text');
        $this->crud->column('lunch')->type('text');
        $this->crud->column('dinner')->type('text');
        $this->crud->column('all_inc')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractRateRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'hotel_contract_id',
            'default' => $_GET['hotel_contract_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Season",
            'type' => "relationship",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->field('double')->label('Double Room')->type('text');
        $this->crud->field('single_supplement')->type('text');
        $this->crud->field('third_person')->label('Third Person/Extra Bed')->type('text');
        $this->crud->field('breakfast')->type('text');
        $this->crud->field('lunch')->type('text');
        $this->crud->field('dinner')->type('text');
        $this->crud->field('all_inc')->type('text');
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
