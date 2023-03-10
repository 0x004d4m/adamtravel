<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Log;

class HotelContractCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContract::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract');
        $this->crud->setEntityNameStrings(__('hotel contract'), __('hotel contracts'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->label('Contract Name')->type('text');
        $this->crud->addColumn('hotel_id',[
            'label' => "Hotel",
            'type' => "select",
            'name' => 'hotel_id',
            'entity' => 'hotel',
            'attribute' => "name",
            'model' => 'App\Models\Hotel'
        ]);
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
        $this->crud->column('group_rate')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->label('Contract Name')->type('text');
        $this->crud->addField([
            'label' => "Hotel Name",
            'type' => "relationship",
            'name' => 'hotel_id',
            'entity' => 'hotel',
            'attribute' => "name",
            'model' => 'App\Models\Hotel'
        ]);
        $this->crud->field('starting_date')->type('date');
        $this->crud->field('ending_date')->type('date');
        $this->crud->field('group_rate')->default(0)->type('text');
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
            'name'           => 'hotelContractSeasons',
            'label'          => 'Seasonalities',
            'backpack_crud'  => 'hotel-contract-season',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'season',
                    'name'  => 'season.name',
                ],
                [
                    'label' => 'starting date',
                    'name'  => 'starting_date',
                ],
                [
                    'label' => 'ending date',
                    'name'  => 'ending_date',
                ],
                [
                    'label' => 'notes',
                    'name'  => 'notes',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'hotelContractRates',
            'label'          => 'Rates',
            'backpack_crud'  => 'hotel-contract-rate',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'Season',
                    'name'  => 'season.name',
                ],
                [
                    'label' => 'double',
                    'name'  => 'double',
                ],
                [
                    'label' => 'single supplement',
                    'name'  => 'single_supplement',
                ],
                [
                    'label' => 'third person',
                    'name'  => 'third_person',
                ],
                [
                    'label' => 'breakfast',
                    'name'  => 'breakfast',
                ],
                [
                    'label' => 'lunch',
                    'name'  => 'lunch',
                ],
                [
                    'label' => 'all inc',
                    'name'  => 'all_inc',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'hotelContractHigherRooms',
            'label'          => 'Higher Rooms',
            'backpack_crud'  => 'hotel-contract-higher-room',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'Room Type',
                    'name'  => 'roomType.name',
                ],
                [
                    'label' => 'Season',
                    'name'  => 'season.name',
                ],
                [
                    'label' => 'single',
                    'name'  => 'single',
                ],
                [
                    'label' => 'double',
                    'name'  => 'double',
                ],
                [
                    'label' => 'triple',
                    'name'  => 'triple',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'hotelContractNotes',
            'label'          => 'Notes',
            'backpack_crud'  => 'hotel-contract-note',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'description',
                    'name'  => 'description',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'hotelContractSupplements',
            'label'          => 'Supplements',
            'backpack_crud'  => 'hotel-contract-supplement',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'price',
                    'name'  => 'price',
                ],
                [
                    'label' => 'starting date',
                    'name'  => 'starting_date',
                ],
                [
                    'label' => 'ending date',
                    'name'  => 'ending_date',
                ],
                [
                    'label' => 'optional',
                    'name'  => 'is_optional',
                    'type'  => 'boolean',
                ],
                [
                    'label' => 'notes',
                    'name'  => 'notes',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'hotelContractOccupancies',
            'label'          => 'Occupancies',
            'backpack_crud'  => 'hotel-contract-occupancy',
            'relation_attribute' => 'hotel_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'room type',
                    'name'  => 'roomType.name',
                ],
                [
                    'label' => 'max adults',
                    'name'  => 'max_adults',
                ],
                [
                    'label' => 'max children',
                    'name'  => 'max_children',
                ],
                [
                    'label' => 'notes',
                    'name'  => 'notes',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_panel',
            'name'           => 'hotelContractFreePolicies',
            'label'          => 'Free Policy',
            'backpack_crud'  => 'hotel-contract-free-policy',
            'relation_attribute' => 'hotel_contract_id',
            'fields' => [
                [
                    'label' => 'number of free pax',
                    'name'  => 'number_of_free_pax',
                ],
                [
                    'label' => 'room',
                    'closure' => function($entry){
                        $labels=array(
                            1=>__('content.singleRoom'),
                            2=>__('content.sharingDouble'),
                        );
                        return $labels[$entry->room];
                    }
                ],
                [
                    'label' => 'every',
                    'name'  => 'every',
                ],
                [
                    'label' => 'type',
                    'closure' => function($entry){
                        $labels=array(
                            1=>__('content.pax'),
                            2=>__('content.room'),
                        );
                        return $labels[$entry->type];
                    }
                ],
                [
                    'label' => 'maximum',
                    'name'  => 'maximum',
                ],
            ],
        ])->to('after_content');
    }
}
