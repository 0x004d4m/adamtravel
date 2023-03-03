<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServicePricingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ServicePricingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\ServicePricing::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service-pricing');
        $this->crud->setEntityNameStrings('service pricing', 'service pricings');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumnDetails('service_id',[
            'label' => "Service",
            'type' => "select",
            'name' => 'service_id',
            'entity' => 'service',
            'attribute' => "name",
            'model' => 'App\Models\Service'
        ]);
        $this->crud->column('pax_less_than')->type('text');
        $this->crud->column('pax_greater_than')->type('text');
        $this->crud->column('price_per_adult')->type('text');
        $this->crud->column('price_per_child')->type('text');
        $this->crud->column('start_date')->type('date');
        $this->crud->column('end_date')->type('date');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ServicePricingRequest::class);

        $this->crud->addField([
            'label' => "Service",
            'type' => "relationship",
            'name' => 'service_id',
            'entity' => 'service',
            'attribute' => "name",
            'model' => 'App\Models\Service'
        ]);
        $this->crud->field('pax_less_than')->type('text');
        $this->crud->field('pax_greater_than')->type('text');
        $this->crud->field('price_per_adult')->type('text');
        $this->crud->field('price_per_child')->type('text');
        $this->crud->field('start_date')->type('date');
        $this->crud->field('end_date')->type('date');
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
