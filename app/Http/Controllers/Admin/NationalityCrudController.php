<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NationalityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class NationalityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Nationality::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/nationality');
        $this->crud->setEntityNameStrings('nationality', 'nationalities');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->setColumnDetails('market_id',[
            'label' => "Market",
            'type' => "select",
            'name' => 'market_id',
            'entity' => 'market',
            'attribute' => "name",
            'model' => 'App\Models\Market'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(NationalityRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "Market",
            'type' => "relationship",
            'name' => 'market_id',
            'entity' => 'market',
            'attribute' => "name",
            'model' => 'App\Models\Market'
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
