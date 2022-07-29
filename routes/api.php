<?php

//AUTH
use App\Http\Controllers\AuthController;

//PROFIL
use App\Http\Controllers\ProfilPageController;

//USERS
use App\Http\Controllers\UserController;

//SKILLS
use App\Http\Controllers\SkillController;

//USERSKILLS
use App\Http\Controllers\UserSkillController;

//EVENTS
use App\Http\Controllers\EventController;

//USERS ROLES EVENTS
use App\Http\Controllers\UserRoleEventController;

//ROLES
use App\Http\Controllers\RoleController;

//ROOMS
use App\Http\Controllers\RoomController;

//RUNNING ORDERS
use App\Http\Controllers\RunningOrderController;

//TEAMS
use App\Http\Controllers\TeamController;

//USERS TEAMS
use App\Http\Controllers\UserTeamController;

//TEAMS ROOMS
use App\Http\Controllers\TeamRoomController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/admin/newusers', [AuthController::class, 'register']);
Route::post('/loginevent/{id}', [AuthController::class, 'loginevent']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//PAGE PROFIL
Route::middleware('auth:sanctum')->put('/profiles', [ProfilPageController::class, 'update'])->name('profiles.update');
Route::get('/profiles/{id}', [ProfilPageController::class, 'show'])->name('profiles.show');
Route::middleware('auth:sanctum')->get('/profiles', [ProfilPageController::class, 'showOwn'])->name('profiles.showOwn');

// USERS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'user'])->name('users.user');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/newusers/{id}', [UserController::class, 'store']);
Route::post('/users', [UserController::class, 'userCreatedByAdmin']);
Route::delete('/users/{id?}', [UserController::class, 'destroy'])->name('users.destroy.id');

// SKILLS
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');

// USER_SKILLS
Route::get('/usersskills', [UserSkillController::class, 'index'])->name('userskills.index');

// EVENTS

Route::middleware('auth:sanctum')->get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/homeevent', [EventController::class, 'index'])->name('homeevent.index');
Route::post('/event', [EventController::class, 'store'])->name('event.store');
Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy.id');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');


// URE
Route::get('/users_roles_events', [UserRoleEventController::class, 'index'])->name('users_roles_events.index');

// ROLES
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// TEAMS

Route::get('/teamslist', [TeamController::class, 'index'])->name('teamslist.index');
Route::post('/teamslist', [TeamController::class, 'store'])->name('teamslist.store');
Route::delete('/teamslist/{id?}', [TeamController::class, 'destroy'])->name('teamslist.destroy.id');
Route::get('/teamslist/{id}', [TeamController::class, 'show']);


// User teams
Route::get('/usersteams', [UserTeamController::class, 'index'])->name('usersteams.index');
Route::post('/usersteams', [UserTeamController::class, 'store'])->name('usersteams.store');

// TEAMS ROOMS
Route::get('/teamsrooms', [TeamRoomController::class, 'index'])->name('teamsrooms.index');

// ROOMS
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

// RUNNING ORDERS
Route::get('/ro', [RunningOrderController::class, 'index'])->name('ro.index');
Route::post('/ro', [RunningOrderController::class, 'store'])->name('ro.store');
