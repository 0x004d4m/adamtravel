<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HotelCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Hotel::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hotel');
        $this->crud->setEntityNameStrings('hotel', 'hotels');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('description');
        $this->crud->column('image');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HotelRequest::class);

        $this->crud->field('name');
        $this->crud->field('description');
        $this->crud->field('image');
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
