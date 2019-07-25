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

//home page
Route::get('/','FrontendController@index')->name('home');

//signup
Route::post('signuppost','AuthenticationController@signup')->name('signuppost');
Route::get('signup','FrontendController@signupview')->name('signup');

//login
Route::get('login','FrontendController@loginview')->name('login');
Route::post('loginpost','AuthenticationController@loginpost')->name('loginpost');

//logout

Route::get('logout','AuthenticationController@logout')->name('logout');


// Admin Panel Routes
Route::group(['prefix' => 'admin','middleware' => 'AdminWare'], function(){

    //Index
    Route::get('/','IndexController@index')->name('adminhome');

    //posts
Route::get('addpost','PostController@addpostview')->name('addpost');
Route::post('addPostPost','PostController@addpost')->name('addPostPost');
Route::get('posts','PostController@postsview')->name('posts');
Route::get('deletePosts/{id}','PostController@deletePosts')->name('deletePosts');
Route::get('editPost/{id}','PostController@editPost')->name('editPost');
Route::post('editPostPost','PostController@editpostpost')->name('editPostPost');
Route::get('see_more_post/{id}','PostController@see_more_post')->name('see_more_post');
Route::get('batches','BatchController@batches')->name('batches');
Route::post('addBatch','BatchController@addBatch')->name('addBatch');
Route::get('deleteBatch/{id}','BatchController@deleteBatch')->name('deleteBatch');
Route::get('editBatch/{id}','BatchController@editBatch')->name('editBatch');
Route::post('BatchEdit','BatchController@BatchEdit')->name('BatchEdit');

Route::get('departments','DepartmentController@departments')->name('departments');
Route::post('addDepartment','DepartmentController@addDepartment')->name('addDepartment');
Route::get('departments','DepartmentController@departmentView')->name('departments');
Route::get('deleteDepartment/{id}','DepartmentController@deleteDepartment')->name('deleteDepartment');
Route::get('editDep/{id}','DepartmentController@editDep')->name('editDep');
Route::post('editingDep','DepartmentController@editingDep')->name('editingDep');

//donors
Route::get('adddonor','DonorController@adddonorview')->name('adddonor');
Route::post('adddonorPost','DonorController@adddonor')->name('adddonorPost');
Route::get('donors','DonorController@viewdonors')->name('donors');
Route::get('deleteDonor/{id}','DonorController@deleteDonor')->name('deleteDonor');
Route::get('EditDonor/{id}','DonorController@EditDonor')->name('EditDonor');
Route::post('AddEditDonorData','DonorController@AddEditDonorData')->name('AddEditDonorData');
Route::get('viewDonor/{id}','DonorController@viewDonor')->name('viewDonor');

//sms

Route::get('sendsms','SMSController@sendsmsview')->name('sendsms');
Route::get('sendsmsPost','SMSController@sendsms')->name('sendsmsPost');
Route::get('requestsms','SMSController@requestsms')->name('requestsms');

//gallery

Route::get('addimage','GalleryController@addimagetogallery')->name('addimage');
Route::post('addimagePost','GalleryController@addimagetogalleryPost')->name('addimagePost');
Route::get('ImageGallery','GalleryController@ImageGallery')->name('ImageGallery');
Route::get('deleteImage/{id}','GalleryController@deleteImage')->name('deleteImage');
Route::get('see_gallery/{id}','GalleryController@see_gallery')->name('see_gallery');
Route::get('editImage/{id}','GalleryController@editImage')->name('editImage');
Route::post('updateImage','GalleryController@updateImage')->name('updateImage');
//messages

Route::get('addmessage','FrontMessagesController@addmessage')->name('addmessage');
Route::post('addmessagePost','FrontMessagesController@addmessagePost')->name('addmessagePost');
Route::get('messages','FrontMessagesController@index')->name('messages');
Route::get('editmsg/{id}','FrontMessagesController@editmsg')->name('editmsg');
Route::get('deletemsg/{id}','FrontMessagesController@deletemsg')->name('deletemsg');

//Slider

Route::get('viewsliderimages','FrontSliderController@index')->name('viewsliderimages');
Route::get('addsliderimage','FrontSliderController@addsliderimage')->name('addsliderimage');
Route::post('addsliderimagePost','FrontSliderController@addsliderimagePost')->name('addsliderimagePost');
Route::get('editsliderimage/{id}','FrontSliderController@editsliderimage')->name('editsliderimage');
Route::get('deletesliderimage/{id}','FrontSliderController@deletesliderimage')->name('deletesliderimage');
Route::post('updateSliderImage','FrontSliderController@updateSliderImage')->name('updateSliderImage');

//profile
Route::get('profile','ProfileController@index')->name('profile');
Route::post('updateprofile','ProfileController@updateprofile')->name('updateprofile');

//settings
Route::get('settings','SettingsController@index')->name('settings');
Route::post('changepassword','AuthenticationController@changepass')->name('changepass');
Route::post('updatesitedesc','SettingsController@updatesitedesc')->name('updatesitedesc');
Route::post('sociallinks','SettingsController@sociallinks')->name('sociallinks');

//pages
// --> about us
Route::get('aboutuspage','PagesController@aboutuspage')->name('aboutuspage');
Route::post('aboutpage','PagesController@aboutpageupdate')->name('aboutpage');

// --> privacy
Route::get('privacy','PagesController@privacypage')->name('privacy');
Route::post('privacypage','PagesController@privacypageupdate')->name('privacypage');

// --> contact us
Route::get('contactus','PagesController@contactuspage')->name('contactus');
Route::post('contactpage','PagesController@contactuspageupdate')->name('contactpage');

// --> terms and condition page.
Route::get('terms','PagesController@termspage')->name('terms');
Route::post('termspage','PagesController@termspageupdate')->name('termspage');
//promote user
Route::get('usersPage','UsersController@usersPage')->name('usersPage');
Route::post('promoteuser','UsersController@promoteuser')->name('promoteuser');
Route::get('demoteuser/{id}','UsersController@demoteuser')->name('demoteuser');


//chat admin side

Route::get('mychats/{id}','ChatController@mychats')->name('mychats');
Route::get('sendmsg','ChatController@sendmsg')->name('sendmsg');
Route::get('getmessages/{id}','ChatController@getLoggedInIntervalAdminMessages')->name('getmsgs');

//get my alerts

Route::get('getchatalerts','ChatController@getChatAlertForAdmin')->name('getchatalerts');



});


//chat without login

Route::get('chat/send','ChatController@chatFromFrontEnd')->name('send');
Route::get('chat/getmessages','ChatController@getNonLoggedInUserMessages')->name('getmessages');


//frontend gallery

Route::get('galleryview','GalleryController@gallery')->name('gallery');
Route::get('aboutus','GalleryController@gallery')->name('aboutus');
