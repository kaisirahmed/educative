<?php

use Illuminate\Support\Facades\Auth; 


// Dashboard

Breadcrumbs::for('admin.dashboard', function ($trail) {
     $trail->push('Dashboard', route('admin.dashboard'));
});

//Authors

Breadcrumbs::for('admin.authors.index', function ($trail) {
	$trail->parent('admin.dashboard');
	if (Auth::user()->superAdmin()) {
		$trail->push('Authors & Super Admin', route('admin.authors.index'));
	}else{
		$trail->push('Authors', route('admin.authors.index'));
	}
});

Breadcrumbs::for('admin.register', function ($trail) {
	$trail->parent('admin.dashboard');
	$trail->push('Authors', route('admin.authors.index'));
	$trail->push('Register', route('admin.register'));
});

Breadcrumbs::for('admin.authors.edit', function ($trail, $author) {
	$trail->parent('admin.dashboard');
	$trail->push('Authors', route('admin.authors.index'));
	$trail->push('Edit', route('admin.authors.edit', $author->id));
});

// End Authors

// Students

Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Students', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.edit', function ($trail, $user) {
    $trail->parent('admin.dashboard');
    $trail->push('Students', route('admin.users.index'));
    $trail->push('Eidt', route('admin.users.edit', $user->id));
});

Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->parent('admin.dashboard');
    $trail->push('Students', route('admin.users.index'));
    $trail->push('Show', route('admin.users.show', $user->id));
});

// End Students

// Tracks 

Breadcrumbs::for('admin.tracks.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Tracks', route('admin.tracks.index'));
});

Breadcrumbs::for('admin.tracks.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Tracks', route('admin.tracks.index'));
    $trail->push('Create', route('admin.tracks.create'));
});

Breadcrumbs::for('admin.tracks.show', function ($trail, $track) {
    $trail->parent('admin.dashboard');
    $trail->push('Tracks', route('admin.tracks.index'));
    $trail->push('Show', route('admin.tracks.show', $track->id));
});

Breadcrumbs::for('admin.tracks.edit', function ($trail, $track) {
    $trail->parent('admin.dashboard');
    $trail->push('Tracks', route('admin.tracks.index'));
    $trail->push('Edit', route('admin.tracks.edit', $track->id));
});

// End Tracks

// Topics 

Breadcrumbs::for('admin.topics.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Topics', route('admin.topics.index'));
});

Breadcrumbs::for('admin.topics.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Topics', route('admin.topics.index'));
    $trail->push('Create', route('admin.topics.create'));
});

Breadcrumbs::for('admin.topics.show', function ($trail, $topic) {
    $trail->parent('admin.dashboard');
    $trail->push('Topics', route('admin.topics.index'));
    $trail->push('Show', route('admin.topics.show', $topic->id));
});

Breadcrumbs::for('admin.topics.edit', function ($trail, $topic) {
    $trail->parent('admin.dashboard');
    $trail->push('Topics', route('admin.topics.index'));
    $trail->push('Edit', route('admin.topics.edit', $topic->id));
});

// End Topics

// Courses 

Breadcrumbs::for('admin.courses.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Courses', route('admin.courses.index'));
});

Breadcrumbs::for('admin.courses.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Courses', route('admin.courses.index'));
    $trail->push('Create', route('admin.courses.create'));
});

Breadcrumbs::for('admin.courses.show', function ($trail, $course) {
    $trail->parent('admin.dashboard');
    $trail->push('Courses', route('admin.courses.index'));
    $trail->push('Show', route('admin.courses.show', $course->id));
});

Breadcrumbs::for('admin.courses.edit', function ($trail, $course) {
    $trail->parent('admin.dashboard');
    $trail->push('Courses', route('admin.courses.index'));
    $trail->push('Edit', route('admin.courses.edit', $course->id));
});

// End Courses

// Lessons 

Breadcrumbs::for('admin.lessons.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Lessons', route('admin.lessons.index'));
});

Breadcrumbs::for('admin.lessons.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Lessons', route('admin.lessons.index'));
    $trail->push('Create', route('admin.lessons.create'));
});

Breadcrumbs::for('admin.lessons.show', function ($trail, $lesson) {
    $trail->parent('admin.dashboard');
    $trail->push('Lessons', route('admin.lessons.index'));
    $trail->push('Show', route('admin.lessons.show', $lesson->id));
});

Breadcrumbs::for('admin.lessons.edit', function ($trail, $lesson) {
    $trail->parent('admin.dashboard');
    $trail->push('Lessons', route('admin.lessons.index'));
    $trail->push('Edit', route('admin.lessons.edit', $lesson->id));
});

// End Lessons

// Lesson Lists 

Breadcrumbs::for('admin.lessonlists.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Lesson Lists', route('admin.lessonlists.index'));
});

Breadcrumbs::for('admin.lessonlists.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Lesson Lists', route('admin.lessonlists.index'));
    $trail->push('Create', route('admin.lessonlists.create'));
});

Breadcrumbs::for('admin.lessonlists.show', function ($trail, $lessonlist) {
    $trail->parent('admin.dashboard');
    $trail->push('Lesson Lists', route('admin.lessonlists.index'));
    $trail->push('Show', route('admin.lessonlists.show', $lessonlist->id));
});

Breadcrumbs::for('admin.lessonlists.edit', function ($trail, $lessonlist) {
    $trail->parent('admin.dashboard');
    $trail->push('Lesson Lists', route('admin.lessonlists.index'));
    $trail->push('Edit', route('admin.lessonlists.edit', $lessonlist->id));
});

// End Lesson Lists

// Quizzes 

Breadcrumbs::for('admin.quizzes.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Quizzes', route('admin.quizzes.index'));
});

Breadcrumbs::for('admin.quizzes.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Quizzes', route('admin.quizzes.index'));
    $trail->push('Create', route('admin.quizzes.create'));
});

Breadcrumbs::for('admin.quizzes.show', function ($trail, $quiz) {
    $trail->parent('admin.dashboard');
    $trail->push('Quizzes', route('admin.quizzes.index'));
    $trail->push('Show', route('admin.quizzes.show', $quiz->id));
});

Breadcrumbs::for('admin.quizzes.edit', function ($trail, $quiz) {
    $trail->parent('admin.dashboard');
    $trail->push('Quizzes', route('admin.quizzes.index'));
    $trail->push('Edit', route('admin.quizzes.edit', $quiz->id));
});

// End Quizzes

// Blogs

Breadcrumbs::for('admin.blogs.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Blogs', route('admin.blogs.index'));
});

Breadcrumbs::for('admin.blogs.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Blogs', route('admin.blogs.index'));
    $trail->push('Create', route('admin.blogs.create'));
});

Breadcrumbs::for('admin.blogs.show', function ($trail, $blog) {
    $trail->parent('admin.dashboard');
    $trail->push('Blogs', route('admin.blogs.index'));
    $trail->push('Show', route('admin.blogs.show', $blog->id));
});

Breadcrumbs::for('admin.blogs.edit', function ($trail, $blog) {
    $trail->parent('admin.dashboard');
    $trail->push('Blogs', route('admin.blogs.index'));
    $trail->push('Edit', route('admin.blogs.edit', $blog->id));
});

// End Blogs

// Enrolls

Breadcrumbs::for('admin.enrolls.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Enrolls', route('admin.enrolls.index'));
});

Breadcrumbs::for('admin.enrolls.show', function ($trail, $enroll) {
     $trail->parent('admin.dashboard');
     $trail->push('Enrolls', route('admin.enrolls.index'));
     $trail->push('Show', route('admin.enrolls.show',$enroll->id));
});

// End Enrolls

// Subscriptions

Breadcrumbs::for('admin.subscriptions.index', function ($trail) {
     $trail->parent('admin.dashboard');
     $trail->push('Subscriptions', route('admin.subscriptions.index'));
});

Breadcrumbs::for('admin.subscriptions.show', function ($trail, $subscription) {
     $trail->parent('admin.dashboard');
     $trail->push('Subscriptions', route('admin.subscriptions.index'));
     $trail->push('Show', route('admin.subscriptions.show',$subscription->id));
});

// End Subscriptions

// Contact 

Breadcrumbs::for('admin.contact.index', function($trail){
    $trail->parent('admin.dashboard');
    $trail->push('Contact', route('admin.contact.index'));
});


// Error 404
Breadcrumbs::for('errors.404', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Page Not Found');
});


?>