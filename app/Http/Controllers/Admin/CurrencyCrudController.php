<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CurrencyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CurrencyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Currency::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/currency');
        $this->crud->setEntityNameStrings('currency', 'currencies');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('symbol')->type('text');
        $this->crud->column('exchange_rate_to_usd')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CurrencyRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('symbol')->type('text');
        $this->crud->field('exchange_rate_to_usd')->type('text');
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
