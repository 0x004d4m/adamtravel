<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestimonialRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class TestimonialCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View testimonials'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage testimonials'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Testimonial::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/testimonial');
        $this->crud->setEntityNameStrings(__('sidebar.testimonial'), __('sidebar.testimonials'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('position')->type('text');
        $this->crud->column('image')->type('image');
        $this->crud->column('testimonial')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TestimonialRequest::class);

        $this->crud->field('name')->type('text');
        $this->crud->field('position')->type('text');
        $this->crud->field('image')->type('image');
        $this->crud->field('testimonial')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
