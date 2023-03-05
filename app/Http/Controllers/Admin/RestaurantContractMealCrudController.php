<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantContractMealRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RestaurantContractMealCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RestaurantContractMeal::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/restaurant-contract-meal');
        $this->crud->setEntityNameStrings(__('restaurant contract meal'), __('restaurant contract meals'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('restaurant_contract_id',[
            'label' => "Restaurant Contract",
            'type' => "select",
            'name' => 'restaurant_contract_id',
            'entity' => 'restaurantContract',
            'attribute' => "name",
            'model' => 'App\Models\RestaurantContract'
        ]);
        $this->crud->addColumn('restaurant_meal_id',[
            'label' => "Restaurant Meal",
            'type' => "select",
            'name' => 'restaurant_meal_id',
            'entity' => 'restaurantMeal',
            'attribute' => "name",
            'model' => 'App\Models\RestaurantMeal'
        ]);
        $this->crud->column('adult_cost')->type('text');
        $this->crud->column('child_cost')->type('text');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RestaurantContractMealRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'restaurant_contract_id',
            'default' => $_GET['restaurant_contract_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Restaurant Meal",
            'type' => "relationship",
            'name' => 'restaurant_meal_id',
            'entity' => 'restaurantMeal',
            'attribute' => "name",
            'model' => 'App\Models\RestaurantMeal'
        ]);
        $this->crud->field('adult_cost')->default(0)->type('text');
        $this->crud->field('child_cost')->default(0)->type('text');
        $this->crud->field('description')->type('textarea');
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
