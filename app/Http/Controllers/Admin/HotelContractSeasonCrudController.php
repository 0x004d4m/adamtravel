<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractSeasonRequest;
use App\Models\HotelContract;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractSeasonCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractSeason::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-season');
        $this->crud->setEntityNameStrings(__('hotel contract season'), __('hotel contract seasons'));
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
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractSeasonRequest::class);

        if(isset($_GET['hotel_contract_id'])){
            $HotelContract = HotelContract::where('id', $_GET['hotel_contract_id'])->first();
        }
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
            'model' => 'App\Models\Season',
        ]);
        $this->crud->field('starting_date')->type('date')->attributes([
            'min'=>$HotelContract->starting_date??'1900-01-01',
            'max'=>$HotelContract->ending_date??'4000-01-01',
        ]);
        $this->crud->field('ending_date')->type('date')->attributes([
            'min'=>$HotelContract->starting_date??'1900-01-01',
            'max'=>$HotelContract->ending_date??'4000-01-01',
        ]);
        $this->crud->field('notes')->type('textarea');
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
