<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteVisitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class RouteVisitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RouteVisit::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/route-visit');
        $this->crud->setEntityNameStrings(__('route visit'), __('route visits'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('route_id',[
            'label' => "Route",
            'type' => "select",
            'name' => 'route_id',
            'entity' => 'route',
            'attribute' => "name",
            'model' => 'App\Models\Route'
        ]);
        $this->crud->addColumn('visit_id',[
            'label' => "Visit",
            'type' => "select",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RouteVisitRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'route_id',
            'default' => $_GET['route_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Visit",
            'type' => "relationship",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->addColumn('visit_id',[
            'label' => "Visit",
            'type' => "select",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'routeVisitExtras',
            'label'          => 'Extras',
            'backpack_crud'  => 'route-visit-extra',
            'relation_attribute' => 'route_visit_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'extra',
                    'name'  => 'visit_extra_id',
                ],
                [
                    'label' => 'extra',
                    'name'  => 'is_extra',
                    'type'  => 'boolean',
                ],
                [
                    'label' => 'optional',
                    'name'  => 'is_optional',
                    'type'  => 'boolean',
                ],
            ],
        ])->to('after_content');
    }
}
