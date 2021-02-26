<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager_module\appointmentsController;
use App\Http\Controllers\manager_module\callsController;
use App\Http\Controllers\manager_module\clientsController;
use App\Http\Controllers\manager_module\companyController;
use App\Http\Controllers\manager_module\managersController;
use App\Http\Controllers\manager_module\notesController;
use App\Http\Controllers\manager_module\proposalsController;
use App\Http\Controllers\manager_module\servicesController;
use App\Http\Controllers\manager_module\accessController;
use App\Http\Controllers\manager_module\chatController;
use App\Http\Controllers\manager_module\transactionController;

use App\Http\Controllers\clientUser\loginController;
use App\Http\Controllers\clientUser\logoutController;
use App\Http\Controllers\clientUser\registrationController;
use App\Http\Controllers\clientUser\homeController;
use App\Http\Controllers\clientUser\profileController;
use App\Http\Controllers\clientUser\companyController1;
use App\Http\Controllers\clientUser\companylistController;
use App\Http\Controllers\clientUser\proposalController;
use App\Http\Controllers\clientUser\serviceController;
use App\Http\Controllers\clientUser\chatController1;
use App\Http\Controllers\clientUser\ApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[accessController::class, 'showData']);

Route::get('/manager/login', [accessController::class, 'showLoginPage']);
Route::post('/manager/login', [accessController::class, 'loginVerification']);
Route::get('/manager/signout', [accessController::class, 'showSignOutPage']);
Route::get('/manager/signup', [accessController::class, 'showSignUpPage']);
Route::post('/manager/signup', [accessController::class, 'storeManager']);
Route::get('/manager/forgot-password', [accessController::class, 'showForgotPasswordPage']);
Route::post('/manager/forgot-password', [accessController::class, 'validateEmail']);
Route::get('/manager/verify-code', [accessController::class, 'showVerifyCodePage']);
Route::post('/manager/verify-code', [accessController::class, 'verifyCode']);
Route::get('/manager/reset-password', [accessController::class, 'showResetPasswordPage']);
Route::post('/manager/reset-password', [accessController::class, 'changePassword']);

Route::group(['middleware'=>['sess','statuscheck']], function () {
    Route::get('/manager-dashboard', [managersController::class, 'index']);
    Route::get('/manager/clients', [clientsController::class, 'index']);
    Route::post('/clients/add-client', [clientsController::class, 'insertClient']);
    Route::get('/manager/company', [companyController::class, 'index']);
    Route::get('/manager/company/edit/{id}', [companyController::class, 'editCompany']);
    Route::post('/manager/company/update/{id}', [companyController::class, 'updateCompany']);
    Route::get('/manager/services', [servicesController::class, 'index']);

    Route::get('/manager/chat', [chatController::class, 'index']);
    Route::get('/manager/chat/{client_id}', [chatController::class, 'showClientChat']);
    Route::post('/manager/chat/searchUser', [chatController::class, 'getUser']);
    Route::post('/manager/chat/send-message', [chatController::class, 'sendMessage']);
    Route::post('/manager/chat/get-chat', [chatController::class, 'getChat']);

    Route::get('/manager/profile', [managersController::class, 'showProfile']);
    Route::get('/manager/profile/{id}/edit', [managersController::class, 'showProfileEdit']);
    Route::post('/manager/profile/edit', [managersController::class, 'updateProfile']);
    Route::get('/manager/show-client/{id}', [clientsController::class, 'showClient']);
    Route::get('/manager/show-client/{id}/edit', [clientsController::class, 'showClientProfileEdit']);
    Route::get('/manager/profile/{id}/delete', [clientsController::class, 'deleteClientProfile']);
    Route::get('/manager/show-client/{id}/calls', [clientsController::class, 'showClientCall']);
    Route::get('/manager/show-client/{id}/appointments', [clientsController::class, 'showClientAppointment']);
    Route::get('/manager/show-client/{id}/notes', [clientsController::class, 'showClientNote']);
    Route::get('/manager/show-client/{id}/proposals', [clientsController::class, 'showClientProposal']);

    Route::post('/manager/upload-profile-pic', [managersController::class, 'uploadProfilePic']);

    Route::get('/clients/get-report', [clientsController::class, 'getReportData']);

    Route::post('/clients/profile/edit/{client_id}', [clientsController::class, 'udpateClient']);
    
    Route::post('/clients/{client_id}/calls/add-call', [callsController::class, 'insertCall']);
    Route::post('/client/{client_id}/calls/edit/{call_id}', [callsController::class, 'updateCall']);
    Route::get('/clients/{client_id}/calls/delete/{call_id}', [callsController::class, 'deleteCall']);

    Route::post('/clients/{client_id}/appointment/add-appointment', [appointmentsController::class, 'insertAppointment']);
    Route::post('/clients/{client_id}/appointments/edit/{appointment_id}', [appointmentsController::class, 'updateAppointment']);
    Route::get('/clients/{client_id}/appointments/delete/{appointment_id}', [appointmentsController::class, 'deleteAppointment']);

    Route::post('/clients/{client_id}/notes/add-note', [notesController::class, 'insertNote']);
    Route::post('/clients/{client_id}/notes/edit/{note_id}', [notesController::class, 'updateNote']);
    Route::get('/clients/{client_id}/notes/delete/{note_id}', [notesController::class, 'deleteNote']);

    Route::post('/clients/{client_id}/proposals/add-proposal', [proposalsController::class, 'insertProposal']);
    Route::post('/clients/{client_id}/proposals/edit/{proposal_id}', [proposalsController::class, 'updateProposal']);
    Route::get('/clients/{client_id}/proposals/delete/{proposal_id}', [proposalsController::class, 'deleteProposal']);
    Route::get('/clients/{client_id}/proposals/{proposal_id}', [proposalsController::class, 'showProposalPDF']);
    

    Route::post('/services/add-service', [servicesController::class, 'insertService']);
    Route::post('/services/update/{id}', [servicesController::class, 'updateService']);
    Route::get('/services/delete/{id}', [servicesController::class, 'deleteService']);

    Route::get('/manager/transaction', [transactionController::class, 'index']);
    Route::post('/transaction/send', [transactionController::class, 'sendMoney']);

});
Route::post('/transaction/getValidData', [transactionController::class, 'getValidData']);

//Client Modules
Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'verify']);
Route::get('/logout', [logoutController::class, 'index'])->name('logout.index');

Route::get('/registration', [registrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [registrationController::class, 'create']);

Route::group(['middleware' => ['session']], function () {
    Route::get('/home', [homeController::class, 'index'])->name('home.index');

    //profile routes
    Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [profileController::class, 'edit'])->name('profile.edit.index');
    Route::post('/profile/edit', [profileController::class, 'update']);
    //end of profile routes

    //affiliated company routes
    Route::get('/company', [companyController1::class, 'index'])->name('company.index');
    Route::get('/company/{id}',  [companyController1::class, 'lifecycle'])->name('company.lifecycle');
    Route::get('/company/{id}/services',  [companyController1::class, 'service'])->name('company.service');

    Route::get('/company/{id}/proposals',  [companyController1::class, 'proposal'])->name('company.proposal');
    Route::get('/company/{id}/proposals/optup/{id2}',  [companyController1::class, 'optUpProposal'])->name('company.proposal.optup');
    Route::get('/company/{id}/proposals/approve/{id2}',  [companyController1::class, 'approveProposal'])->name('company.proposal.approve');

    Route::post('/company/{id}/notes',  [companyController1::class, 'createNote'])->name('company.note.create');
    Route::get('/company/{id}/notes',  [companyController1::class, 'readNote'])->name('company.note');
    Route::put('/company/{id}/notes/{id2}',  [companyController1::class, 'updateNote'])->name('company.note.update');;
    Route::get('/company/{id}/notes/delete/{id2}',  [companyController1::class, 'deleteNote'])->name('company.note.delete');

    Route::post('/company/{id}/appointments',  [companyController1::class, 'createAppointment'])->name('company.appointment.create');
    Route::get('/company/{id}/appointments',  [companyController1::class, 'readAppointment'])->name('company.appointment');
    Route::put('/company/{id}/appointments/{id2}',  [companyController1::class, 'updateAppointment'])->name('company.appointment.update');
    Route::get('/company/{id}/appointments/delete/{id2}',  [companyController1::class, 'deleteAppointment'])->name('company.appointment.delete');
    //end of affiliated company routes


    //companylist routes
    Route::get('/companylist', [companylistController::class, 'index'])->name('companylist.index');
    Route::get('/companylist/{id}',  [companylistController::class, 'lifecycle'])->name('companylist.lifecycle');
    Route::get('/companylist/{id}/services',  [companylistController::class, 'service'])->name('companylist.service');
    Route::get('/companylist/{id}/proposals',  [companylistController::class, 'proposal'])->name('companylist.proposal');
    Route::get('/companylist/{id}/proposals/optup/{id2}',  [companylistController::class, 'optUpProposal'])->name('companylist.proposal.optup');
    Route::get('/companylist/{id}/proposals/approve/{id2}',  [companylistController::class, 'approveProposal'])->name('companylist.proposal.approve');
    //end of companylist routes


    //proposal routes
    Route::get('/proposal', [proposalController::class, 'index'])->name('proposal.index');
    Route::get('/proposal/optup/{id}',  [proposalController::class, 'optUpProposal'])->name('proposal.optup');
    Route::get('/proposal/approve/{id}',  [proposalController::class, 'approveProposal'])->name('proposal.approve');
    //end of proposal routes


    //service routes
    Route::get('/service', [serviceController::class, 'index'])->name('service.index');
    //end of service routes


    //chat routes
    // Route::get('/chat', [chatController::class, 'index'])->name('chat.index');
    //end of chat routes


    Route::get('/chat', [chatController1::class, 'index']);
    Route::get('/chat/{id}', [chatController1::class, 'showManagerChat']);
    Route::post('/chat/searchUser', [chatController1::class, 'getUser']);
    Route::post('/chat/send-message', [chatController1::class, 'sendMessage']);
    Route::post('/chat/get-chat', [chatController1::class, 'getChat']);


    //transaction routes
    Route::get('transaction', [ApiController::class, 'getAllTransactions'])->name('transaction');
    Route::post('transaction', [ApiController::class, 'createTransaction']);
    Route::get('transaction/check', [ApiController::class, 'viewTransaction']);
    //end of transaction routes

    Route::get('conversation/{userId}',  [chatController::class, 'conversation'])->name('message.conversation');
    Route::post('send-message', [chatController::class, 'sendMessage'])->name('message.send-message');
});
