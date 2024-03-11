<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Site::index' , ['as' => 'site.index']);
$routes->post('/', 'Site::index' , ['as' => 'site.index']);

$routes->get('install', 'Site::install' );
$routes->post('install', 'Site::install');

$routes->get('event', 'Site::event' , ['as' => 'site.event']);
$routes->post('event', 'Site::event' , ['as' => 'site.event']);

$routes->get('tracking', 'Tracking::index' , ['as' => 'tracking.index']);
$routes->get('tracking/create', 'Tracking::create' , ['as' => 'tracking.create']);
$routes->post('tracking/store', 'Tracking::store', ['as' => 'tracking.store']);
$routes->get('tracking/edit/(:num)', 'Tracking::edit/$1', ['as' => 'tracking.edit']);
$routes->post('tracking/update/(:num)', 'Tracking::update/$1', ['as' => 'tracking.update']);
$routes->get('tracking/delete/(:num)', 'Tracking::delete/$1' , ['as' => 'tracking.delete']);

$routes->get('crmresult', 'Crmresult::index' , ['as' => 'crmresult.index']);
$routes->get('crmresult/create', 'Crmresult::create' , ['as' => 'crmresult.create']);
$routes->post('crmresult/store', 'Crmresult::store', ['as' => 'crmresult.store']);
$routes->get('crmresult/edit/(:num)', 'Crmresult::edit/$1', ['as' => 'crmresult.edit']);
$routes->post('crmresult/update/(:num)', 'Crmresult::update/$1', ['as' => 'crmresult.update']);
$routes->get('crmresult/delete/(:num)', 'Crmresult::delete/$1' , ['as' => 'crmresult.delete']);

$routes->get('crmresult/ajax', 'Crmresult::ajax' , ['as' => 'crmresult.ajax']);
$routes->get('crmresult/ajax2', 'Crmresult::ajax2' , ['as' => 'crmresult.ajax2']);
$routes->get('crmresult/ajax3', 'Crmresult::ajax3' , ['as' => 'crmresult.ajax3']);
$routes->get('crmresult/ajax4', 'Crmresult::ajax4' , ['as' => 'crmresult.ajax4']);
$routes->get('crmresult/ajax5', 'Crmresult::ajax5' , ['as' => 'crmresult.ajax5']);
$routes->get('crmresult/ajax6', 'Crmresult::ajax6' , ['as' => 'crmresult.ajax6']);

$routes->get('report', 'Report::index' , ['as' => 'report.index']);

