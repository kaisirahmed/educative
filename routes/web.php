<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Middleware @revalidate for remove browser cache
 */

Route::group(['middleware' => 'revalidate'], function() {

/**
 * Frontend Routes started without authentication
 */
	Auth::routes([ 'verify' => true ]);

	Route::namespace('Frontend')->group(function(){

		Route::get('/',['as'=>'home','uses'=>'LearningController@index']);

		Route::get('/courses',['as'=>'courses','uses'=>'CourseController@courses']);

		Route::get('/course/{slug}',['as'=>'course','uses'=>'CourseController@courseView']);

		Route::get('/course/{courseId}/{lessonId}/{slug}',['as'=>'courses.{courseId}.{lessonId}.{slug}','uses'=>'CourseController@courseLessons']);

		Route::get('/track/{slug}/courses',['as'=>'track.courses','uses'=>'CourseController@trackCourses']);

		Route::get('/topic/{slug}/courses',['as'=>'topic.courses','uses'=>'CourseController@topicCourses']);

		Route::get('/tracks',['as'=>'tracks','uses'=>'TrackController@tracks']);
		
		Route::get('/topics',['as'=>'topics','uses'=>'TopicController@topics']);
		
		Route::get('/blogs',['as'=>'blogs','uses'=>'BlogController@index']);

		Route::get('/blog/{id}/{slug}',['as'=>'blog','uses'=>'BlogController@show']);

	/**
	 * Frontend Vue Routes..
	 */

		Route::get('/topics/json',['as'=>'topic.json','uses'=>'LearningVueController@topics']);

		Route::get('/courses/json',['as'=>'courses.json','uses'=>'LearningVueController@courses']);
		
		Route::get('/courses/search/{query}',['as'=>'courses.search','uses'=>'LearningVueController@courseSearchQuery']);

		Route::get('/courses/filter/{filter}',['as'=>'courses.filter','uses'=>'LearningVueController@courseFilter']);

		Route::get('/latest/courses/json',['as'=>'latest.courses.json','uses'=>'LearningVueController@latestCourses']);

		Route::get('/tracks/json',['as'=>'tracks.json','uses'=>'LearningVueController@tracks']);

		Route::get('/blogs/json',['as'=>'blogs.json','uses'=>'LearningVueController@blogs']);

		Route::get('/blogs/search/{query}',['as'=>'blogs.search','uses'=>'LearningVueController@searchBlogs']);

		Route::get('/latest/topics/json',['as'=>'latest.topics.json','uses'=>'LearningVueController@latestTopics']);

		Route::get('/subscriptions/json',['as'=>'subscriptions.json','uses'=>'SubscriptionController@subscriptions']);

		Route::get('/subscriptions/search/{query}',['as'=>'subscriptions.search','uses'=>'SubscriptionController@subscriptionSearch']);

		Route::get('/latest/blogs/json',['as'=>'latest.blogs.json','uses'=>'LearningVueController@latestBlogs']);

		Route::get('/search/lessons/lists/{courseId}',['as'=>'search.lessons.lists.{courseId}','uses'=>'LearningVueController@searchLessonLists']);

	});

/**
 * End Frontend routes without authentication
 */

/**
 * Auth routes for user and admin started...
 */

	Route::group(['middleware' => ['auth','verified']], function () {

		Route::namespace('Frontend')->group(function(){
			Route::get('/subscriptions',['as'=>'subscriptions','uses'=>'SubscriptionController@index']);
			
		});
	});




/**
 * Admin Routes started ...
 */	

	Route::namespace('Admin')->group(function(){

		Route::prefix('admin')->name('admin.')->namespace('Auth')->group(function(){
			 
	        Route::post('/logout',['as'=>'logout','uses'=>'LoginController@logout']);

			Route::get('/login', ['as'=>'login','uses'=>'LoginController@showLoginForm']);

			Route::post('/login', ['as'=>'login','uses'=>'LoginController@login']);

	        //Forgot Password Routes
	        Route::get('/password/reset',['as'=>'password.request','uses'=>'ForgotPasswordController@showLinkRequestForm']);

	        Route::post('/password/email',['as'=>'password.email','uses'=>'ForgotPasswordController@sendResetLinkEmail']);

	        //Reset Password Routes
	        Route::get('/password/reset/{token}',['as'=>'password.reset','uses'=>'ResetPasswordController@showResetForm']);

	        Route::post('/password/reset',['as'=>'password.update','uses'=>'ResetPasswordController@reset']);

	        // Email Verification Route(s)
	        Route::get('/email/verify',['as'=>'verification.notice','uses'=>'VerificationController@show']);

	        Route::get('/email/verify/{id}',['as'=>'verification.verify','uses'=>'VerificationController@verify']);

	        Route::get('/email/resend',['as'=>'verification.resend','uses'=>'VerificationController@resend']);
		});

		Route::group(['middleware' => ['auth:admin','guard.verified:admin,admin.verification.notice']], function () {    		
			Route::prefix('admin')->name('admin.')->group(function (){

				Route::namespace('Auth')->group(function(){

					Route::get('/register', ['as'=>'register','uses'=>'RegisterController@showRegisterForm']);

					Route::post('/register', ['as'=>'register','uses'=>'RegisterController@create']);
				});

				Route::get('/dashboard',['as'=>'dashboard','uses'=>'AdminController@admin']);

				Route::resource('authors','AdminController');
				
				Route::resource('users','UserController');

				Route::resource('tracks','TrackController');

				Route::resource('topics','TopicController');

				Route::resource('courses','CourseController');

				Route::resource('lessons','LessonController');

				Route::resource('lessonlists','LessonListController');

				Route::resource('quizzes','QuizController');

				Route::resource('enrolls','EnrollController');

				Route::resource('subscriptions','SubscriptionController');

				Route::resource('blogs','BlogController');

				Route::resource('contact','ContactController');
			});
		});
	});

/**
 * Ckeditor routes for image upload...
 */

	Route::namespace('Ckeditor')->prefix('ckeditor')->name('ckeditor.')->middleware('auth:admin')->group( function (){
			
		Route::post('upload',['as'=>'upload','uses'=>'CkeditorController@upload']);
	});

/**
 * End Ckeditor routes for image upload...
 */

});
 
/**
 * End Auth routes user and admin
 */


/*
[8:43 pm, 01/05/2020] Konok Brother: elearning@biyebd.com
Uz0{puL35G@M
[8:44 pm, 01/05/2020] Konok Brother: Non-SSL Settings (NOT Recommended)
Username:	elearning@biyebd.com
Password:	Use the email account’s password.
Incoming Server:	mail.biyebd.com
IMAP Port: 143 POP3 Port: 110
Outgoing Server:	mail.biyebd.com
SMTP Port: 26
IMAP, POP3, and SMTP require authentication.
[10:17 pm, 01/05/2020] Konok Brother: Uz0{puL35G@M
*/