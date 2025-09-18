<?php

use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\BlogPageController;
use App\Http\Controllers\Pages\ContactPageController;
use App\Http\Controllers\Pages\CoursePageController;
use App\Http\Controllers\Pages\FaqPageController;
use App\Http\Controllers\Pages\GalleryPageController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\JobPageController;
use App\Http\Controllers\Pages\ProfilePageController;
use App\Http\Controllers\Pages\ReviewPageController;
use App\Http\Controllers\Pages\SearchPageController;
use App\Http\Controllers\Pages\SocialLoginController;
use App\Http\Controllers\Pages\StudyWorkPageController;
use App\Http\Controllers\Pages\TeamPageController;
use App\Http\Controllers\Pages\TestPageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        // Home route
        Route::get('', [HomePageController::class, 'index'])->name('home');

        // About route
        Route::get('why-lgk', [AboutPageController::class, 'index'])->name('about');
        Route::get('privacy-policy', [AboutPageController::class, 'privacy'])->name('privacy');
        Route::get('terms-of-service', [AboutPageController::class, 'terms'])->name('terms');

        // Courses Routes
        Route::get('learn', [CoursePageController::class, 'index'])->name('courses');
        Route::post('/set-course-view', [CoursePageController::class, 'setCourseView'])->name('set-course-view');
        Route::get('learn/{course:slug}/course', [CoursePageController::class, 'show'])->name('courses.detail');
        Route::get('learn/{course:slug}/enroll', [CoursePageController::class, 'enrollPage'])->name('courses.enroll');
        Route::post('learn/{course:slug}/enroll/store', [CoursePageController::class, 'enrollStore'])->name('courses.enroll.store');

        // TestForGermany Routes
        Route::get('test-for-germany-language', [TestPageController::class, 'index'])->name('tests');
        Route::get('test-for-germany-language/{course:slug}/details', [TestPageController::class, 'show'])->name('tests.detail');

        // StudyWork Routes
        Route::get('study-work-in-germany/{type}-in-german', [StudyWorkPageController::class, 'index'])->name('study-work');
        Route::post('/set-study-work-view', [StudyWorkPageController::class, 'setStudyWorkeView'])->name('set-study-work-view');
        Route::get('study-work-in-germany/{studyWork:slug}/article', [StudyWorkPageController::class, 'show'])->name('study-work.detail');

        // Blog Routes
        Route::get('news-articles', [BlogPageController::class, 'index'])->name('articles');
        Route::post('/set-article-view', [BlogPageController::class, 'setArticleView'])->name('set-article-view');
        Route::get('news-articles/{article:slug}', [BlogPageController::class, 'show'])->name('articles.show');

        // Review Routes
        Route::get('reviews', [ReviewPageController::class, 'index'])->name('reviews');
        Route::get('reviews/create', [ReviewPageController::class, 'create'])->name('reviews-create');
        Route::post('reviews/send', [ReviewPageController::class, 'sendReview'])->name('reviews.store');

        // Team Routes
        Route::get('our-team', [TeamPageController::class, 'index'])->name('teams');
        Route::get('our-team/{team:slug}/details', [TeamPageController::class, 'show'])->name('teams.show');

        // Job Routes
        Route::get('offered-jobs', [JobPageController::class, 'index'])->name('jobs');
        Route::get('offered-jobs/{job:slug}/detail', [JobPageController::class, 'show'])->name('jobs.show');
        Route::post('offered-jobs/{job:slug}/send-application', [JobPageController::class, 'sendApplication'])->name('jobs.send');

        // Gallery Routes
        Route::get('/gallery/{type}', [GalleryPageController::class, 'index'])->name('gallery');

        // FAQ Route
        Route::get('faqs', [FaqPageController::class, 'index'])->name('faq');

        // Contact Routes
        Route::get('contact-us', [ContactPageController::class, 'index'])->name('contact');
        Route::post('contact-us/send-message', [ContactPageController::class, 'sendMessage'])->name('contact.send');

        // Profile Route
        Route::middleware('auth')->get('profile', [ProfilePageController::class, 'index'])->name('user-profile');
        Route::middleware('auth')->post('profile/update-data', [ProfilePageController::class, 'updateProfile'])->name('user-profile.update');
        Route::middleware('auth')->post('profile/change-password', [ProfilePageController::class, 'changePassword'])->name('user-profile.change');

        // Search Route
        Route::get('search-results', [SearchPageController::class, 'index'])->name('search');

        // Social Routes
        Route::middleware('guest')->get('/login/{service}', [SocialLoginController::class, 'redirect'])->name('social-login');
        Route::middleware('guest')->get('/login/{service}/callback', [SocialLoginController::class, 'callback'])->name('social-login.callback');
        Route::middleware('guest')->post('register-user', [SocialLoginController::class, 'StoreSocialUser'])->name('social-login.store');

        // Sitemap route
        Route::get('sitemap.xml', function () {
            return public_path('sitemap.xml');
        });
    }
);