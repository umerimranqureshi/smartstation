<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\HomeSlider;
use App\Models\Service;
use App\Models\RepairService;
use App\Models\PageContent;
use App\Models\FooterContent;
use Illuminate\Routing\Route as IlluminateRoute;
use Illuminate\Routing\Matching\CaseInsensitiveUriValidator;
use Illuminate\Routing\Matching\UriValidator;

$validators = IlluminateRoute::getValidators();
$validators[] = new CaseInsensitiveUriValidator;
IlluminateRoute::$validators = array_filter($validators, function($validator) {
  return get_class($validator) != UriValidator::class;
});

Route::get('/', function () {
	$sliders  	= HomeSlider::all();
	$services 	= Service::all();
	$repairs 	= RepairService::all();
	$mainpages  = PageContent::all();
	$footers    = FooterContent::all();
    return view('Frontend.index',compact('sliders','services','repairs','mainpages','footers'));
});

//Page Controller

Route::get('booking-form/{modelID}/{IssueID}','App\Http\Controllers\BookingController@index')->name('booking');
Route::get('booking-form','App\Http\Controllers\BookingController@bookingForm')->name('booking_form');
Route::post('savebooking','App\Http\Controllers\BookingController@saveBooking')->name('savebooking');
Route::post('/booking-form','App\Http\Controllers\BookingController@index')->name('bookingform');
Route::get('storelocator','App\Http\Controllers\StoreLocatorController@index')->name('storelocator');

Route::get('all_models','App\Http\Controllers\AllDeviceModelController@index')->name('all_models');

Route::get('Apple_Device','App\Http\Controllers\AppleDeviceController@AppleDevice')->name('apple_device');
Route::get('Samsung_Device','App\Http\Controllers\SamsungDeviceController@Samsung')->name('samsung_device');
Route::get('Htc_Device','App\Http\Controllers\HTCController@HTC')->name('htc_device');
Route::get('Sony_Device','App\Http\Controllers\SonyDeviceController@Sony')->name('sony_device');
Route::get('LG_Device','App\Http\Controllers\LGDeviceController@index')->name('lg_device');
Route::get('Huawei_Device','App\Http\Controllers\HuaweiDeviceController@Huawei')->name('huawei_device');
Route::get('iPhone_model','App\Http\Controllers\PhoneModelController@index')->name('phone_model');
Route::get('other_device','App\Http\Controllers\OtherDeviceController@index')->name('other_device');
Route::get('OnePlus_device','App\Http\Controllers\OtherDeviceController@oneplus')->name('oneplus_device');
Route::get('Vivo_device','App\Http\Controllers\OtherDeviceController@vivo')->name('vivo_device');
Route::get('Asus_device','App\Http\Controllers\OtherDeviceController@asus')->name('asus_device');
Route::get('Oppo_device','App\Http\Controllers\OtherDeviceController@oppo')->name('oppo_device');
Route::get('Nokia_device','App\Http\Controllers\OtherDeviceController@nokia')->name('nokia_device');
Route::get('Xiaomi_device','App\Http\Controllers\OtherDeviceController@xiaomi')->name('xiaomi_device');
Route::get('Google_device','App\Http\Controllers\OtherDeviceController@google')->name('google_device');
Route::get('BlackBerry_device','App\Http\Controllers\OtherDeviceController@blackberry')->name('blackberry_device');
Route::get('Motorola_device','App\Http\Controllers\OtherDeviceController@motorola')->name('motorola_device');
Route::get('Samsung_Tablets','App\Http\Controllers\OtherDeviceController@samsungTab')->name('samsungtab_device');
Route::get('Microsoft_device','App\Http\Controllers\OtherDeviceController@microsoft')->name('microsoft_device');
Route::get('Zte_device','App\Http\Controllers\OtherDeviceController@zte')->name('zte_device');
Route::get('macbook','App\Http\Controllers\OtherDeviceController@macbook')->name('macbook');
Route::get('device_issues','App\Http\Controllers\DeviceIssuesController@index')->name('all_device');
Route::get('device_issues/{id}','App\Http\Controllers\DeviceIssuesController@index')->name('all_device_issues');

//Contact //Route

Route::post('saveuser','App\Http\Controllers\ContactController@saveUser')->name('saveuser');


//Issue Import

Route::post('issue-import','App\Http\Controllers\IssueImageController@Issueimport')->name('issue_import');


//Issue Page Image Route //Admin Route

Route::get('admin/addIssuePageImage','App\Http\Controllers\IssuePageImageController@index')->name('issuepageimage');
Route::post('saveissueimage','App\Http\Controllers\IssuePageImageController@addIssueImage')->name('saveissueimage');
Route::post('editissueimage/{id}','App\Http\Controllers\IssuePageImageController@editIssueImage')->name('editissueimage');
Route::get('deleteissueimage/{id}','App\Http\Controllers\IssuePageImageController@deleteIssueImage')->name('deleteissueimage');

//Admin Route

Route::get('admin/dashboard','App\Http\Controllers\AdminController@index')->name('dashboard')->middleware('auth');
Route::get('logout','App\Http\Controllers\AdminController@logout')->name('admin_logout');
//Admin Route // Services Route

Route::get('admin/services','App\Http\Controllers\ServicesController@index')->name('services');
Route::post('saveservice','App\Http\Controllers\ServicesController@addService')->name('saveservice');
Route::post('editservice/{id}','App\Http\Controllers\ServicesController@editService')->name('editservice');
Route::get('deleteservice/{id}','App\Http\Controllers\ServicesController@deleteService')->name('deleteservice');

//Admin Route // Main Page Content Route

Route::get('admin/addContent','App\Http\Controllers\MainPageContentController@index')->name('content');
Route::post('savecontent','App\Http\Controllers\MainPageContentController@addContent')->name('savecontent');
Route::post('editcontent/{id}','App\Http\Controllers\MainPageContentController@editContent')->name('editcontent');
Route::get('deletecontent/{id}','App\Http\Controllers\MainPageContentController@deleteContent')->name('deletecontent');

//Admin Route // Foote Content Route

Route::get('admin/FooterContent','App\Http\Controllers\FooterContentController@index')->name('footer');
Route::post('savefooter','App\Http\Controllers\FooterContentController@addFooter')->name('savefooter');
Route::post('editfooter/{id}','App\Http\Controllers\FooterContentController@editFooter')->name('editfooter');
Route::get('deletefooter/{id}','App\Http\Controllers\FooterContentController@deleteFooter')->name('deletefooter');

//Admin Route // Device Route

Route::get('admin/addDevice','App\Http\Controllers\DeviceController@index')->name('device');
Route::post('savedevice','App\Http\Controllers\DeviceController@addDevice')->name('savedevice');
Route::post('editdevice/{id}','App\Http\Controllers\DeviceController@editDevice')->name('editdevice');
Route::get('deletedevice/{id}','App\Http\Controllers\DeviceController@deleteDevice')->name('deletedevice');

//Admin Route // Model Route

Route::get('admin/addModel','App\Http\Controllers\ModelController@index')->name('model');
Route::post('savemodel','App\Http\Controllers\ModelController@addModel')->name('savemodel');
Route::post('editmodel/{id}','App\Http\Controllers\ModelController@editModel')->name('editmodel');
Route::get('deletemodel/{id}','App\Http\Controllers\ModelController@deleteModel')->name('deletemodel');

Route::get('getSeriesModals/{seriesId}/{deviceID}','App\Http\Controllers\ModelController@getSeriesModal');


//Admin Route // Series Route

Route::get('admin/addSeries','App\Http\Controllers\SeriesController@index')->name('series');
Route::post('saveseries','App\Http\Controllers\SeriesController@addSeries')->name('saveseries');
Route::post('editseries/{id}','App\Http\Controllers\SeriesController@editSeries')->name('editseries');
Route::get('deleteseries/{id}','App\Http\Controllers\SeriesController@deleteSeries')->name('deleteseries');
Route::get('getSeriesAgainstBrand/{id}','App\Http\Controllers\SeriesController@getSeriesAgainstBrand');

//Admin Route // Slider Route

Route::get('admin/addSlider','App\Http\Controllers\HomeSliderController@index')->name('sliders');
Route::post('saveslider','App\Http\Controllers\HomeSliderController@addSlider')->name('saveslider');
Route::post('editslider/{id}','App\Http\Controllers\HomeSliderController@editSlider')->name('editslider');
Route::get('deleteslider/{id}','App\Http\Controllers\HomeSliderController@deleteSlider')->name('deleteslider');

//Admin Route //Issue Route

Route::get('admin/addIssue','App\Http\Controllers\IssueController@index')->name('issues');
Route::post('saveissue','App\Http\Controllers\IssueController@addIssue')->name('saveissue');
Route::post('editissue/{id}','App\Http\Controllers\IssueController@editIssue')->name('editissue');
Route::get('deleteissue/{id}','App\Http\Controllers\IssueController@deleteIssue')->name('deleteissue');



//Admin Route //Issue Image Route

Route::get('admin/addIssueImage','App\Http\Controllers\IssueImageController@index')->name('issuesimage');
Route::post('saveissueallimage','App\Http\Controllers\IssueImageController@addIssueImage')->name('saveissueallimage');
Route::post('editissueallimage/{id}','App\Http\Controllers\IssueImageController@editIssueImage')->name('editissueallimage');
Route::get('deleteissueallimage/{id}','App\Http\Controllers\IssueImageController@deleteIssueImage')->name('deleteissueallimage');

//Admin Route //Repair Service Route

Route::get('admin/addRepairService','App\Http\Controllers\RepairServicesController@index')->name('repair_service');
Route::post('saverepairservices','App\Http\Controllers\RepairServicesController@addRepairService')->name('saverepairservices');
Route::post('editrepairservices/{id}','App\Http\Controllers\RepairServicesController@editRepairService')->name('editrepairservices');
Route::get('deleterepairservice/{id}','App\Http\Controllers\RepairServicesController@deleteRepairService')->name('deleterepairservice');

//Admin Route // Store Route

Route::get('admin/addStore','App\Http\Controllers\StoreDetailsController@index')->name('store');
Route::post('savestore','App\Http\Controllers\StoreDetailsController@addStore')->name('savestore');
Route::post('editstore/{id}','App\Http\Controllers\StoreDetailsController@editStore')->name('editstore');
Route::get('deletestore/{id}','App\Http\Controllers\StoreDetailsController@deleteStore')->name('deletestore');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//store search

Route::post('store/search/', 'App\Http\Controllers\BookingController@search')->name('store.search');

