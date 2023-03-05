<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View posts'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage posts'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Post::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/post');
        $this->crud->setEntityNameStrings(__('sidebar.post'), __('sidebar.posts'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('image')->type('image');
        $this->crud->column('title')->type('text');
        $this->crud->column('description')->type('textarea');
        $this->crud->column('post')->type('text');
        $this->crud->column('author_name')->type('text');
        $this->crud->column('author_image')->type('image');
        $this->crud->column('author_about')->type('textarea');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PostRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('image')->type('image');
        $this->crud->field('title')->type('text');
        $this->crud->field('description')->type('textarea');
        $this->crud->field('post')->type('text');
        $this->crud->field('author_name')->type('text');
        $this->crud->field('author_image')->type('image');
        $this->crud->field('author_about')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
