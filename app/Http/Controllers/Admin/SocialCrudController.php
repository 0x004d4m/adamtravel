<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SocialRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class SocialCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View socials'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage socials'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Social::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/social');
        $this->crud->setEntityNameStrings(__('sidebar.social'), __('sidebar.socials'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('icon')->type('text');
        $this->crud->column('link')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SocialRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('icon')->type('text')->hint('icons list: <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome</a>');
        $this->crud->field('link')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
