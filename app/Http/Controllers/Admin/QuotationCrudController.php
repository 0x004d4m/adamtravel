<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuotationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class QuotationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Quotation::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/quotation');
        $this->crud->setEntityNameStrings(__('quotation'), __('quotations'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('user_id')->type('text');

        $this->crud->addColumn('user_id',[
            'label' => "User",
            'type' => "select",
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => "name",
            'model' => 'App\Models\User'
        ]);
        $this->crud->column('created_at')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(QuotationRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'user_id',
            'default' => backpack_user()->id,
        ]);

        $this->crud->addField([
            'label' => "Default Program",
            'type' => 'relationship',
            'name' => 'programs', // the method that defines the relationship in your Model
            'entity' => 'programs', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Program", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'options'   => (function ($query) {
                return $query->where('is_default', true)->has('programRoutes')->get();
            }),
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
