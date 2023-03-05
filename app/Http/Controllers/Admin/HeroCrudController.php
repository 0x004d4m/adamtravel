<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HeroRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class HeroCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View heroes'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage heroes'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Hero::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hero');
        $this->crud->setEntityNameStrings(__('sidebar.hero'), __('sidebar.heroes'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('title')->type('text');
        $this->crud->column('video')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HeroRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('title')->type('text');
        $this->crud->field('video')->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->field('description')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
