<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteVisitExtraRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class RouteVisitExtraCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\RouteVisitExtra::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/route-visit-extra');
        $this->crud->setEntityNameStrings(__('route visit extra'), __('route visit extras'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('route_visit_id',[
            'type' => "hidden",
            'name' => 'route_visit_id',
        ]);
        $this->crud->addColumn('visit_extra_id',[
            'label' => "Visit Extra",
            'type' => "select",
            'name' => 'visit_extra_id',
            'entity' => 'visitExtra',
            'attribute' => "name",
            'model' => 'App\Models\VisitExtra'
        ]);
        $this->crud->column('is_extra')->label('extra')->type('boolean');
        $this->crud->column('is_optional')->label('optional')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RouteVisitExtraRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'route_visit_id',
            'default' => $_GET['route_visit_id'] ?? null
        ]);
        $this->crud->addField([
            'label' => "Visit Extra",
            'type' => "relationship",
            'name' => 'visit_extra_id',
            'entity' => 'visitExtra',
            'attribute' => "name",
            'model' => 'App\Models\VisitExtra'
        ]);
        $this->crud->field('is_extra')->label('extra')->type('boolean');
        $this->crud->field('is_optional')->label('optional')->type('boolean');
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
