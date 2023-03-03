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
        $this->crud->column('is_only_ro')->type('boolean');
        $this->crud->column('is_inc_bb')->type('boolean');
        $this->crud->column('is_inc_hb')->type('boolean');
        $this->crud->column('is_inc_fb')->type('boolean');
        $this->crud->column('is_inc_all')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PromotionRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('is_only_ro')->type('boolean');
        $this->crud->field('is_inc_bb')->type('boolean');
        $this->crud->field('is_inc_hb')->type('boolean');
        $this->crud->field('is_inc_fb')->type('boolean');
        $this->crud->field('is_inc_all')->type('boolean');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
