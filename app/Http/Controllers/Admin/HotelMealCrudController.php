<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelMealRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelMealCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\HotelMeal::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel-meal');
        $this->crud->setEntityNameStrings('hotel meal', 'hotel meals');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('is_bb')->label('BB')->type('boolean');
        $this->crud->column('is_hb')->label('HB')->type('boolean');
        $this->crud->column('is_fb')->label('FB')->type('boolean');
        $this->crud->column('is_all_inc')->label('All Inc.')->type('boolean');
        $this->crud->column('is_ro')->label('RO')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelMealRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('is_bb')->label('BB')->type('boolean');
        $this->crud->field('is_hb')->label('HB')->type('boolean');
        $this->crud->field('is_fb')->label('FB')->type('boolean');
        $this->crud->field('is_all_inc')->label('All Inc.')->type('boolean');
        $this->crud->field('is_ro')->label('RO')->type('boolean');
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
