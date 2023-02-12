<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SectionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class SectionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View sections'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage sections'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Section::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/section');
        $this->crud->setEntityNameStrings(__('sidebar.section'), __('sidebar.sections'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('title')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->column('image2')->type('image');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SectionRequest::class);

        $this->crud->field('title')->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->field('image2')->type('image');
        $this->crud->field('description')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
