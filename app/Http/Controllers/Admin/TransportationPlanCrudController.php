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
        $this->crud->column('people_less_than')->label('PAX >=')->type('text');
        $this->crud->column('people_greater_than')->label('PAX <=')->type('text');
        $this->crud->column('free_pax_in_dbl')->type('text');
        $this->crud->column('free_pax_in_sgl')->type('text');
        $this->crud->addColumn('vehicle_type_id',[
            'label' => "Vehicle Type",
            'type' => "select",
            'name' => 'vehicle_type_id',
            'entity' => 'vehicleType',
            'attribute' => "name",
            'model' => 'App\Models\VehicleType'
        ]);
        $this->crud->column('number_of_vehicles');
        $this->crud->addColumn('transportation_company_id',[
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
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'transportation_plan_default_id',
            'default' => $_GET['transportation_plan_default_id']??null,
        ]);
        $this->crud->field('people_less_than')->label('PAX >=')->default(0)->type('text');
        $this->crud->field('people_greater_than')->label('PAX <=')->default(0)->type('text');
        $this->crud->field('free_pax_in_dbl')->default(0)->type('text');
        $this->crud->field('free_pax_in_sgl')->default(0)->type('text');
        $this->crud->addField([
            'label' => "Vehicle Type",
            'type' => "relationship",
            'name' => 'vehicle_type_id',
            'entity' => 'vehicleType',
            'attribute' => "name",
            'model' => 'App\Models\VehicleType'
        ]);
        $this->crud->field('number_of_vehicles')->default(0);
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
