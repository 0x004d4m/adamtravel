<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VisitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class VisitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Visit::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/visit');
        $this->crud->setEntityNameStrings('visit', 'visits');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('description')->type('textarea');
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VisitRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->field('description')->type('textarea');
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
            'name'           => 'visitEntrances',
            'label'          => 'Entrances',
            'backpack_crud'  => 'visit-entrance',
            'relation_attribute' => 'visit_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'city',
                    'name'  => 'city.name',
                ],
                [
                    'label' => 'entrance',
                    'name'  => 'entrance.name',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'visitExtras',
            'label'          => 'Extras',
            'backpack_crud'  => 'visit-extra',
            'relation_attribute' => 'visit_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'extra',
                    'name'  => 'is_extra',
                ],
                [
                    'label' => 'optional',
                    'name'  => 'is_optional',
                ],
            ],
        ])->to('after_content');
    }
}
