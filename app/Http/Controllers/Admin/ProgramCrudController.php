<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProgramRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class ProgramCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Program::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/program');
        $this->crud->setEntityNameStrings('program', 'programs');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('is_default')->label('default')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProgramRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('is_default')->label('default')->type('boolean');
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
            'name'           => 'programRoutes',
            'label'          => 'Routes',
            'backpack_crud'  => 'program-route',
            'relation_attribute' => 'program_id',
            'button_create' => true,
            'button_show' => false,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'day',
                    'name'  => 'day',
                ],
                [
                    'label' => 'route',
                    'name'  => 'route.name',
                ],
            ],
        ])->to('after_content');
    }
}
