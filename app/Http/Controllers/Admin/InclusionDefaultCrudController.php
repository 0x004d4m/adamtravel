<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InclusionDefaultRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class InclusionDefaultCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\InclusionDefault::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/inclusion-default');
        $this->crud->setEntityNameStrings(__('inclusion default'), __('inclusion defaults'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InclusionDefaultRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'inclusions',
            'label'          => 'Inclusion',
            'backpack_crud'  => 'inclusion',
            'relation_attribute' => 'inclusion_default_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'exclusion',
                    'name'  => 'is_exclusion',
                    'type'  => 'boolean',
                ],
            ],
        ])->to('after_content');
    }
}
