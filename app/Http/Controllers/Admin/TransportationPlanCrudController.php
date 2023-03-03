<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationPlanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TransportationPlanCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationPlan::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-plan');
        $this->crud->setEntityNameStrings('transportation plan', 'transportation plans');
    }

    protected function setupListOperation()
    {
        $this->crud->column('is_default')->type('boolean');
        $this->crud->column('name')->type('text');
        $this->crud->column('people_less_than')->type('text');
        $this->crud->column('people_greater_than')->type('text');
        $this->crud->column('pax')->type('text');
        $this->crud->column('free_pax_in_dbl')->type('text');
        $this->crud->column('free_pax_in_sgl')->type('text');
        $this->crud->setColumnDetails('transportation_type_id',[
            'label' => "Transportation Type",
            'type' => "select",
            'name' => 'transportation_type_id',
            'entity' => 'transportationType',
            'attribute' => "name",
            'model' => 'App\Models\TransportationType'
        ]);
        $this->crud->column('number_of_vehicles');
        $this->crud->setColumnDetails('transportation_company_id',[
            'label' => "Transportation Company",
            'type' => "select",
            'name' => 'transportation_company_id',
            'entity' => 'transportationCompany',
            'attribute' => "name",
            'model' => 'App\Models\TransportationCompany'
        ]);
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationPlanRequest::class);

        $this->crud->field('is_default')->type('boolean');
        $this->crud->field('name')->type('text');
        $this->crud->field('people_less_than')->type('text');
        $this->crud->field('people_greater_than')->type('text');
        $this->crud->field('pax')->type('text');
        $this->crud->field('free_pax_in_dbl')->type('text');
        $this->crud->field('free_pax_in_sgl')->type('text');
        $this->crud->addField([
            'label' => "Transportation Type",
            'type' => "relationship",
            'name' => 'transportation_type_id',
            'entity' => 'transportationType',
            'attribute' => "name",
            'model' => 'App\Models\TransportationType'
        ]);
        $this->crud->field('number_of_vehicles');
        $this->crud->addField([
            'label' => "Transportation Company",
            'type' => "relationship",
            'name' => 'transportation_company_id',
            'entity' => 'transportationCompany',
            'attribute' => "name",
            'model' => 'App\Models\TransportationCompany'
        ]);
        $this->crud->field('notes')->type('textarea');
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
