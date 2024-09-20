<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Quiz;
use App\Livewire\Admin\Choice;
use App\Livewire\Admin\Topic;
use App\Livewire\Admin\Target;
use App\Livewire\Admin\Seo;
use App\Livewire\Admin\Contact as AdminContact;
use App\Livewire\Admin\Comment;
use App\Livewire\Admin\DownloadLimit;
use App\Livewire\Admin\Scavenger as AdminScavenger;
use App\Livewire\Auth\Login;
use App\Livewire\Front\About;
use App\Livewire\Front\Contact;
use App\Livewire\Front\Privacy;
use App\Livewire\Front\Site;
use App\Livewire\Front\Scavenger;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;

Route::get('/', Site::class)->name('site');
Route::get('/scavenger', Scavenger::class)->name('scavenger');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/privacy', Privacy::class)->name('privacy');
Route::get('/secret/weapon/login', Login::class)->name('secret.login');

Route::middleware(['auth'])->prefix('secret/weapon')->group(function () {
    Route::get('/', Dashboard::class)->name('secret');  
    Route::get('/quizzes', Quiz::class)->name('quizzes');   
    Route::get('/choices', Choice::class)->name('choices'); 
    Route::get('/topics', Topic::class)->name('topics'); 
    Route::get('/scavengers', AdminScavenger::class)->name('scavengers');
    Route::get('/targets', Target::class)->name('targets');
    Route::get('/seo', Seo::class)->name('seo');
    Route::get('/contacts', AdminContact::class)->name('admin.contact'); 
    Route::get('/comments', Comment::class)->name('comments'); 
    Route::get('/download-limits', DownloadLimit::class)->name('download.limit'); 
    Route::get('/logout', LogoutController::class)->name('logout');
});