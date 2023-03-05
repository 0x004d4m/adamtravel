<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantContractRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class RestaurantContractCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RestaurantContract::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/restaurant-contract');
        $this->crud->setEntityNameStrings(__('restaurant contract'), __('restaurant contracts'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->label('Contract Name')->type('text');
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
        $this->crud->column('restaurant_id')->type('text');
        $this->crud->addColumn('restaurant_id',[
            'label' => "Restaurant Name",
            'type' => "select",
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => "name",
            'model' => 'App\Models\Restaurant'
        ]);
        $this->crud->column('notes')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RestaurantContractRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->label('Contract Name')->type('text');
        $this->crud->field('starting_date')->type('date');
        $this->crud->field('ending_date')->type('date');
        $this->crud->addField([
            'label' => "Restaurant Name",
            'type' => "relationship",
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => "name",
            'model' => 'App\Models\Restaurant'
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

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'restaurantContractMeals',
            'label'          => 'Meals',
            'backpack_crud'  => 'restaurant-contract-meal',
            'relation_attribute' => 'restaurant_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'Meal',
                    'name'  => 'restaurantMeal.name',
                ],
                [
                    'label' => 'adult cost',
                    'name'  => 'adult_cost',
                ],
                [
                    'label' => 'child cost',
                    'name'  => 'child_cost',
                ],
                [
                    'label' => 'description',
                    'name'  => 'description',
                ],
            ],
        ])->to('after_content');
    }
}
