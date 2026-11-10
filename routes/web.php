<?php

declare(strict_types=1);

use App\Http\Controllers\ContactEnquiryController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/service', 'pages.service')->name('services');
Route::view('/service-details', 'pages.service-details')->name('service.details');
Route::view('/activities', 'pages.activities')->name('activities');
Route::view('/activities-details', 'pages.activities-details')->name('activities.details');
Route::get('/destination', DestinationController::class)->name('destinations');
Route::view('/destination-details', 'pages.destination-details')->name('destinations.details');
Route::view('/tour', 'pages.tour')->name('tours');
Route::view('/tour-details', 'pages.tour-details')->name('tours.details');
Route::view('/faq', 'pages.faq')->name('faq');
Route::get('/contact', ContactPageController::class)->name('contact');
Route::post('/contact', ContactEnquiryController::class)->middleware('throttle:contact')->name('contact.send');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/blog/planning-your-trip', 'pages.blog-details')->name('blog.planning');
Route::view('/blog/safari-and-coast', 'pages.blog.safari-coast')->name('blog.safari-coast');
Route::view('/blog/responsible-travel', 'pages.blog.responsible-travel')->name('blog.responsible-travel');
Route::redirect('/blog-details', '/blog/planning-your-trip', 301)->name('blog.details');
Route::view('/gallery', 'pages.gallery')->name('gallery');

Route::view('/terms-and-conditions', 'pages.legal.terms')->name('terms');
Route::view('/privacy-policy', 'pages.legal.privacy')->name('privacy');
Route::view('/cookies-policy', 'pages.legal.cookies')->name('cookies');

Route::get('/error', fn () => response()->view('pages.error', status: 404))->name('error');

foreach ([
    '/index.html' => '/',
    '/home-travel.html' => '/',
    '/home-travel-agency.html' => '/',
    '/about.html' => '/about',
    '/service.html' => '/service',
    '/service-details.html' => '/service-details',
    '/activities.html' => '/activities',
    '/activities-details.html' => '/activities-details',
    '/destination.html' => '/destination',
    '/destination-details.html' => '/destination-details',
    '/tour.html' => '/tour',
    '/tour-details.html' => '/tour-details',
    '/faq.html' => '/faq',
    '/contact.html' => '/contact',
    '/blog.html' => '/blog',
    '/blog-details.html' => '/blog-details',
    '/gallery.html' => '/gallery',
    '/terms-and-conditions.html' => '/terms-and-conditions',
    '/privacy-policy.html' => '/privacy-policy',
    '/cookies-policy.html' => '/cookies-policy',
    '/error.html' => '/error',
] as $legacyPath => $canonicalPath) {
    Route::redirect($legacyPath, $canonicalPath, 301);
}

Route::fallback(fn () => response()->view('pages.error', status: 404));
