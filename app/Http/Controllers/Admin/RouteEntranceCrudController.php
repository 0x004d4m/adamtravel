<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteEntranceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RouteEntranceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RouteEntrance::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/route-entrance');
        $this->crud->setEntityNameStrings(__('route entrance'), __('route entrances'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('route_id',[
            'label' => "Route",
            'type' => "select",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addColumn('entrance_id',[
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
        $this->crud->setValidation(RouteEntranceRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'route_id',
            'default' => $_GET['route_id'] ?? null
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
