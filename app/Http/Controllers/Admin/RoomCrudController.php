<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoomCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Room::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/room');
        $this->crud->setEntityNameStrings('room', 'rooms');
    }

    protected function setupListOperation()
    {
        $this->crud->column('code')->type('text');
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RoomRequest::class);

        $this->crud->field('code')->type('text');
        $this->crud->field('name')->type('text');
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
