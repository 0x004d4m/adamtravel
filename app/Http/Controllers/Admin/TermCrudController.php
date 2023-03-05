<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TermRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TermCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View terms'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage terms'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Term::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/term');
        $this->crud->setEntityNameStrings(__('sidebar.term'), __('sidebar.terms'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('term')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TermRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('term')->type('CKEditor');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
