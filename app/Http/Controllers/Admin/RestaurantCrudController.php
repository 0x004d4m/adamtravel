<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RestaurantCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Restaurant::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/restaurant');
        $this->crud->setEntityNameStrings(__('restaurant'), __('restaurants'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('tel')->type('text');
        $this->crud->column('fax')->type('text');
        $this->crud->column('mobile')->type('text');
        $this->crud->column('emergency_number')->type('text');
        $this->crud->column('email')->type('text');
        $this->crud->column('website')->type('text');
        $this->crud->column('contact')->type('text');
        $this->crud->column('p_o_box')->type('text');
        $this->crud->column('address')->type('text');
        $this->crud->addColumn('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->column('notes')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RestaurantRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('tel')->type('text');
        $this->crud->field('fax')->type('text');
        $this->crud->field('mobile')->type('text');
        $this->crud->field('emergency_number')->type('text');
        $this->crud->field('email')->type('text');
        $this->crud->field('website')->type('text');
        $this->crud->field('contact')->type('text');
        $this->crud->field('p_o_box')->type('text');
        $this->crud->field('address')->type('text');
        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->field('notes')->type('text');
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
