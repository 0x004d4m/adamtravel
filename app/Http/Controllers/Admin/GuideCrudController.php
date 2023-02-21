<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuideRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GuideCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Guide::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/guide');
        $this->crud->setEntityNameStrings('guide', 'guides');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('daily_rate');
        $this->crud->column('accommodation_rate');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GuideRequest::class);

        $this->crud->field('name');
        $this->crud->field('daily_rate');
        $this->crud->field('accommodation_rate');
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
