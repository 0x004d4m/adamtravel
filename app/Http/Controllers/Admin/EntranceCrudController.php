<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EntranceRequest;
use App\Models\Entrance;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class EntranceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Entrance::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/entrance');
        $this->crud->setEntityNameStrings('entrance', 'entrances');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->column('adult_rate')->type('text');
        $this->crud->column('child_rate')->type('text');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EntranceRequest::class);
        $this->crud->removeSaveAction('save_and_preview');
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
        $this->crud->field('adult_rate')->default(0)->type('text');
        $this->crud->field('child_rate')->default(0)->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    public function getEntrances(Request $request)
    {

        $form = backpack_form_input();

        $options = Entrance::query();

        if (isset($form['city_id'])) {
            $options = $options->where('city_id', $form['city_id']);
        }

        $results = $options->paginate(1000);
        Log::debug($results);
        return $results;
    }
}
