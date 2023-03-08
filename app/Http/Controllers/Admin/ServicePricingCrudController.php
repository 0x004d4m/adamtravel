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
        $this->crud->addColumn('service_id',[
            'label' => "Service",
            'type' => "select",
            'name' => 'service_id',
            'entity' => 'service',
            'attribute' => "name",
            'model' => 'App\Models\Service'
        ]);
        $this->crud->column('pax_less_than')->type('text');
        $this->crud->column('pax_greater_than')->type('text');
        $this->crud->column('every_number_of_pax')->type('text');
        $this->crud->column('price_per_adult')->type('text');
        $this->crud->column('price_per_child')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ServicePricingRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'service_id',
            'default' => $_GET['service_id'] ?? null
        ]);
        $this->crud->field('pax_less_than')->default(0)->label('PAX >=')->type('text');
        $this->crud->field('pax_greater_than')->default(0)->label('PAX <=')->type('text');
        $this->crud->field('every_number_of_pax')->default(0)->type('text');
        $this->crud->field('price_per_adult')->default(0)->type('text');
        $this->crud->field('price_per_child')->default(0)->type('text');
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
