<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationCompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationCompanyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationCompany::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-company');
        $this->crud->setEntityNameStrings('transportation company', 'transportation companies');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('image');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationCompanyRequest::class);

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
