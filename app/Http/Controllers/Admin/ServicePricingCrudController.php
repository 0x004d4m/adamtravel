<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServicePricingRequest;
use App\Models\Service;
use App\Models\ServicePricing;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

class ServicePricingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\ServicePricing::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service-pricing');
        $this->crud->setEntityNameStrings('service pricing', 'service pricings');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(ServicePricingRequest::class);
        $this->crud->addSaveAction(['name'=>'Save and back']);
        $this->crud->removeSaveAction('save_and_preview');
        $this->crud->removeSaveAction('save_and_edit');
        $this->crud->removeSaveAction('save_and_new');

        $Service = Service::where('id',Route::current()->parameter('id'))->first();
        if($Service){
            if($Service->price_per==1){
                $this->crud->field('price_per_adult')->default(0)->type('text');
                $this->crud->field('price_per_child')->default(0)->type('text');
            }
            if($Service->price_per==2){
                $this->crud->field('price_per_adult')->default(0)->type('text');
                $this->crud->field('price_per_child')->default(0)->type('text');
            }
            if($Service->price_per==3){
                $this->crud->field('every_number_of_pax')->default(0)->type('text');
                $this->crud->field('price_per_adult')->default(0)->type('text');
                $this->crud->field('price_per_child')->default(0)->type('text');
            }
        }
    }

    protected function setupShowOperation()
    {
        $Service = Service::where('id',Route::current()->parameter('id'))->first();
        if($Service){
            if($Service->price_per==1){
                $this->crud->column('price_per_adult')->default(0)->type('text');
                $this->crud->column('price_per_child')->default(0)->type('text');
            }
            if($Service->price_per==2){
                $this->crud->column('price_per_adult')->default(0)->type('text');
                $this->crud->column('price_per_child')->default(0)->type('text');
            }
            if($Service->price_per==3){
                $this->crud->column('every_number_of_pax')->default(0)->type('text');
                $this->crud->column('price_per_adult')->default(0)->type('text');
                $this->crud->column('price_per_child')->default(0)->type('text');
            }
        }
    }
}
