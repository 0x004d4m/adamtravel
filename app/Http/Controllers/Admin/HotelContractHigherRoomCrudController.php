<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractHigherRoomRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractHigherRoomCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractHigherRoom::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-higher-room');
        $this->crud->setEntityNameStrings(__('hotel contract higher room'), __('hotel contract higher rooms'));
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
        $this->crud->addColumn('season_id',[
            'label' => "Season",
            'type' => "select",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->column('single')->type('text');
        $this->crud->column('double')->type('text');
        $this->crud->column('triple')->type('text');
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractHigherRoomRequest::class);
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
        $this->crud->addField([
            'label' => "Season",
            'type' => "relationship",
            'name' => 'season_id',
            'entity' => 'season',
            'attribute' => "name",
            'model' => 'App\Models\Season'
        ]);
        $this->crud->field('single')->default(0)->type('text');
        $this->crud->field('double')->default(0)->type('text');
        $this->crud->field('triple')->default(0)->type('text');
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
