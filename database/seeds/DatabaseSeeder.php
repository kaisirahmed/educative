<?php


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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
    		Admin::truncate();
        TrackTopic::truncate();
    		Course::truncate();
    		Lesson::truncate();
    		LessonList::truncate();
    		Blog::truncate();
        Enroll::truncate();
        Subscription::truncate();
        Coupon::truncate();
    		
       

       	$usersQuantity = 20;
       	$adminsQuantity = 5;
       	$coursesQuantity = 100;
       	$lessonsQuantity = 200;
       	$lessonListQuantity = 600;
       	$blogQuantity = 50;
       	$trackTopicQuantity = 50;
        $enrollQuantity = 20;
        $couponsQuantity = 10;
        $subscriptionQuantity = 30;

       	factory(User::class, $usersQuantity)->create();

       	factory(Admin::class, $adminsQuantity)->create();

        factory(Blog::class, $blogQuantity)->create();

        factory(TrackTopic::class, $trackTopicQuantity)->create(); 

       	factory(Course::class, $coursesQuantity)->create();
        
        for ($i=0; $i < 40 ; $i++) { 
          DB::table('course_track_topic')->insert(
          [
              'course_id' => Course::select('id')->orderByRaw("RAND()")->first()->id,
              'track_topic_id' => TrackTopic::select('id')->orderByRaw("RAND()")->first()->id,
          ]);
        }
        
        

        factory(Enroll::class, $enrollQuantity)->create();

       	factory(Lesson::class, $lessonsQuantity)->create();

       	factory(LessonList::class, $lessonListQuantity)->create();

        factory(Subscription::class, $subscriptionQuantity)->create();

        factory(Coupon::class, $couponsQuantity)->create();        
    }
}
