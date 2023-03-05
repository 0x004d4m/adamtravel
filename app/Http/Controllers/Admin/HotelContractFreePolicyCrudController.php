<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractFreePolicyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelContractFreePolicyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractFreePolicy::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-free-policy');
        $this->crud->setEntityNameStrings(__('hotel contract free policy'), __('hotel contract free policies'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('number_of_free_pax')->type('text');
        $this->crud->column('is_single_room')->label('single room')->type('boolean');
        $this->crud->column('is_sharing_double_room')->label('sharing double room')->type('boolean');
        $this->crud->column('every')->type('text');
        $this->crud->column('is_pax')->label('pax')->type('boolean');
        $this->crud->column('is_room')->label('room')->type('boolean');
        $this->crud->column('maximum')->type('boolean');
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
        $this->crud->setValidation(HotelContractFreePolicyRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('number_of_free_pax')->type('text');
        $this->crud->field('is_single_room')->label('single room')->type('boolean');
        $this->crud->field('is_sharing_double_room')->label('sharing double room')->type('boolean');
        $this->crud->field('every')->type('text');
        $this->crud->field('is_pax')->label('pax')->type('boolean');
        $this->crud->field('is_room')->label('room')->type('boolean');
        $this->crud->field('maximum')->type('boolean');
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
