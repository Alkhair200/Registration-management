<?php

Route::group(['namespace'=>'Admin','middleware' => 'auth:admin'], function(){

   ##################### Start Dashboard Welcome ###########################
   Route::get('/', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('welcome');
   ##################### End Dashboard Welcome #############################



   ###################### Start Forgot Password ############################ 
   Route::any('logout',[App\Http\Controllers\Admin\LoginController::class,'logout'])->name('logout');
   ###################### End Forgot Password ##############################
});   

Route::group(['namespace'=>'Admin','middleware' => 'guest:admin'], function(){

    ######################## Start Forgot Password ########################
    Route::get('forgot-password',[App\Http\Controllers\Admin\LoginController::class,'ForgotPassword'])->name('forgot-password');
    ######################## End Forgot Password ##########################

    ######################### Start GetLogin  #############################
    Route::get('login',[App\Http\Controllers\Admin\LoginController::class,'getLogin'])->name('get.admin.login');
    ######################### End GetLogin  ###############################

    ##################### Start Dashboard Welcome ###########################
    Route::post('login',[App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
    ##################### Start Dashboard Welcome ###########################

    #################### Start Forgot Password Post #########################
    Route::post('forgot-password-post',[App\Http\Controllers\Admin\LoginController::class,'ForgotPasswordPost'])->name('forgot-password-post');
    #################### End Forgot Password Post ###########################

    #################### Start Forgot Password Post #########################
    Route::get('reset-password/{token}',[App\Http\Controllers\Admin\LoginController::class,'ResetPassword'])->name('reset-password');
    #################### End Forgot Password Post ###########################

    #################### Start Forgot Password Post #########################
    Route::post('reset-password/{token}',[App\Http\Controllers\Admin\LoginController::class,'ResetPasswordFinal'])->name('reset-password');
    #################### End Forgot Password Post ###########################    
});
