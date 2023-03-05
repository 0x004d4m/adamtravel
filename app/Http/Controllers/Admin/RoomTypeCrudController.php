<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RoomTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RoomType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/room-type');
        $this->crud->setEntityNameStrings('room type', 'room types');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RoomTypeRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

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
