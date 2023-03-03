<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AccountCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AccountCategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\AccountCategory::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/account-category');
        $this->crud->setEntityNameStrings('account category', 'account categories');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->setColumnDetails('account_category_type_id',[
            'label' => "Account Category Type",
            'type' => "select",
            'name' => 'account_category_type_id',
            'entity' => 'accountCategoryType',
            'attribute' => "name",
            'model' => 'App\Models\AccountCategoryType'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AccountCategoryRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "Account Category Type",
            'type' => "relationship",
            'name' => 'account_category_type_id',
            'entity' => 'accountCategoryType',
            'attribute' => "name",
            'model' => 'App\Models\AccountCategoryType'
        ]);
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
