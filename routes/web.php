<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes(['register'=> false]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userRegistration',[
   'uses'=>'UserRegistrationController@showRegistrationForm',
   'as'=>'userRegistration'
])->middleware('auth');

Route::post('/userRegistration',[
   'uses'=>'UserRegistrationController@userSave',
   'as'=>'userSave'
])->middleware('auth');

Route::get('/userList',[
   'uses'=>'UserRegistrationController@userList',
   'as'=>'userList'
])->middleware('auth');

Route::get('/userProfile/{userId}',[
   'uses'=>'UserRegistrationController@userProfile',
   'as'=>'userProfile'
])->middleware('auth');

Route::get('/change-user-info/{id}',[
   'uses'=>'UserRegistrationController@changeUserInfo',
   'as'=>'change-user-info'
])->middleware('auth');

Route::post('/userInfoUpdate',[
   'uses'=>'UserRegistrationController@userInfoUpdate',
   'as'=>'userInfoUpdate'
])->middleware('auth');

Route::get('/change-user-avatar/{id}',[
   'uses'=>'UserRegistrationController@changeUserAvatar',
   'as'=>'change-user-avatar'
])->middleware('auth');

Route::post('/update-user-photo',[
   'uses'=>'UserRegistrationController@updateUserPhoto',
   'as'=>'update-user-photo'
])->middleware('auth');

Route::get('/change-user-password/{id}',[
   'uses'=>'UserRegistrationController@changeUserPassword',
   'as'=>'change-user-password'
])->middleware('auth');

Route::post('/user-password-update',[
   'uses'=>'UserRegistrationController@userPasswordUpdate',
   'as'=>'user-password-update'
])->middleware('auth');

// General Controller
Route::get('/add-header-footer',[
   'uses'=>'HomePageController@addHeaderFooter',
   'as'=>'add-header-footer'
])->middleware('auth');

Route::post('/header-and-footer',[
   'uses'=>'HomePageController@headerAndFooterSave',
   'as'=>'header-and-footer-save'
])->middleware('auth');

Route::get('/manage-header-footer/{id}',[
   'uses'=>'HomePageController@manageHeaderFooter',
   'as'=>'manage-header-footer'
])->middleware('auth');

Route::post('/header-and-footer-update',[
   'uses'=>'HomePageController@headerAndFooterUpdate',
   'as'=>'header-and-footer-update'
])->middleware('auth');

//Slider

Route::get('/add-slider',[
   'uses'=>'SliderController@addSlider',
   'as'=>'add-slider'
])->middleware('auth');

Route::get('/manage-slide',[
   'uses'=>'SliderController@manageSlide',
   'as'=>'manage-slide'
])->middleware('auth');

Route::post('/upload-slide',[
   'uses'=>'SliderController@uploadSlide',
   'as'=>'upload-slide'
])->middleware('auth');

Route::get('/slide-unpublished/{id}',[
   'uses'=>'SliderController@slideUnpublished',
   'as'=>'slide-unpublished'
])->middleware('auth');

Route::get('/slide-published/{id}',[
   'uses'=>'SliderController@slidePublished',
   'as'=>'slide-published'
])->middleware('auth');

Route::get('/slide-edit/{id}',[
   'uses'=>'SliderController@slideEdit',
   'as'=>'slide-edit'
])->middleware('auth');

Route::post('/update-slide',[
   'uses'=>'SliderController@updateSlide',
   'as'=>'update-slide'
])->middleware('auth');

Route::get('/slide-delete/{id}',[
   'uses'=>'SliderController@slideDelete',
   'as'=>'slide-delete'
])->middleware('auth');

Route::get('/photo-gallery',[
   'uses'=>'SliderController@photoGallery',
   'as'=>'photo-gallery'
])->middleware('auth');

// School Manage route 

Route::get('/school/add',[
   'uses'=>'SchoolManagementController@addSchool',
   'as'=>'add-school'
])->middleware('auth');

Route::post('/school/add',[
   'uses'=>'SchoolManagementController@schoolSave',
   'as'=>'school-save'
])->middleware('auth');

Route::get('/school/list',[
   'uses'=>'SchoolManagementController@schoolList',
   'as'=>'school-list'
])->middleware('auth');

Route::get('/schoolList-unpublished/{id}',[
   'uses'=>'SchoolManagementController@schoolUnpublished',
   'as'=>'schoolList-unpublished'
])->middleware('auth');

Route::get('/schoolList-published/{id}',[
   'uses'=>'SchoolManagementController@schoolListPublished',
   'as'=>'schoolList-published'
])->middleware('auth');

Route::get('/schoolList-edit/{id}',[
   'uses'=>'SchoolManagementController@schoolListEdit',
   'as'=>'schoolList-edit'
])->middleware('auth');

Route::post('/update-school',[
   'uses'=>'SchoolManagementController@updateSchool',
   'as'=>'update-school'
])->middleware('auth');

Route::get('/schoolList-delete/{id}',[
   'uses'=>'SchoolManagementController@schoolListDelete',
   'as'=>'schoolList-delete'
])->middleware('auth');

// end school manage

//start class route

Route::get('/add-class',[
   'uses'=>'ClassManagementController@addClass',
   'as'=>'add-class'
])->middleware('auth');

Route::post('/class-save',[
   'uses'=>'ClassManagementController@classSave',
   'as'=>'class-save'
])->middleware('auth');

Route::get('/class-list',[
   'uses'=>'ClassManagementController@classList',
   'as'=>'class-list'
])->middleware('auth');

Route::get('/classList-unpublished/{id}',[
   'uses'=>'ClassManagementController@classListUnpublished',
   'as'=>'classList-unpublished'
])->middleware('auth');

Route::get('/classList-published/{id}',[
   'uses'=>'ClassManagementController@classListPublished',
   'as'=>'classList-published'
])->middleware('auth');

Route::get('/classList-edit/{id}',[
   'uses'=>'ClassManagementController@classListEdit',
   'as'=>'classList-edit'
])->middleware('auth');

Route::post('/update-class',[
   'uses'=>'ClassManagementController@updateClass',
   'as'=>'update-class'
])->middleware('auth');

Route::get('/classList-delete/{id}',[
   'uses'=>'ClassManagementController@classListDelete',
   'as'=>'classList-delete'
])->middleware('auth');
//end class route

// start batch route

Route::get('/add/batch',[
   'uses'=>'BatchManagementController@addBatch',
   'as'=>'add-batch'
])->middleware('auth');

Route::post('/save/batch',[
   'uses'=>'BatchManagementController@batchSave',
   'as'=>'batch-save'
])->middleware('auth');

Route::get('/batch/list',[
   'uses'=>'BatchManagementController@batchList',
   'as'=>'batch-list'
])->middleware('auth');

Route::get('/batch/list-by-ajax',[
   'uses'=>'BatchManagementController@batchListByAjax',
   'as'=>'batch-list-by-ajax'
])->middleware('auth');

Route::get('/batch/unpublished',[
   'uses'=>'BatchManagementController@batchUnpublished',
   'as'=>'batch-unpublished'
])->middleware('auth');

Route::get('/batch/published',[
   'uses'=>'BatchManagementController@batchPublished',
   'as'=>'batch-published'
])->middleware('auth');

Route::get('/batch/delete',[
   'uses'=>'BatchManagementController@batchDelete',
   'as'=>'batch-delete'
])->middleware('auth');

Route::get('/batch/edit/{id}',[
   'uses'=>'BatchManagementController@batchEdit',
   'as'=>'batch-edit'
])->middleware('auth');

Route::post('/batch/update',[
   'uses'=>'BatchManagementController@batchUpdate',
   'as'=>'batch-update'
])->middleware('auth');

//student type route

Route::get('/student-type',[
   'uses'=>'StudentTypeController@index',
   'as'=>'student-type'
])->middleware('auth');

Route::post('/student-type-add',[
   'uses'=>'StudentTypeController@studentTypeAdd',
   'as'=>'student-type-add'
])->middleware('auth');

Route::get('/student-type-list',[
   'uses'=>'StudentTypeController@studentTypeList',
   'as'=>'student-type-list'
])->middleware('auth');






