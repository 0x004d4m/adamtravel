<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SiteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class SiteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View sites'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage sites'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Site::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/site');
        $this->crud->setEntityNameStrings(__('sidebar.site'), __('sidebar.sites'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('location')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SiteRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('location')->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->field('description')->type('CKEditor');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
