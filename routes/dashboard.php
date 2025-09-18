<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });

    Auth::routes();

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:dashboard_access']], function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
        Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
        Route::resource('users', 'UsersController');

        // Article
        Route::delete('articles/destroy', 'ArticleController@massDestroy')->name('articles.massDestroy');
        Route::post('articles/media', 'ArticleController@storeMedia')->name('articles.storeMedia');
        Route::post('articles/ckmedia', 'ArticleController@storeCKEditorImages')->name('articles.storeCKEditorImages');
        Route::resource('articles', 'ArticleController');

        // Site Language
        Route::delete('site-languages/destroy', 'SiteLanguageController@massDestroy')->name('site-languages.massDestroy');
        Route::resource('site-languages', 'SiteLanguageController');

        // Setting
        Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
        Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
        Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
        Route::resource('settings', 'SettingController');

        // Course
        Route::delete('courses/destroy', 'CourseController@massDestroy')->name('courses.massDestroy');
        Route::post('courses/media', 'CourseController@storeMedia')->name('courses.storeMedia');
        Route::post('courses/ckmedia', 'CourseController@storeCKEditorImages')->name('courses.storeCKEditorImages');
        Route::resource('courses', 'CourseController');

        // Course Type
        Route::delete('course-types/destroy', 'CourseTypeController@massDestroy')->name('course-types.massDestroy');
        Route::resource('course-types', 'CourseTypeController');

        // Course Level
        Route::delete('course-levels/destroy', 'CourseLevelController@massDestroy')->name('course-levels.massDestroy');
        Route::resource('course-levels', 'CourseLevelController');

        // Study Work
        Route::delete('study-works/destroy', 'StudyWorkController@massDestroy')->name('study-works.massDestroy');
        Route::post('study-works/media', 'StudyWorkController@storeMedia')->name('study-works.storeMedia');
        Route::post('study-works/ckmedia', 'StudyWorkController@storeCKEditorImages')->name('study-works.storeCKEditorImages');
        Route::resource('study-works', 'StudyWorkController');

        // Faq
        Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
        Route::post('faqs/media', 'FaqController@storeMedia')->name('faqs.storeMedia');
        Route::post('faqs/ckmedia', 'FaqController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
        Route::resource('faqs', 'FaqController');

        // Feature
        Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
        Route::post('features/media', 'FeatureController@storeMedia')->name('features.storeMedia');
        Route::post('features/ckmedia', 'FeatureController@storeCKEditorImages')->name('features.storeCKEditorImages');
        Route::resource('features', 'FeatureController');

        // Enroll
        Route::delete('enrolls/destroy', 'EnrollController@massDestroy')->name('enrolls.massDestroy');
        Route::resource('enrolls', 'EnrollController', ['except' => ['create', 'store']]);
        Route::get('enrolls/export-view/data', 'EnrollController@export')->name('enrolls.export');

        // Contact
        Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
        Route::resource('contacts', 'ContactController', ['except' => ['create', 'store']]);

        // Gallery
        Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
        Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
        Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
        Route::resource('galleries', 'GalleryController');

        // Team
        Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
        Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
        Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
        Route::resource('teams', 'TeamController');

        // Review
        Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
        Route::post('reviews/media', 'ReviewController@storeMedia')->name('reviews.storeMedia');
        Route::post('reviews/ckmedia', 'ReviewController@storeCKEditorImages')->name('reviews.storeCKEditorImages');
        Route::resource('reviews', 'ReviewController');

        // Job
        Route::delete('jobs/destroy', 'JobController@massDestroy')->name('jobs.massDestroy');
        Route::post('jobs/media', 'JobController@storeMedia')->name('jobs.storeMedia');
        Route::post('jobs/ckmedia', 'JobController@storeCKEditorImages')->name('jobs.storeCKEditorImages');
        Route::resource('jobs', 'JobController');

        // Job Application
        Route::delete('job-applications/destroy', 'JobApplicationController@massDestroy')->name('job-applications.massDestroy');
        Route::post('job-applications/media', 'JobApplicationController@storeMedia')->name('job-applications.storeMedia');
        Route::post('job-applications/ckmedia', 'JobApplicationController@storeCKEditorImages')->name('job-applications.storeCKEditorImages');
        Route::resource('job-applications', 'JobApplicationController', ['except' => ['create', 'store']]);
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', 'can:dashboard_access']], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });


});
