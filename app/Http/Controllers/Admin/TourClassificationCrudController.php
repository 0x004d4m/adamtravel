<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TourClassificationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TourClassificationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View tour classifications'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage tour classifications'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\TourClassification::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tour-classification');
        $this->crud->setEntityNameStrings(__('sidebar.tour_classification'), __('sidebar.tour_classifications'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('image')->type('image');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TourClassificationRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('image')->type('image');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
