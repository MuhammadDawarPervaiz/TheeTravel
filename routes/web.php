<?php

use App\Continent;


/*
Route::get('/maintenance_mode', function () {
    $clearcache = Artisan::call('down');
    echo "Maintenance Mode Activated<br>";
});/**/

/*
Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});/**/

Auth::routes();

// AdminController
    Route::get('admin', 'AdminController@index');
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('addFlights', 'AdminController@addFlights')->name('admin.addFlights');
    Route::get('manageFlights', 'AdminController@continents')->name('admin.manageFlights');
    Route::get('manageBookings', 'AdminController@bookings')->name('admin.manageBookings');
    Route::post('confirm_booking', 'AdminController@confirm_booking');
    Route::get('manageNews', 'AdminController@news')->name('admin.manageNews');
    Route::post('add_news', 'AdminController@add_news')->name('admin.addNews');
    Route::get('Complaints', 'AdminController@customer_complaints')->name('admin.customerComlaints');
    Route::get('viewCustomers', 'AdminController@view_customers')->name('admin.viewCustomers');
    Route::get('viewCustomers/{id}', 'AdminController@customer_documents')->name('admin.customerDocuments');

    // CRUD for Continents
          Route::post('addBlogPost', 'AdminController@add_blog_post')->name('admin.addBlogPost');           // C
          Route::get('blogPost', 'AdminController@blog_post')->name('admin.blogPost');                      // R
          Route::get('update_blog', 'AdminController@blog_post');                                           // U
          Route::post('addBlogPost/{id}', 'AdminController@update_blog');                                   // U
          Route::get('manageBlogPost', 'AdminController@manage_blog_post')->name('admin.manageBlogPost');   // R
          Route::post('del_blog', 'AdminController@del_blog');                                              // D


    // CRUD for Continents
          Route::post('add_continent', 'AdminController@add_continent');        // C
          Route::get('continents', 'AdminController@continents');               // R
          Route::get('update_continent', 'AdminController@addFlights');         // U
          Route::post('add_continent/{id}', 'AdminController@update_continent');// U
          Route::post('del_continent', 'AdminController@del_continent');        // D

    // CRUD for Cities
          Route::post('add_city', 'AdminController@add_city');                  // C
          Route::get('cities', 'AdminController@cities');                       // R
          Route::get('update_cities', 'AdminController@addFlights');            // U
          Route::post('add_city/{id}', 'AdminController@update_city');          // U
          Route::post('del_city', 'AdminController@del_city');                  // D

    // CRUD for Airport
          Route::post('add_airport', 'AdminController@add_airport');            // C
          Route::get('airports', 'AdminController@airports');                   // R
          Route::get('update_airport', 'AdminController@addFlights');           // U
          Route::post('add_airport/{id}', 'AdminController@update_airport');    // U
          Route::post('del_airport', 'AdminController@del_airport');            // D

    // CRUD for Airlines
          Route::post('add_airline', 'AdminController@add_airline');            // C
          Route::get('airlines', 'AdminController@airlines');                   // R
          Route::get('update_airline', 'AdminController@addFlights');           // U
          Route::post('add_airline/{id}', 'AdminController@update_airline');    // U
          Route::post('del_airline', 'AdminController@del_airline');            // D

    // CRUD for Classes
          Route::post('add_class', 'AdminController@add_class');                // C
          Route::get('class', 'AdminController@class');                         // R
          Route::get('update_class', 'AdminController@addFlights');             // U
          Route::post('add_class/{id}', 'AdminController@update_class');        // C
          Route::post('del_class', 'AdminController@del_class');                // D

    // CRUD for Routes
          Route::post('add_route', 'AdminController@add_route');                // C
          Route::get('routes', 'AdminController@routes');                       // R
          Route::get('update_route', 'AdminController@addFlights');             // U
          Route::post('add_route/{id}', 'AdminController@update_route');        // U
          Route::post('del_route', 'AdminController@del_route');                // D

    Route::get('edit_profile', 'AdminController@edit');

// CustomerController

    Route::prefix('customer')->group(function() {
        Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
        Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
        Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
        Route::post('/profile', 'CustomerController@update')->name('customer.update.submit');
        Route::get('/home', 'CustomerController@index')->name('customer.dashboard');
        Route::get('/profile', 'CustomerController@showProfileForm')->name('customer.profile');
        Route::get('/complaint', 'CustomerController@showComplaintForm')->name('customer.complaintRegistration');
        Route::post('/complaint', 'CustomerComplaintController@sendComplaint')->name('customer.complaint.submit');
        Route::get('/docs', 'CustomerController@showDocumentForm')->name('customer.personalDocuments');
        Route::post('/docs', 'CustomerDocumentsController@uploadDocs')->name('customer.docs.upload');
        Route::get('/viewDocs', 'CustomerController@showDocuments')->name('customer.viewDocuments');

        // Password reset routes

        Route::post('/password/email', 'Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
        Route::get('/password/reset', 'Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
        Route::post('/password/reset', 'Auth\CustomerResetPasswordController@reset');
        Route::get('/password/reset/{token}', 'Auth\CustomerResetPasswordController@showResetForm')->name('customer.password.reset');
    });

// HomeController
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::post('/admin/logout', 'Auth\LoginController@adminLogout')->name('admin.logout');
    Route::post('contactUsServer', function (App\ContactUsServer $contactUsServer) {
        return $contactUsServer;
    });

// Blog Controller
    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog-post', 'BlogController@show');

// Static Pages
    Route::get('/sitemap', function () {
        $continents = Continent::all();
        return view('sitemap');
    })->name('sitemap');

    Route::get('faq', function () {
        $continents = Continent::all();
        return view('faq', compact('continents'));
    })->name('faq');

    Route::get('terms-and-conditions', function () {
        $continents = Continent::all();
        return view('termsAndConditions', compact('continents'));
    })->name('terms-and-conditions');

    Route::get('about-us', function () {
        $continents = Continent::all();
        return view('aboutUs', compact('continents'));
    })->name('about-us');

    Route::get('contact-us', function () {
        $continents = Continent::all();
        return view('contactUs', compact('continents'));
    })->name('contact-us');
    Route::post('contact-us', 'HomeController@postContact')->name('postContactUs');

    // Flights
        Route::get('category/{flight}', 'ContinentController@index')->name('show.continents');
        Route::get('category/{flight}/{route}', 'RouteController@index')->name('show.routes');
        Route::post('/', 'BookingController@create')->name('book.ticket');
        Route::get('inquiry_form', 'BookingController@index')->name('show.inquiry_form');
