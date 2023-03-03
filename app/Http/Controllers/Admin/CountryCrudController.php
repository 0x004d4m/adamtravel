<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CountryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CountryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Country::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/country');
        $this->crud->setEntityNameStrings('country', 'countries');
    }

    protected function setupListOperation()
    {
        $this->crud->column('code')->type('text');
        $this->crud->column('name')->type('text');
        $this->crud->setColumnDetails('region_id',[
            'label' => "Region",
            'type' => "select",
            'name' => 'region_id',
            'entity' => 'region',
            'attribute' => "name",
            'model' => 'App\Models\Region'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CountryRequest::class);

        $this->crud->field('code')->type('text');
        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "Region",
            'type' => "relationship",
            'name' => 'region_id',
            'entity' => 'region',
            'attribute' => "name",
            'model' => 'App\Models\Region'
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
