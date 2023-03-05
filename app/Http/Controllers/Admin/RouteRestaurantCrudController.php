<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteRestaurantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RouteRestaurantCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RouteRestaurant::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/route-restaurant');
        $this->crud->setEntityNameStrings(__('route restaurant'), __('route restaurants'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('route_id',[
            'label' => "Route",
            'type' => "select",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
        $this->crud->addColumn('restaurant_id',[
            'label' => "Restaurant",
            'type' => "select",
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => "name",
            'model' => 'App\Models\Restaurant'
        ]);
        $this->crud->addColumn('restaurant_contract_meal_id',[
            'label' => "Restaurant Contract Meal",
            'type' => "select",
            'name' => 'restaurant_contract_meal_id',
            'entity' => 'restaurantContractMeal',
            'attribute' => "name",
            'model' => 'App\Models\RestaurantContractMeal'
        ]);
        $this->crud->column('is_breakfast')->label('breakfast')->type('boolean');
        $this->crud->column('is_lunch')->label('lunch')->type('boolean');
        $this->crud->column('is_dinner')->label('dinner')->type('boolean');
        $this->crud->column('is_optional')->label('optional')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RouteRestaurantRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'route_id',
            'default' => $_GET['route_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Restaurant",
            'type' => "relationship",
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => "name",
            'model' => 'App\Models\Restaurant'
        ]);
        $this->crud->addField([
            'label' => "Restaurant Contract Meal",
            'type' => "relationship",
            'name' => 'restaurant_contract_meal_id',
            'entity' => 'restaurantContractMeal',
            'attribute' => "restaurantMeal.name",
            'model' => 'App\Models\RestaurantContractMeal'
        ]);
        $this->crud->field('is_breakfast')->label('breakfast')->type('boolean');
        $this->crud->field('is_lunch')->label('lunch')->type('boolean');
        $this->crud->field('is_dinner')->label('dinner')->type('boolean');
        $this->crud->field('is_optional')->label('optional')->type('boolean');
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
