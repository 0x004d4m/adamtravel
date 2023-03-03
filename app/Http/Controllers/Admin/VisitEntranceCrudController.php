<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VisitEntranceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class VisitEntranceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\VisitEntrance::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/visit-entrance');
        $this->crud->setEntityNameStrings('visit entrance', 'visit entrances');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumnDetails('visit_id',[
            'label' => "Visit",
            'type' => "select",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);
        $this->crud->setColumnDetails('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->setColumnDetails('entrance_id',[
            'label' => "Entrance",
            'type' => "select",
            'name' => 'entrance_id',
            'entity' => 'entrance',
            'attribute' => "name",
            'model' => 'App\Models\Entrance'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VisitEntranceRequest::class);

        $this->crud->addField([
            'label' => "Visit",
            'type' => "relationship",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);
        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addField([
            'label' => "Entrance",
            'type' => "relationship",
            'name' => 'entrance_id',
            'entity' => 'entrance',
            'attribute' => "name",
            'model' => 'App\Models\Entrance'
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
