<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DestinationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class DestinationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View destinations'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage destinations'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Destination::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/destination');
        $this->crud->setEntityNameStrings(__('sidebar.destination'), __('sidebar.destinations'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('image')->type('image');
        $this->crud->column('title')->type('text');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DestinationRequest::class);

        $this->crud->field('image')->type('image');
        $this->crud->field('title')->type('text');
        $this->crud->field('description')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
