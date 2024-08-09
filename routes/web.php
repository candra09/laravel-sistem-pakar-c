<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
	DashboardController,
	DiagnosaController,
	RiwayatController,
    HomeController,
    HomeUserController,
    UserController,
    PenyakitController,
    GejalaController,
    RuleController,
    ArtikelPenyakitController


};
use Barryvdh\DomPDF\Facade\Pdf as PDF;


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

// Route::get('', function () {
//     return view('welcome');

// });



Route::redirect('/', '/login');


Route::get('/test-pdf', [DiagnosaController::class, 'testPDF']);


Route::group([
	'middleware' => 'auth',
	'prefix' => 'panel',
	'as' => 'admin.'
], function(){

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::get('/user', [HomeUserController::class, 'home'])->name('user');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //diagnosa
    Route::get('diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::post('diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa');

    // logs
	Route::get('/logs', [DashboardController::class, 'activity_logs'])->name('logs');
	Route::post('/logs/delete', [DashboardController::class, 'delete_logs'])->name('logs.delete');

    // menu riwayat
	Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.daftar');
	Route::get('/riwayat/detail/{riwayat}', [RiwayatController::class, 'show'])->name('riwayat');

    // Member menu
	Route::get('/member', [UserController::class, 'index'])->name('member');
	Route::get('/member/create', [UserController::class, 'create'])->name('member.create');
	Route::post('/member/create', [UserController::class, 'store'])->name('member.store');
	Route::get('/member/{id}/edit', [UserController::class, 'edit'])->name('member.edit');
	Route::post('/member/{id}/update', [UserController::class, 'update'])->name('member.update');
	Route::delete('/member/{id}/delete', [UserController::class, 'destroy'])->name('member.delete');

	// menu penyakit
	Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit');
	Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
	Route::get('/penyakit/json', [PenyakitController::class, 'json'])->name('penyakit.json');
	Route::post('/penyakit/update', [PenyakitController::class, 'update'])->name('penyakit.update');
	Route::delete('/penyakit/{penyakit}/destroy', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

    // menu gejala
	Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala');
	Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
	Route::get('/gejala/json', [GejalaController::class, 'json'])->name('gejala.json');
	Route::post('/gejala/update', [GejalaController::class, 'update'])->name('gejala.update');
	Route::post('/gejala/{gejala}/destroy', [GejalaController::class, 'destroy'])->name('gejala.destroy');

    // menu rules
    Route::get('/rules/{id}', [RuleController::class, 'index'])->name('rules');
    Route::post('/rules/{id}/update', [RuleController::class, 'update'])->name('rules.update');

    // Profile menu
	Route::view('/profile', 'admin.profile')->name('admin.profile');
	Route::post('/profile', [DashboardController::class, 'profile_update'])->name('profile');
	Route::post('/profile/upload', [DashboardController::class, 'upload_avatar'])
		->name('profile.upload');


    Route::get('/penyakit-gerd', [ArtikelPenyakitController::class, 'gerd'])->name('gerd');
    Route::get('/penyakit-dispepsia', [ArtikelPenyakitController::class, 'dispepsia'])->name('dispepsia');
    Route::get('/penyakit-tukak-lambung', [ArtikelPenyakitController::class, 'tukak_lambung'])->name('tukak_lambung');
    Route::get('/penyakit-maag', [ArtikelPenyakitController::class, 'maag'])->name('maag');


});

require __DIR__.'/auth.php';

// Auth::routes();

// Route testing untuk PDF
// Route::get('/test-pdf', function () {
//     $pdf = PDF::loadView('pdf.test');
//     return $pdf->download('test.pdf');
// });


