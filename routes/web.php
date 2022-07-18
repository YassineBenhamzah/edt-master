<?php
use app\Mail\MyTestMail;
use App\Http\Controllers\AppeloffreController;
use App\Http\Controllers\AppeloffresController;
use App\Http\Controllers\CautionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemcongController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\LaborcostController;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});


Auth::routes([

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//client
Route::get('/clients', [ClientController::class , 'index'])->name('clients.index');
Route::get('/clients/{client}/edit', [ClientController::class , 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class , 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class , 'destroy'])->name('clients.destroy');
Route::get('/clients/create', [ClientController::class , 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class , 'store'])->name('clients.store');
//contact
Route::get('/contacts', [ContactController::class , 'index'])->name('contacts.index');
Route::get('/contacts/{contact}/edit', [ContactController::class , 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class , 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class , 'destroy'])->name('contacts.destroy');
Route::get('/contacts/create', [ContactController::class , 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class , 'store'])->name('contacts.store');
//cautions
Route::get('/cautions', [CautionController::class , 'index'])->name('cautions.index');
Route::get('/cautions/{caution}/edit', [CautionController::class , 'edit'])->name('cautions.edit');
Route::put('/cautions/{caution}', [CautionController::class , 'update'])->name('cautions.update');
Route::delete('/cautions/{caution}', [CautionController::class , 'destroy'])->name('cautions.destroy');
Route::get('/cautions/create', [CautionController::class , 'create'])->name('cautions.create');
Route::post('/cautions', [CautionController::class , 'store'])->name('cautions.store');
//appeloffres
Route::get('/appeloffres', [AppeloffreController::class , 'index'])->name('appeloffres.index');
Route::get('/appeloffres/{appeloffre}/edit', [AppeloffreController::class , 'edit'])->name('appeloffres.edit');
Route::put('/appeloffres/{appeloffre}', [AppeloffreController::class , 'update'])->name('appeloffres.update');
Route::delete('/appeloffres/{appeloffre}', [AppeloffreController::class , 'destroy'])->name('appeloffres.destroy');
Route::get('/appeloffres/create', [AppeloffreController::class , 'create'])->name('appeloffres.create');
Route::post('/appeloffres', [AppeloffreController::class , 'store'])->name('appeloffres.store');
//projets
Route::get('/projets', [ProjetController::class , 'index'])->name('projets.index');
Route::get('/projets/{projet}/edit', [ProjetController::class , 'edit'])->name('projets.edit');
Route::put('/projets/{projet}', [ProjetController::class , 'update'])->name('projets.update');
Route::delete('/projets/{projet}', [ProjetController::class , 'destroy'])->name('projets.destroy');
Route::get('/projets/create', [ProjetController::class , 'create'])->name('projets.create');
Route::post('/projets', [ProjetController::class , 'store'])->name('projets.store');
Route::match(["Get" , "post"] ,"searchClient",[ProjetController::class , 'SearchClientt'])->name('searchClient');
//Route::match(["Get" , "post"] ,"SearchClient",[DemcongController::class , 'SearchClient'])->name('SearchClient');
//laborcost
Route::get('/laborcosts', [LaborcostController::class , 'index'])->name('laborcosts.index');
Route::get('/laborcosts/{laborcost}/edit', [LaborcostController::class , 'edit'])->name('laborcosts.edit');
Route::put('/laborcosts/{laborcost}', [LaborcostController::class , 'update'])->name('laborcosts.update');
Route::delete('/laborcosts/{laborcost}', [LaborcostController::class , 'destroy'])->name('laborcosts.destroy');
Route::get('/laborcosts/create', [LaborcostController::class , 'create'])->name('laborcosts.create');
Route::post('/laborcosts', [LaborcostController::class , 'store'])->name('laborcosts.store');

//phase
Route::get('/phase' , [PhaseController::class , 'index'])->name('phases.index');
Route::get('/phase/create', [PhaseController::class , 'create'])->name('phases.create');
Route::post('/phases', [PhaseController::class , 'store'])->name('phases.store');
Route::get('/phases/{phase}/edit', [PhaseController::class , 'edit'])->name('phases.edit');
Route::put('/phases/{phase}', [PhaseController::class , 'update'])->name('phases.update');
Route::delete('/phases/{phase}', [PhaseController::class , 'destroy'])->name('phases.destroy');

});

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Codingspoint.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('nemoty.ney2018@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});

//tasks
Route::get('/tasks', [TaskController::class , 'index'])->name('tasks.index');
Route::get('/tasks/{task}/edit', [TaskController::class , 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class , 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class , 'destroy'])->name('tasks.destroy');
Route::get('/tasks/create', [TaskController::class , 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class , 'store'])->name('tasks.store');
//route::get('/get-projets' , [TaskController::class , 'getprojet'])->name('getprojet');
//route::post('/get-client' , [TaskController::class , 'getclient'] )->name('getclient');
//Route::get("/SearchTask",[TaskController::class , 'searchTask'])->name('Search_Task');
Route::post('/SearchTask' , [TaskController::class , 'searchTask'])->name('Search_Task');
Route::get('/getproject/{id}',[TaskController::class, 'getproject']);

//congé
Route::get('/conges', [DemcongController::class , 'index'])->name('conges.index');
Route::get('/conges/{demcong}/edit', [DemcongController::class , 'edit'])->name('conges.edit');
Route::put('/conges/{demcong}', [DemcongController::class , 'update'])->name('conges.update');
Route::delete('/conges/{demcong}', [DemcongController::class , 'destroy'])->name('conges.destroy');
Route::get('/conges/create', [DemcongController::class , 'create'])->name('conges.create');
Route::post('/conges', [DemcongController::class , 'store'])->name('conges.store');
Route::match(["Get" , "post"] ,"SearchUser",[DemcongController::class , 'SearchUser'])->name('SearchUser');





