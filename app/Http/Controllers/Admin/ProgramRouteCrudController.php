<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProgramRouteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ProgramRouteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\ProgramRoute::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/program-route');
        $this->crud->setEntityNameStrings('program route', 'program routes');
    }

    protected function setupListOperation()
    {
        $this->crud->column('day')->type('text');
        $this->crud->setColumnDetails('program_id',[
            'label' => "Program",
            'type' => "select",
            'name' => 'program_id',
            'entity' => 'program',
            'attribute' => "name",
            'model' => 'App\Models\Program'
        ]);
        $this->crud->setColumnDetails('route_id',[
            'label' => "Route",
            'type' => "select",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProgramRouteRequest::class);

        $this->crud->field('day')->type('text');
        $this->crud->addField([
            'label' => "Program",
            'type' => "relationship",
            'name' => 'program_id',
            'entity' => 'program',
            'attribute' => "name",
            'model' => 'App\Models\Program'
        ]);
        $this->crud->addField([
            'label' => "Route",
            'type' => "relationship",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
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
