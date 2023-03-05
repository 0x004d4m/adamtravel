<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BankDetailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class BankDetailCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\BankDetail::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/bank-detail');
        $this->crud->setEntityNameStrings('bank detail', 'bank details');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->addColumn('currency_id',[
            'label' => "Currency",
            'type' => "select",
            'name' => 'currency_id',
            'entity' => 'currency',
            'attribute' => "name",
            'model' => 'App\Models\Currency'
        ]);
        $this->crud->column('details')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(BankDetailRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "Currency",
            'type' => "relationship",
            'name' => 'currency_id',
            'entity' => 'currency',
            'attribute' => "name",
            'model' => 'App\Models\Currency'
        ]);
        $this->crud->field('details')->type('textarea');
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
