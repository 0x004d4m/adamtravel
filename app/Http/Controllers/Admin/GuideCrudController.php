<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuideRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GuideCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Guide::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/guide');
        $this->crud->setEntityNameStrings(__('guide'), __('guides'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('daily_rate')->type('text');
        $this->crud->column('accommodation_rate')->type('text');
        $this->crud->column('tel')->type('text');
        $this->crud->column('fax')->type('text');
        $this->crud->column('mobile')->type('text');
        $this->crud->column('emergency_number')->type('text');
        $this->crud->column('email')->type('text');
        $this->crud->column('website')->type('text');
        $this->crud->column('contact')->type('text');
        $this->crud->column('p_o_box')->type('text');
        $this->crud->column('address')->type('textarea');
        $this->crud->setColumnDetails('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->setColumnDetails('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GuideRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('daily_rate')->type('text');
        $this->crud->field('accommodation_rate')->type('text');
        $this->crud->field('tel')->type('text');
        $this->crud->field('fax')->type('text');
        $this->crud->field('mobile')->type('text');
        $this->crud->field('emergency_number')->type('text');
        $this->crud->field('email')->type('text');
        $this->crud->field('website')->type('text');
        $this->crud->field('contact')->type('text');
        $this->crud->field('p_o_box')->type('text');
        $this->crud->field('address')->type('textarea');
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
