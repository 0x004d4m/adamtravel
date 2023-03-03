<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AccountCategoryTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AccountCategoryTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\AccountCategoryType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/account-category-type');
        $this->crud->setEntityNameStrings('account category type', 'account category types');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AccountCategoryTypeRequest::class);

        $this->crud->field('name')->type('text');
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
