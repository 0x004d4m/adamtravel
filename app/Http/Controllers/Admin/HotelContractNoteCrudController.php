<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractNoteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractNoteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractNote::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-note');
        $this->crud->setEntityNameStrings(__('hotel contract note'), __('hotel contract notes'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('description')->type('textarea');
        $this->crud->addColumn('hotel_contract_id',[
            'label' => "Hotel Contract",
            'type' => "select",
            'name' => 'hotel_contract_id',
            'entity' => 'hotelContract',
            'attribute' => "name",
            'model' => 'App\Models\HotelContract'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractNoteRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('description')->type('textarea');
        $this->crud->addField([
            'type' => "hidden",
            'name' => 'hotel_contract_id',
            'default' => $_GET['hotel_contract_id'] ?? null
        ]);
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
