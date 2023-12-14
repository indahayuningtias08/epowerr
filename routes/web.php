<?php
use App\Http\Controllers\TtdController;
use App\Models\ProjectID;
use App\Models\MPA2020;
use App\Models\Client;
use App\Models\Vendor;
use App\Models\Bank;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectIDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\MPA2020Controller;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::post('/login',[LoginController::class,'login_action'])->name('login.action');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('projectid', [ProjectIDController::class, 'index']);
Route::get('projectid/list', [ProjectIDController::class, 'getProjectID'])->name('projectid.list');
Route::post('projectid/list', [ProjectIDController::class, 'getProjectID'])->name('projectid.list');
Route::middleware(['auth.home'])->group(function () {

Route::get('/home',[HomeController::class,'index']);

Route::get('/tambahprojectid', [ProjectIDController::class, 'tambahprojectid'])->name('tambahprojectid')->middleware('auth');
Route::post('/simpanprojectid', [ProjectIDController::class, 'simpanprojectid'])->name('simpanprojectid')->middleware('auth');
Route::get('projectid/edit/{id}', [ProjectIDController::class, 'editprojectid'])->name('editprojectid')->middleware('auth');
Route::post('projectid/update', [ProjectIDController::class, 'updateprojectid'])->name('updateprojectid')->middleware('auth');
Route::get('/export', [ProjectIDController::class, 'export'])->name('export')->middleware('auth');
Route::get('projectid/count', function () {
    $count = ProjectID::count(); // Mengambil jumlah data dari tabel Project ID
    return response()->json(['count' => $count]);
})->name('projectid.count');

Route::get('client', [ClientController::class, 'index']);
Route::get('client/list', [ClientController::class, 'getClient'])->name('client.list');
Route::post('client/list', [ClientController::class, 'getClient'])->name('client.list');
Route::post('client/update', [ClientController::class, 'updateclient'])->name('updateclient')->middleware('auth');
Route::get('client/edit/{id}', [ClientController::class, 'editclient'])->name('editclient')->middleware('auth');
Route::get('client/hapus/{id}', [ClientController::class, 'hapusclient'])->name('hapusclient')->middleware('auth');
Route::post('/simpanclient', [ClientController::class, 'simpanclient'])->name('simpanclient')->middleware('auth');
Route::get('/tambahclient', [ClientController::class, 'tambahclient'])->name('tambahclient')->middleware('auth');
Route::get('/export', [ClientController::class, 'export'])->name('export')->middleware('auth');
Route::get('client/count', function () {
    $count = Client::count(); // Mengambil jumlah data dari tabel Client
    return response()->json(['count' => $count]);
})->name('client.count');


Route::get('vdor', [VendorController::class, 'index']);
Route::get('/tambahvdor', [VendorController::class, 'tambahvdor'])->name('tambahvdor')->middleware('auth');
Route::get('/export', [VendorController::class, 'export'])->name('export')->middleware('auth');
Route::get('vdor/list', [VendorController::class, 'getVdor'])->name('vdor.list');
Route::post('vdor/list', [VendorController::class, 'getVdor'])->name('vdor.list');
Route::post('/simpanvdor', [VendorController::class, 'simpanvdor'])->name('simpanvdor')->middleware('auth');
Route::post('vdor/update', [VendorController::class, 'updatevdor'])->name('updatevdor')->middleware('auth');
Route::get('vdor/edit/{id}', [VendorController::class, 'editvdor'])->name('editvdor')->middleware('auth');
Route::get('vdor/count', function () {
    $count = Vendor::count(); // Mengambil jumlah data dari tabel Vendor
    return response()->json(['count' => $count]);
})->name('vdor.count');


Route::get('bank', [BankController::class, 'index']);
Route::get('/tambahbank', [BankController::class, 'tambahbank'])->name('tambahbank')->middleware('auth');
Route::get('/export', [BankController::class, 'export'])->name('export')->middleware('auth');
Route::get('bank/list', [BankController::class, 'getBank'])->name('bank.list');
Route::post('bank/list', [BankController::class, 'getBank'])->name('bank.list');
Route::post('/simpanbank', [BankController::class, 'simpanbank'])->name('simpanbank')->middleware('auth');
Route::post('bank/update', [BankController::class, 'updatebank'])->name('updatebank')->middleware('auth');
Route::get('bank/edit/{id}', [BankController::class, 'editbank'])->name('editbank')->middleware('auth');
Route::get('bank/count', function () {
    $count = Bank::count(); // Mengambil jumlah data dari tabel Bank
    return response()->json(['count' => $count]);
})->name('bank.count');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::patch('/profile/{user_id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('mpa2020', [MPA2020Controller::class, 'index']);
Route::get('mpa2020/list', [MPA2020Controller::class, 'getMPA2020'])->name('mpa2020.list');
Route::get('/tambahinvoicempa2020', [MPA2020Controller::class, 'tambahinvoicempa2020'])->name('tambahinvoicempa2020')->middleware('auth');
Route::post('/simpaninvoicempa2020', [MPA2020Controller::class, 'simpaninvoicempa2020'])->name('simpaninvoicempa2020')->middleware('auth');
Route::post('/process-select', 'SelectController@processSelect')->name('processSelect');
Route::get('/export', [MPA2020Controller::class, 'export'])->name('export')->middleware('auth');
Route::get('/getDetail/{id}', 'MPA2020Controller@getDetail');
Route::post('mpa2020/update', [MPA2020Controller::class, 'updatempa2020'])->name('updatempa2020')->middleware('auth');
Route::get('mpa2020/edit/{id}', [MPA2020Controller::class, 'editmpa2020'])->name('editmpa2020')->middleware('auth');
Route::get('mpa2020/list', [MPA2020Controller::class, 'getMPA2020'])->name('mpa2020.list');
Route::post('mpa2020/list', [MPA2020Controller::class, 'getMPA2020'])->name('mpa2020.list');

Route::get('/mpa2020/print/{id}', [MPA2020Controller::class, 'printInvoice'])->name('mpa2020.print');
Route::get('/mpa2020/printttd/{id}', [MPA2020Controller::class, 'printInvoicettd'])->name('mpa2020.printttd');
Route::get('mpa2020/hapus/{id}', [MPA2020Controller::class, 'hapusmpa2020'])->name('hapusmpa2020')->middleware('auth');


});