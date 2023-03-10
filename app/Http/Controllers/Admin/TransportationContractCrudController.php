<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationContractRequest;
use App\Models\TransportationContract;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Route;

class TransportationContractCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\TransportationContract::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transportation-contract');
        $this->crud->setEntityNameStrings(__('transportation contract'), __('transportation contracts'));
    }

    protected function setupListOperation()
    {
        $this->crud->column('name')->label('Contract Name')->type('text');
        $this->crud->addColumn('transportation_company_id',[
            'label' => "Transportation Company",
            'type' => "select",
            'name' => 'transportation_company_id',
            'entity' => 'transportationCompany',
            'attribute' => "name",
            'model' => 'App\Models\TransportationCompany'
        ]);
        $this->crud->column('starting_date')->type('date');
        $this->crud->column('ending_date')->type('date');
        $this->crud->column('driver_accommodation')->type('text');
        $this->crud->column('commission')->type('text');
        $this->crud->column('price_type')->label('price type')->type('radio')->options([
            1=>__('content.by_service'),
            2=>__('content.by_route'),
        ])->default(1);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TransportationContractRequest::class);
        $this->crud->removeSaveAction('save_and_back');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $this->crud->field('name')->label('Contract Name')->type('text');
        $this->crud->addField([
            'label' => "Transportation Company",
            'type' => "relationship",
            'name' => 'transportation_company_id',
            'entity' => 'transportationCompany',
            'attribute' => "name",
            'model' => 'App\Models\TransportationCompany'
        ]);
        $this->crud->field('starting_date')->type('date');
        $this->crud->field('ending_date')->type('date');
        $this->crud->field('driver_accommodation')->default(0)->type('text');
        $this->crud->field('commission')->default(0)->type('text');
        $this->crud->field('price_type')->label('price type')->type('radio')->options([
            1=>__('content.by_service'),
            2=>__('content.by_route'),
        ])->default(1);
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
            'name'           => 'transportationContractSeasons',
            'label'          => 'Seasons',
            'backpack_crud'  => 'transportation-contract-season',
            'relation_attribute' => 'transportation_contract_id',
            'button_create' => true,
            'button_delete' => true,
            'columns' => [
                [
                    'label' => 'season',
                    'name'  => 'season.name',
                ],
                [
                    'label' => 'starting date',
                    'name'  => 'starting_date',
                ],
                [
                    'label' => 'ending date',
                    'name'  => 'ending_date',
                ],
            ],
        ])->to('after_content');

        $id=Route::current()->parameter('id');
        if($id){
            $TransportationContract = TransportationContract::where('id',$id)->first();
            if($TransportationContract){
                if($TransportationContract->price_type==1){
                    Widget::add([
                        'type'           => 'relation_table',
                        'name'           => 'transportationContractServices',
                        'label'          => 'Services',
                        'backpack_crud'  => 'transportation-contract-service',
                        'relation_attribute' => 'transportation_contract_id',
                        'button_create' => true,
                        'button_delete' => true,
                        'columns' => [
                            [
                                'label' => 'season',
                                'name'  => 'season.name',
                            ],
                            [
                                'label' => 'service',
                                'name'  => 'transportationService.name',
                            ],
                        ],
                    ])->to('after_content');
                }
                if($TransportationContract->price_type==2){
                    Widget::add([
                        'type'           => 'relation_table',
                        'name'           => 'transportationContractRoutes',
                        'label'          => 'Routes',
                        'backpack_crud'  => 'transportation-contract-route',
                        'relation_attribute' => 'transportation_contract_id',
                        'button_create' => true,
                        'button_delete' => true,
                        'columns' => [
                            [
                                'label' => 'route',
                                'name'  => 'route.name',
                            ],
                            [
                                'label' => 'car price',
                                'name'  => 'car_price',
                            ],
                            [
                                'label' => 'van price',
                                'name'  => 'van_price',
                            ],
                        ],
                    ])->to('after_content');
                }
            }
        }
    }
}
