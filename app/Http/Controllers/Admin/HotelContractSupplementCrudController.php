<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractSupplementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractSupplementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractSupplement::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-supplement');
        $this->crud->setEntityNameStrings(__('hotel contract supplement'), __('hotel contract supplements'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->addColumn('hotel_contract_id',[
            'label' => "Hotel Contract",
            'type' => "select",
            'name' => 'hotel_contract_id',
            'entity' => 'hotelContract',
            'attribute' => "name",
            'model' => 'App\Models\HotelContract'
        ]);
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
        $this->crud->column('price')->type('text');
        $this->crud->column('is_optional')->label('optional')->type('boolean');
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelContractSupplementRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'type' => "hidden",
            'name' => 'hotel_contract_id',
            'default' => $_GET['hotel_contract_id'] ?? null
        ]);
        $this->crud->field('starting_date')->type('date');
        $this->crud->field('ending_date')->type('date');
        $this->crud->field('price')->default(0)->type('text');
        $this->crud->field('is_optional')->label('optional')->type('boolean');
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
