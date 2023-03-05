<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\City::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/city');
        $this->crud->setEntityNameStrings('city', 'cities');
    }

    protected function setupListOperation()
    {
        $this->crud->column('code')->type('text');
        $this->crud->column('name')->type('text');
        $this->crud->addColumn('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CityRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('code')->type('text');
        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
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
