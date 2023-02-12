<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FqaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class FqaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View FQAs'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage FQAs'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Fqa::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/fqa');
        $this->crud->setEntityNameStrings(__('sidebar.fqa'), __('sidebar.fqas'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('question')->type('textarea');
        $this->crud->column('answer')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FqaRequest::class);

        $this->crud->field('question')->type('textarea');
        $this->crud->field('answer')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
