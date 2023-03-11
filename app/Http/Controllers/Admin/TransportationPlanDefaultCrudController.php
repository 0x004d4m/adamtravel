<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationPlanDefaultRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class TransportationPlanDefaultCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationPlanDefault::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-plan-default');
        $this->crud->setEntityNameStrings(__('transportation plan default'), __('transportation plan defaults'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->type('text');
        $this->crud->column('is_default')->label('default')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationPlanDefaultRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->type('text');
        $this->crud->field('is_default')->label('default')->type('boolean');
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
            'name'           => 'transportationPlans',
            'label'          => 'Plan',
            'backpack_crud'  => 'transportation-plan',
            'relation_attribute' => 'transportation_plan_default_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'PAX >=',
                    'name'  => 'people_less_than',
                ],
                [
                    'label' => 'PAX <=',
                    'name'  => 'people_greater_than',
                ],
                [
                    'label' => 'Free PAX in DBL',
                    'name'  => 'free_pax_in_dbl',
                ],
                [
                    'label' => 'Free PAX in SGL',
                    'name'  => 'free_pax_in_sgl',
                ],
                [
                    'label' => 'Vehicle Type',
                    'name'  => 'vehicleType.name',
                ],
                [
                    'label' => 'Number Of Vehicles',
                    'name'  => 'number_of_vehicles',
                ],
                [
                    'label' => 'Transportation Company',
                    'name'  => 'transportationCompany.name',
                ],
            ],
        ])->to('after_content');
    }
}
