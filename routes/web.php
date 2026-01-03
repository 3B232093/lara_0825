<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});


/* $post=new Post();
$post->title='test title';
$post->content='testcontent';
$post->save();


Post::create([
    'title'=>'create title',
    'content'=>'created content',
]);

//find方法
$post=Post::find(1);
echo '標題: '.$post->title.'<br>';
echo '內容: '.$post->content.'<br>';
dd($post);

//all方法
$posts=Post::all();
foreach ($posts as $post){
    echo'編號: '.$post->id.'<br>';
    echo'標題: '.$post->title.'<br>';
    echo'內容: '.$post->content.'<br>';
    echo'張貼時間: '.$post->created_at.'<br>';
    echo'---------------------------'.'<br>';
}
dd($posts);

//條件式
$posts=Post::where('id','<',10)->orderBy('id', 'DESC')->get();
dd($posts);

//更新資料 update
$post=Post::find(1);
$post->update([
    'title'=>'updatedtitle',
    'content'=>'updated content',
]);

//save方法
$post=Post::find(1);
$post->title='saved title';
$post->content='saved content';
$post->save();

//刪除資料 delete/destroy方法
$post=Post::find(1);
$post->delegte();

Post::destroy(2); */

//多筆貼文的集合
$allPosts=Post::all();
dd($allPosts);

$featuredPosts = \App\Models\Post::where('is_feature', 1)->get();
dd($featuredPosts);

