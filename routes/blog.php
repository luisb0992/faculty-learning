<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('blog', [BlogController::class, 'showAllBlog'])->name('blog');
Route::get('blog/feature', [BlogController::class, 'showAllBlogFeature'])->name('blog.feature');
Route::post('filter-blogs', [BlogController::class, 'filterBlog'])->name('filter.blog');
Route::get('blog/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');

Route::group(['middleware' => 'auth'], function () {
  Route::post('blog-comment', [BlogController::class, 'comment'])->name('blog.comment');
  Route::get('blog-comments/{id}', [BlogController::class, 'comments'])->name('blog.comments');
  Route::post('comment-reply', [BlogController::class, 'reply'])->name('blog.comment.reply');
  Route::get('comment-replies', [BlogController::class, 'replies'])->name('blog.comment.replies');
});
