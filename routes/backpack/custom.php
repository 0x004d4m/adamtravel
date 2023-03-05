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
    Route::crud('landingpage-service', 'LandingpageServiceCrudController');
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
    Route::crud('star', 'StarCrudController');
    Route::crud('currency', 'CurrencyCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('border', 'BorderCrudController');
    Route::crud('market', 'MarketCrudController');
    Route::crud('nationality', 'NationalityCrudController');
    Route::crud('hotel-meal', 'HotelMealCrudController');
    Route::crud('room', 'RoomCrudController');
    Route::crud('title', 'TitleCrudController');
    Route::crud('bank-detail', 'BankDetailCrudController');
    Route::crud('group-category1', 'GroupCategory1CrudController');
    Route::crud('group-category2', 'GroupCategory2CrudController');
    Route::crud('inclusion', 'InclusionCrudController');
    Route::crud('status', 'StatusCrudController');
    Route::crud('entrance', 'EntranceCrudController');
    Route::crud('restaurant-meal', 'RestaurantMealCrudController');
    Route::crud('transportation-type', 'TransportationTypeCrudController');
    Route::crud('transportation-service', 'TransportationServiceCrudController');
    Route::crud('program', 'ProgramCrudController');
    Route::crud('room-type', 'RoomTypeCrudController');
    Route::crud('service-classification', 'ServiceClassificationCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('service-pricing', 'ServicePricingCrudController');
    Route::crud('season', 'SeasonCrudController');
    Route::crud('promotion', 'PromotionCrudController');
    Route::crud('route-group', 'RouteGroupCrudController');
    Route::crud('visit', 'VisitCrudController');
    Route::crud('visit-entrance', 'VisitEntranceCrudController');
    Route::crud('visit-extra', 'VisitExtraCrudController');
    Route::crud('cover-page', 'CoverPageCrudController');
    Route::crud('program-route', 'ProgramRouteCrudController');
    Route::crud('transportation-plan', 'TransportationPlanCrudController');
    Route::crud('transportation-company', 'TransportationCompanyCrudController');
    Route::crud('hotel', 'HotelCrudController');
    Route::crud('guide', 'GuideCrudController');
    Route::crud('restaurant', 'RestaurantCrudController');
    Route::crud('restaurant-contract', 'RestaurantContractCrudController');
    Route::crud('restaurant-contract-meal', 'RestaurantContractMealCrudController');
    Route::crud('route', 'RouteCrudController');
    Route::crud('route-entrance', 'RouteEntranceCrudController');
    Route::crud('route-restaurant', 'RouteRestaurantCrudController');
    Route::crud('route-visit', 'RouteVisitCrudController');
    Route::crud('route-visit-extra', 'RouteVisitExtraCrudController');
    Route::crud('transportation-contract', 'TransportationContractCrudController');
    Route::crud('transportation-contract-route', 'TransportationContractRouteCrudController');
    Route::crud('transportation-contract-season', 'TransportationContractSeasonCrudController');
    Route::crud('transportation-contract-service', 'TransportationContractServiceCrudController');
    Route::crud('transportation-contract-service-price', 'TransportationContractServicePriceCrudController');
    Route::crud('hotel-contract', 'HotelContractCrudController');
    Route::crud('hotel-contract-rate', 'HotelContractRateCrudController');
    Route::crud('hotel-contract-higher-room', 'HotelContractHigherRoomCrudController');
    Route::crud('hotel-contract-occupancy', 'HotelContractOccupancyCrudController');
    Route::crud('hotel-contract-supplement', 'HotelContractSupplementCrudController');
    Route::crud('hotel-contract-free-policy', 'HotelContractFreePolicyCrudController');
    Route::crud('hotel-contract-note', 'HotelContractNoteCrudController');
    Route::crud('inclusion-default', 'InclusionDefaultCrudController');
}); // this should be the absolute last line of this file
