<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VisitExtraRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class VisitExtraCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\VisitExtra::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/visit-extra');
        $this->crud->setEntityNameStrings('visit extra', 'visit extras');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn('visit_id',[
            'label' => "Visit",
            'type' => "select",
            'name' => 'visit_id',
            'entity' => 'visit',
            'attribute' => "name",
            'model' => 'App\Models\Visit'
        ]);
        $this->crud->column('name')->type('text');
        $this->crud->column('is_extra')->label('extra')->type('boolean');
        $this->crud->column('is_optional')->label('optional')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VisitExtraRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->addField([
            'type' => "hidden",
            'name' => 'visit_id',
            'default' => $_GET['visit_id'] ?? null
        ]);
        $this->crud->field('name')->type('text');
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
