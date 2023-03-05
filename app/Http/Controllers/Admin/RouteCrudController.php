<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class RouteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Route::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/route');
        $this->crud->setEntityNameStrings(__('route'), __('routes'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('number')->type('text');
        $this->crud->column('name')->type('text');
        $this->crud->column('description')->type('textarea');
        $this->crud->column('kilometers')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->addColumn('transportation_service_id',[
            'label' => "Transportation Service",
            'type' => "select",
            'name' => 'transportation_service_id',
            'entity' => 'transportationService',
            'attribute' => "name",
            'model' => 'App\Models\TransportationService'
        ]);
        $this->crud->addColumn('guide_id',[
            'label' => "Guide",
            'type' => "select",
            'name' => 'guide_id',
            'entity' => 'guide',
            'attribute' => "name",
            'model' => 'App\Models\Guide'
        ]);
        $this->crud->column('has_guide_accommodation')->type('boolean');
        $this->crud->column('has_driver_accommodation')->type('boolean');
        $this->crud->addColumn('route_group_id',[
            'label' => "Route Group",
            'type' => "select",
            'name' => 'route_group_id',
            'entity' => 'routeGroup',
            'attribute' => "name",
            'model' => 'App\Models\RouteGroup'
        ]);
        $this->crud->addColumn('starting_city_id',[
            'label' => "Starting City",
            'type' => "select",
            'name' => 'starting_city_id',
            'entity' => 'startingCity',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addColumn('overnight_city_id',[
            'label' => "Overnight City",
            'type' => "select",
            'name' => 'overnight_city_id',
            'entity' => 'overnightCity',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RouteRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('number')->type('text');
        $this->crud->field('name')->type('text');
        $this->crud->field('description')->type('textarea');
        $this->crud->field('kilometers')->default(0)->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->addField([
            'label' => "Transportation Service",
            'type' => "relationship",
            'name' => 'transportation_service_id',
            'entity' => 'transportationService',
            'attribute' => "name",
            'model' => 'App\Models\TransportationService'
        ]);
        $this->crud->addField([
            'label' => "Guide",
            'type' => "relationship",
            'name' => 'guide_id',
            'entity' => 'guide',
            'attribute' => "name",
            'model' => 'App\Models\Guide'
        ]);
        $this->crud->field('has_guide_accommodation')->type('boolean');
        $this->crud->field('has_driver_accommodation')->type('boolean');
        $this->crud->addField([
            'label' => "Route Group",
            'type' => "relationship",
            'name' => 'route_group_id',
            'entity' => 'routeGroup',
            'attribute' => "name",
            'model' => 'App\Models\RouteGroup'
        ]);
        $this->crud->addField([
            'label' => "Starting City",
            'type' => "relationship",
            'name' => 'starting_city_id',
            'entity' => 'startingCity',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addField([
            'label' => "Overnight City",
            'type' => "relationship",
            'name' => 'overnight_city_id',
            'entity' => 'overnightCity',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
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
            'name'           => 'routeEntrances',
            'label'          => 'Entrances',
            'backpack_crud'  => 'route-entrance',
            'relation_attribute' => 'route_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'city',
                    'name'  => 'city.name',
                ],
                [
                    'label' => 'entrance',
                    'name'  => 'entrance.name',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'routeRestaurants',
            'label'          => 'Restaurants',
            'backpack_crud'  => 'route-restaurant',
            'relation_attribute' => 'route_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'restaurant',
                    'name'  => 'restaurant.name',
                ],
                [
                    'label' => 'meal',
                    'name'  => 'restaurantContractMeal.restaurantMeal.name',
                ],
                [
                    'label' => 'breakfast',
                    'name'  => 'is_breakfast',
                    'type'  => 'boolean',
                ],
                [
                    'label' => 'lunch',
                    'name'  => 'is_lunch',
                    'type'  => 'boolean',
                ],
                [
                    'label' => 'dinner',
                    'name'  => 'is_dinner',
                    'type'  => 'boolean',
                ],
                [
                    'label' => 'optional',
                    'name'  => 'is_optional',
                    'type'  => 'boolean',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'routeVisits',
            'label'          => 'Visits',
            'backpack_crud'  => 'route-visit',
            'relation_attribute' => 'route_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'visit',
                    'name'  => 'visit.name',
                ]
            ],
        ])->to('after_content');
    }
}
