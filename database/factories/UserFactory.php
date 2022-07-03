<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Admin;
use App\Course;
use App\Lesson;
use App\LessonList;
use App\Blog;
use App\TrackTopic;
use App\Enroll;
use App\Coupon;
use App\Subscription;
use App\Quiz;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone'	=> $faker->randomElement(['01987798224','01716991118','0171704763','0196040321','01783388636']),
        'father_name' => $faker->name('male'),
        'mother_name' => $faker->name('female'),
        'present_address' => $faker->address,
        'permanent_address' => $faker->address,
        'education' => $faker->randomElement(['CSE','MSC','ECE','EEE']),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Admin::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => $faker->randomElement(['superAdmin','admin']),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(TrackTopic::class, function (Faker $faker) {
    return [
    	'image' => $faker->randomElement(['angularjs.png','javascript.png','reactjs.png','vuejs.png']),
        'title' => $faker->word,
        'course_type' => $faker->randomElement(['track','topic']),
        'short_description' => $faker->text, 
    ];
});



$factory->define(Course::class, function (Faker $faker) {

    return [
        'admin_id' => factory('App\Admin')->create()->id,
        'title' => $faker->sentence,
        'banner' => $faker->randomElement(['course1.png','course2.png','course3.png','course4.png']),
        'short_description' => $faker->text,
        'price' => $faker->randomElement(['120.43','343.4','900.32','423.43','243.3']),
        'level' => $faker->randomElement(['beginner','intermediate','advanced']),
    ];
});


$factory->define(Lesson::class, function (Faker $faker) {

    return [
        'course_id' => factory('App\Course')->create()->id,
        'title' => $faker->sentence,
        'order_number' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    ];
});

// public function options()
// {
//     $options = [
//         'option1',
//         'option2',
//         'option3',
//         'option4',
//     ];
//     return json_encode($opitons);
// }

// public function correctAnswer()
// {
//     $answer = [
//         'option1'
//     ];
//     return json_encode($answer);
// }

// $factory->define(Quiz::class, function (Faker $faker) {

//     return [
//         'lesson_id' => factory('App\Lesson')->create()->id,
//         'question' => $faker->sentence,
//         'question_type' => $faker->randomElement(['radio','checkbox']),
//         'options' => $this->options,
//         'correct_answer' => $this->answer,
//     ];
// });


$factory->define(LessonList::class, function (Faker $faker) {

    return [
        'lesson_id' => factory('App\Lesson')->create()->id,
        'title' => $faker->sentence,
        'description' => $faker->text,
        'order_number' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'preview' => $faker->randomElement([1,0]),
    ];
});


$factory->define(Enroll::class, function (Faker $faker) {

    return [
    	'track_topic_id' => factory('App\TrackTopic')->create()->id,
		'course_id' => factory('App\Course')->create()->id,
		'user_id' => factory('App\User')->create()->id,
		'current_lesson' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
		'percent_completion' => $faker->randomElement([23,53,23,100,65,76]),
		'coupon_code' => $faker->randomElement(['SFAEWF','AFJNKO','SDFNWOE','ASKDFNOE','GUYGUKH','KJHGFYRJI','LGTYJCYJ','LGYTFHXJH','KJHGYRTSDFHG','YRYGIJHUTCH','JKCTSTF','HFTESDY','JHFDYEST','JHFDYRE','HXYESDYJ','JHDREH','HCYESDYHJ','HGDYSTGH','FTRDFUYHJ','JFEYRSXHB','KJFSTYIUK','GXRZXH','JTSYHJ','HFDERTHJ','ESWDFGHJ','GFSDFGHBJN','DRCGVHBJN','JHGFDSRSDGFHG','JHGFTDXFG','RSEDFGHJ','HSHGFGTR','ETYERSGVE','TYHRG','YHEBREW','YHRFVWRF','RYHERW','OIUYT','WRTEWR','HWGREFAW','AEFGGV']),
    ];
});


$factory->define(Blog::class, function (Faker $faker) {

    return [
    	'admin_id' => factory('App\Admin')->create()->id,
		'title' => $faker->sentence,
		'banner' => $faker->randomElement(['blog1.jpg','blog2.jpg','blog3.jpg','blog4.jpg']),
		'description' => $faker->text,
    ];
});

$factory->define(Coupon::class, function (Faker $faker) {

    return [
        'coupon_code' => $faker->randomElement(['SFAEWF','AFJNKO','SDFNWOE','ASKDFNOE','GUYGUKH','KJHGFYRJI','LGTYJCYJ','LGYTFHXJH','KJHGYRTSDFHG','YRYGIJHUTCH','JKCTSTF','HFTESDY','JHFDYEST','JHFDYRE','HXYESDYJ','JHDREH','HCYESDYHJ','HGDYSTGH','FTRDFUYHJ','JFEYRSXHB','KJFSTYIUK','GXRZXH','JTSYHJ','HFDERTHJ','ESWDFGHJ','GFSDFGHBJN','DRCGVHBJN','JHGFDSRSDGFHG','JHGFTDXFG','RSEDFGHJ']),
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now()->addDays(30),
    ];
});

$factory->define(Subscription::class, function (Faker $faker) {
 
    return [
        'track_topic_id' => factory('App\TrackTopic')->create()->id,
        'course_id' => factory('App\Course')->create()->id,
        'user_id' => factory('App\User')->create()->id,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now()->addDays(30),
    ];
});


 


 