<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

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
        $this->crud->addColumn('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addColumn('service_classification_id',[
            'label' => "Service Classification",
            'type' => "select",
            'name' => 'service_classification_id',
            'entity' => 'serviceClassification',
            'attribute' => "name",
            'model' => 'App\Models\ServiceClassification'
        ]);
        $this->crud->column('is_excursion')->type('boolean');
        $this->crud->column('price_per')->label('price per')->type('radio')->options([
            1=>__('content.person'),
            2=>__('content.group'),
            3=>__('content.capacity'),
        ])->default(1);
        $this->crud->column('type')->label('type')->type('radio')->options([
            1=>__('content.service'),
            2=>__('content.excursion'),
        ])->default(1);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ServiceRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
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
        $this->crud->field('description')->type('textarea');
        $this->crud->field('visit_duration')->type('text');
        $this->crud->field('opening_hours')->type('text');
        $this->crud->field('website')->type('text');
        $this->crud->field('is_excursion')->type('boolean');
        $this->crud->field('price_per')->label('price per')->type('radio')->options([
            1=>__('content.person'),
            2=>__('content.group'),
            3=>__('content.capacity'),
        ])->default(1);
        $this->crud->field('type')->label('type')->type('radio')->options([
            1=>__('content.service'),
            2=>__('content.excursion'),
        ])->default(1);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'ServicePricings',
            'label'          => 'Prices',
            'backpack_crud'  => 'service-pricing',
            'relation_attribute' => 'service_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'pax >=',
                    'name'  => 'pax_less_than',
                ],
                [
                    'label' => 'pax <=',
                    'name'  => 'pax_greater_than',
                ],
                [
                    'label' => 'per adult',
                    'name'  => 'price_per_adult',
                ],
                [
                    'label' => 'per child',
                    'name'  => 'price_per_child',
                ]
            ],
        ])->to('after_content');
    }
}
