<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractOccupancyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractOccupancyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractOccupancy::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-occupancy');
        $this->crud->setEntityNameStrings(__('hotel contract occupancy'), __('hotel contract occupancies'));
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
        $this->crud->addColumn('room_type_id',[
            'label' => "Room Type",
            'type' => "select",
            'name' => 'room_type_id',
            'entity' => 'roomType',
            'attribute' => "name",
            'model' => 'App\Models\RoomType'
        ]);
        $this->crud->column('max_adults')->type('text');
        $this->crud->column('max_children')->type('text');
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractOccupancyRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'hotel_contract_id',
            'default' => $_GET['hotel_contract_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Room Type",
            'type' => "relationship",
            'name' => 'room_type_id',
            'entity' => 'roomType',
            'attribute' => "name",
            'model' => 'App\Models\RoomType'
        ]);
        $this->crud->field('max_adults')->default(0)->type('text');
        $this->crud->field('max_children')->default(0)->type('text');
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
