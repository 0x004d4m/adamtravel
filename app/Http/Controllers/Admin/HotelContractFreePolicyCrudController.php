<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelContractFreePolicyRequest;
use App\Models\HotelContract;
use App\Models\HotelContractFreePolicy;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

class HotelContractFreePolicyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelContractFreePolicy::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-contract-free-policy');
        $this->crud->setEntityNameStrings(__('hotel contract free policy'), __('hotel contract free policies'));
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(HotelContractFreePolicyRequest::class);
        $this->crud->addSaveAction(['name'=>'Save and back']);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('number_of_free_pax')->default(0)->type('text');
        $this->crud->field('room')->label('room')->type('radio')->options([
            1=>__('content.singleRoom'),
            2=>__('content.sharingDouble'),
        ])->default(1);
        $this->crud->field('every')->default(0)->type('text');
        $this->crud->field('type')->label('type')->type('radio')->options([
            1=>__('content.pax'),
            2=>__('content.room'),
        ])->default(1);
        $this->crud->field('maximum')->default(0)->type('text');
    }

    protected function setupShowOperation()
    {
        $this->crud->column('number_of_free_pax')->type('text');
        $this->crud->column('room')->label('room')->type('radio')->options([
            1=>__('content.singleRoom'),
            2=>__('content.sharingDouble'),
        ])->default(1);
        $this->crud->column('every')->type('text');
        $this->crud->column('type')->label('type')->type('radio')->options([
            1=>__('content.pax'),
            2=>__('content.room'),
        ])->default(1);
        $this->crud->column('maximum')->type('text');
    }
}
