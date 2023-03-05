<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LandingpageServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LandingpageServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View landingpage services'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage landingpage services'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\LandingpageService::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/landingpage-service');
        $this->crud->setEntityNameStrings(__('sidebar.landingpage_service'), __('sidebar.landingpage_services'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('title')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LandingpageServiceRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('title')->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->field('description')->type('textarea');
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
