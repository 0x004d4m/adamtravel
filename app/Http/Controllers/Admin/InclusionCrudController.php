<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InclusionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class InclusionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Inclusion::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/inclusion');
        $this->crud->setEntityNameStrings('inclusion', 'inclusions');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('is_exclusion')->label('exclusion')->type('boolean');
        $this->crud->addColumn('inclusion_default_id',[
            'label' => "Inclusion Default",
            'type' => "select",
            'name' => 'inclusion_default_id',
            'entity' => 'inclusionDefault',
            'attribute' => "name",
            'model' => 'App\Models\InclusionDefault'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InclusionRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('is_exclusion')->label('exclusion')->type('boolean');
        $this->crud->addField([
            'type' => "hidden",
            'name' => 'inclusion_default_id',
            'default' => $_GET['inclusion_default_id'] ?? null
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
