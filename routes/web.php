<?php
use App\Http\Controllers\MemberController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('members.index');
});

Route::resource('members', MemberController::class);
