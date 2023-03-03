<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Service::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('service', 'services');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('description')->type('textarea');
        $this->crud->column('visit_duration')->type('text');
        $this->crud->column('opening_hours')->type('text');
        $this->crud->column('website')->type('text');
        $this->crud->setColumnDetails('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->setColumnDetails('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->setColumnDetails('service_classification_id',[
            'label' => "Service Classification",
            'type' => "select",
            'name' => 'service_classification_id',
            'entity' => 'serviceClassification',
            'attribute' => "name",
            'model' => 'App\Models\ServiceClassification'
        ]);
        $this->crud->setColumnDetails('currency_id',[
            'label' => "Currency",
            'type' => "select",
            'name' => 'currency_id',
            'entity' => 'currency',
            'attribute' => "name",
            'model' => 'App\Models\Currency'
        ]);
        $this->crud->column('is_excursion')->type('boolean');
        $this->crud->column('is_per_group')->type('boolean');
        $this->crud->column('is_per_person')->type('boolean');
        $this->crud->column('is_per_capacity')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ServiceRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('description')->type('textarea');
        $this->crud->field('visit_duration')->type('text');
        $this->crud->field('opening_hours')->type('text');
        $this->crud->field('website')->type('text');
        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addField([
            'label' => "Service Classification",
            'type' => "relationship",
            'name' => 'service_classification_id',
            'entity' => 'serviceClassification',
            'attribute' => "name",
            'model' => 'App\Models\ServiceClassification'
        ]);
        $this->crud->addField([
            'label' => "Currency",
            'type' => "relationship",
            'name' => 'currency_id',
            'entity' => 'currency',
            'attribute' => "name",
            'model' => 'App\Models\Currency'
        ]);
        $this->crud->field('is_excursion')->type('boolean');
        $this->crud->field('is_per_group')->type('boolean');
        $this->crud->field('is_per_person')->type('boolean');
        $this->crud->field('is_per_capacity')->type('boolean');
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
