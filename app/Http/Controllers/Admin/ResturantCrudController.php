<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResturantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ResturantCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Resturant::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/resturant');
        $this->crud->setEntityNameStrings('resturant', 'resturants');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('image');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ResturantRequest::class);

        $this->crud->field('name');
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
