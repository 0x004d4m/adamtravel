<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class MemberCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View members'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage members'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Member::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/member');
        $this->crud->setEntityNameStrings(__('sidebar.member'), __('sidebar.members'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('position')->type('text');
        $this->crud->column('about')->type('textarea');
        $this->crud->column('image')->type('image');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(MemberRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('position')->type('text');
        $this->crud->field('about')->type('textarea');
        $this->crud->field('image')->type('image');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
