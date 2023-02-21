<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('hero', 'HeroCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('destination', 'DestinationCrudController');
    Route::crud('section', 'SectionCrudController');
    Route::crud('testimonial', 'TestimonialCrudController');
    Route::crud('fqa', 'FqaCrudController');
    Route::crud('social', 'SocialCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('member', 'MemberCrudController');
    Route::crud('tour-classification', 'TourClassificationCrudController');
    Route::crud('partner', 'PartnerCrudController');
    Route::crud('term', 'TermCrudController');
    Route::crud('site', 'SiteCrudController');
    Route::crud('season', 'SeasonCrudController');
    Route::crud('hotel', 'HotelCrudController');
    Route::crud('room-bed', 'RoomBedCrudController');
    Route::crud('room-type', 'RoomTypeCrudController');
    Route::crud('star', 'StarCrudController');
    Route::crud('guide', 'GuideCrudController');
    Route::crud('group-category', 'GroupCategoryCrudController');
    Route::crud('meal', 'MealCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('currency', 'CurrencyCrudController');
    Route::crud('inclusion', 'InclusionCrudController');
    Route::crud('provided-service', 'ProvidedServiceCrudController');
    Route::crud('vehicle-type', 'VehicleTypeCrudController');
    Route::crud('transportation-service', 'TransportationServiceCrudController');
    Route::crud('transportation-company', 'TransportationCompanyCrudController');
    Route::crud('resturant', 'ResturantCrudController');
}); // this should be the absolute last line of this file