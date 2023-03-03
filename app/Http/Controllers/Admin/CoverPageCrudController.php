<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CoverPageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CoverPageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\CoverPage::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/cover-page');
        $this->crud->setEntityNameStrings('cover page', 'cover pages');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('description')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CoverPageRequest::class);

        $this->crud->field('name')->type('text');
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
