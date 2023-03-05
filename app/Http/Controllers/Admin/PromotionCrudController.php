<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PromotionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PromotionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Promotion::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/promotion');
        $this->crud->setEntityNameStrings('promotion', 'promotions');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('is_only_ro')->label('only ro')->type('boolean');
        $this->crud->column('is_inc_bb')->label('inc bb')->type('boolean');
        $this->crud->column('is_inc_hb')->label('inc hb')->type('boolean');
        $this->crud->column('is_inc_fb')->label('inc fb')->type('boolean');
        $this->crud->column('is_inc_all')->label('inc all')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PromotionRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('is_only_ro')->label('only ro')->type('boolean');
        $this->crud->field('is_inc_bb')->label('inc bb')->type('boolean');
        $this->crud->field('is_inc_hb')->label('inc hb')->type('boolean');
        $this->crud->field('is_inc_fb')->label('inc fb')->type('boolean');
        $this->crud->field('is_inc_all')->label('inc all')->type('boolean');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
