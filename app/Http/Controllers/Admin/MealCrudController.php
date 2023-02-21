<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MealRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class MealCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Meal::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/meal');
        $this->crud->setEntityNameStrings('meal', 'meals');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(MealRequest::class);

        $this->crud->field('name');
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
