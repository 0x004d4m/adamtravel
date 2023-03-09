<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Route;

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
        $this->crud->column('type')->label('type')->type('radio')->options([
            1=>__('content.service'),
            2=>__('content.excursion'),
        ])->default(1);
        $this->crud->column('price_per')->label('price per')->type('radio')->options([
            1=>__('content.person'),
            2=>__('content.group'),
            3=>__('content.capacity'),
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
        $this->crud->field('type')->label('type')->type('radio')->options([
            1=>__('content.service'),
            2=>__('content.excursion'),
        ])->default(1);
        $this->crud->field('price_per')->label('price per')->type('radio')->options([
            1=>__('content.person'),
            2=>__('content.group'),
            3=>__('content.capacity'),
        ])->default(1);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        $fields=[];
        $id=Route::current()->parameter('id');
        if($id){
            $Service = Service::where('id',$id)->first();
            if($Service){
                if($Service->price_per==1){
                    $fields=[
                        [
                            'label' => 'per adult',
                            'name'  => 'price_per_adult',
                        ],
                        [
                            'label' => 'per child',
                            'name'  => 'price_per_child',
                        ]
                    ];
                }
                if($Service->price_per==2){
                    $fields=[
                        [
                            'label' => 'per adult',
                            'name'  => 'price_per_adult',
                        ],
                        [
                            'label' => 'per child',
                            'name'  => 'price_per_child',
                        ]
                    ];
                }
                if($Service->price_per==3){
                    $fields=[
                        [
                            'label' => 'every number of pax',
                            'name'  => 'every_number_of_pax',
                        ],
                        [
                            'label' => 'per adult',
                            'name'  => 'price_per_adult',
                        ],
                        [
                            'label' => 'per child',
                            'name'  => 'price_per_child',
                        ]
                    ];
                }
            }
        }

        Widget::add([
            'type'           => 'relation_panel',
            'name'           => 'ServicePricings',
            'label'          => 'Prices',
            'backpack_crud'  => 'service-pricing',
            'relation_attribute' => 'service_id',
            'fields' => $fields,
        ])->to('after_content');
    }
}
