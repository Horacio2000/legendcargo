<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BranchManagerController;
use App\Http\Controllers\Admin\CourierTypeController;
use App\Http\Controllers\Admin\FrontendSettingController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Manager\PasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\BranchStaffController;
use App\Http\Controllers\Manager\CourierInfoController;
use App\Http\Controllers\Manager\CompanyPaymentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CacheRemover;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;

Route::get('/', function () {
    return view('home');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');


Route::group(['middleware' => CacheRemover::class], function () {
    Route::prefix('admin')->group(function () {

        Route::middleware(['CheckLogin'])->group(function () {

            Route::get('/', function () {
                return view('admin/login');
            })->name('admin');

            Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
        });

        Route::middleware([CheckAdmin::class])->group(function () {

            Route::post('logout', function () {
                Auth::guard('admin')->logout();
                return redirect('admin');
            });

            /*
             * Authorise route list
             */
            //change password route
            Route::get('changePassword', [AdminController::class, 'changePassword'])->name('changepassform');
            Route::put('changePassword', [AdminController::class, 'updatePassword'])->name('changepassssubmit');
            //profile route
            Route::get('profile', [AdminController::class, 'profileView'])->name('admin.profile');
            Route::put('profile', [AdminController::class, 'updateProfile']);
            //basic setting route list
            Route::get('basicSetting', [GeneralSettingController::class, 'basicSetting'])->name('admin.basicSetting');
            Route::put('basicSetting/{basicSetting}', [GeneralSettingController::class, 'updateBasicSetting'])->name('admin.basicSettingUpdate');
            //sms setting route list
            Route::get('smsSetting', [GeneralSettingController::class, 'smsSetting'])->name('admin.smsSetting');
            Route::put('smsSetting/{smsSetting}', [GeneralSettingController::class, 'updateSmsSetting'])->name('admin.smsSettingUpdate');
            //email setting route list
            Route::get('emailSetting', [GeneralSettingController::class, 'emailSetting'])->name('admin.emailSetting');
            Route::put('emailSetting/{emailSetting}', [GeneralSettingController::class, 'updateEmailSetting'])->name('admin.emailSettingUpdate');

            //courier unit info route list
            Route::resource('courier/unit', UnitController::class);
            //courier type info route list
            Route::resource('courier/type', CourierTypeController::class);

            //Branch Info
            Route::resource('branch', BranchController::class);

            //Branch Manager Info & staff view route
            Route::resource('branchmanager', BranchManagerController::class);
            Route::post('branchmanager/changepassword', [BranchManagerController::class, 'changePassword'])->name('branchmanager.changepassword');
            Route::get('staff/{branch}', [UserController::class, 'allUserList'])->name('admin.branch.staff');

            //dashboard
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

            //company income route
            Route::get('company/income', [BranchManagerController::class, 'companyIncome'])->name('admin.company.income');

            //branch wise company income route
            Route::get('branch/income/{branch}', [BranchManagerController::class, 'branchIncome'])->name('admin.branch.income');
            Route::get('branch/income/{branch}/{date}', [BranchManagerController::class, 'dateWiseBranchIncome'])->name('admin.branch.income.date');
            Route::get('staff/branch/income/{branch}/{staff}', [BranchManagerController::class, 'staffWiseBranchIncome'])->name('admin.branch.income.staff');

            //frontend setting route list
        });

    });

    Auth::routes();

    // Authentication Routes...
// Authentication Routes...
// MANAGER



Route::group(['prefix' => 'manager', 'namespace' => 'App\Http\Controllers\Manager'], function () {
    Route::post('password/reset', [PasswordResetController::class, 'sendResetLink'])->name('manager.password.reset');
    Route::get('password/reset/{token}', [PasswordResetController::class, 'resetLink'])->name('password.token');
    Route::put('password/change', [PasswordResetController::class, 'passwordReset'])->name('password.change');
    Route::get('/', function () {
        return view('manager/login');
    })->name('manager');
    Route::post('authenticate', [App\Http\Controllers\Manager\LoginController::class, 'authenticate'])->name('manager.authenticate');
});


Route::group(['middleware' => 'manager', 'prefix' => 'manager', 'namespace' => 'App\Http\Controllers\Manager'], function () {

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Manager\HomeController::class, 'index'])->name('manager.dashboard');

    // User profile & credentials routes
    Route::get('profile', [ManagerController::class, 'profileView'])->name('manager.profile');
    Route::put('profile', [ManagerController::class, 'updateProfile']);

    // All branch list route
    Route::get('branch/list', [ManagerController::class, 'branchList'])->name('manager.branchlist');

    // All branch staff route list
    Route::resource('branchstaff', BranchStaffController::class);
    Route::post('branchstaff/changepassword', [BranchStaffController::class, 'changePassword'])->name('branchstaff.changepassword');

    // Departure & Upcoming courier info route list
    Route::get('departure/courier', [CourierInfoController::class, 'departureBranchCourierList'])->name('departure.manager');
    Route::get('upcoming/courier', [CourierInfoController::class, 'upcomingBranchCourierList'])->name('upcoming.manager');
    Route::get('departure/invoice/{courierInfo}', [App\Http\Controllers\Manager\CourierInfoController::class, 'courierInvoice'])->name('manager.departure.invoice');
    Route::get('upcoming/invoice/{courierInfo}', [App\Http\Controllers\Manager\CourierInfoController::class, 'upcomingCourierInvoice'])->name('manager.upcoming.invoice');

    // Print slip route list
    Route::get('courier/slip/{id}', [CourierInfoController::class, 'printSlipView'])->name('manager.courier.slip');
    Route::put('courier/payment/staff', [App\Http\Controllers\Manager\CourierInfoController::class, 'paidCourier'])->name('courier.payment.manager');

    // Branch income route
    Route::get('branch/income', [CompanyPaymentController::class, 'branchWiseIncome'])->name('manager.branch.income');
    Route::get('branch/income/date/{date}', [CompanyPaymentController::class, 'dateWiseBranchIncome'])->name('manager.branch.income.date');
    Route::get('branch/income/staff/{staff}', [CompanyPaymentController::class, 'staffWiseBranchIncome'])->name('manager.branch.income.staff');

    // Change password route
    Route::get('changePassword', [ManagerController::class, 'changePassword'])->name('manager.changepassword');
    Route::put('changePassword', [ManagerController::class, 'updatePassword']);
});

// STAFF
Route::group(['prefix' => 'staff', 'namespace' => 'App\Http\Controllers\Staff'], function () {

    Route::get('/', function () {
        return view('staff/login');
    })->name('staff');
    Route::post('authenticate', [App\Http\Controllers\Staff\LoginController::class, 'authenticate'])->name('staff.authenticate');

    Route::get('password/request', [App\Http\Controllers\Staff\PasswordResetController::class, 'showLinkRequestForm'])->name('staff.password.request.form');
    Route::post('password/reset', [App\Http\Controllers\Staff\PasswordResetController::class, 'sendResetLink'])->name('staff.password.reset');
    Route::get('password/reset/{token}', [App\Http\Controllers\Staff\PasswordResetController::class, 'resetLink'])->name('staff.password.token');
    Route::put('password/change', [App\Http\Controllers\Staff\PasswordResetController::class, 'passwordReset'])->name('staff.password.change');

    Route::group(['middleware' => 'staff'], function () {

        Route::post('logout', [App\Http\Controllers\Staff\LoginController::class, 'logout'])->name('staff.logout');
        //staff dashboard
        Route::get('dashboard', [App\Http\Controllers\Staff\StaffController::class, 'dashboard'])->name('staff.dashboard');

        //user profile & credentials routes
        Route::get('profile', [App\Http\Controllers\Staff\StaffController::class, 'profileView'])->name('staff.profile');
        Route::put('profile', [App\Http\Controllers\Staff\StaffController::class, 'updateProfile']);

        //branch list
        Route::get('branch/list', [App\Http\Controllers\Staff\StaffController::class, 'branchList'])->name('staff.branchlist');

        Route::get('courier/{courierInfo}/edit', [App\Http\Controllers\Staff\CourierInfoController::class, 'edit']);

        //courier info route list
        Route::resource('courier', App\Http\Controllers\Staff\CourierInfoController::class);



        Route::get('courier/invoice/{courierInfo}', [App\Http\Controllers\Staff\CourierInfoController::class, 'courierInvoice'])->name('courier.invoice');
        Route::put('courier/receive/staff', [App\Http\Controllers\Staff\CourierInfoController::class, 'receiveCourier'])->name('courier.receive');
        Route::put('courier/payment/staff', [App\Http\Controllers\Staff\CourierInfoController::class, 'paidCourier'])->name('courier.payment.staff');
        //print slip route list
        Route::get('courier/slip/{id}', [App\Http\Controllers\Staff\CourierInfoController::class, 'printSlipView'])->name('staff.courier.slip');

        //search deliver courier
        Route::get('courier/deliver/search', [App\Http\Controllers\Staff\CourierInfoController::class, 'searchDeliverCourier'])->name('courier.deliver.search');
        Route::post('courier/deliver/search', [App\Http\Controllers\Staff\CourierInfoController::class, 'showDeliverCourier']);
        //send deliver notification
        Route::get('courier/deliver/notification', [App\Http\Controllers\Staff\CourierInfoController::class, 'notifyView'])->name('courier.deliver.notify');
        Route::post('courier/deliver/notification', [App\Http\Controllers\Staff\CourierInfoController::class, 'findCourier']);
        Route::post('courier/deliiver/notification/send', [App\Http\Controllers\Staff\CourierInfoController::class, 'sendNotification'])->name('send.notification.courier');
        //Cash Collection Route
        Route::get('cash/collection', [App\Http\Controllers\Staff\CourierInfoController::class, 'staffCasheCollection'])->name('staff.cashe.collection');

        //change password route
        Route::get('changePassword', [App\Http\Controllers\Staff\StaffController::class, 'changePassword'])->name('staff.changepassword');
        Route::put('changePassword', [App\Http\Controllers\Staff\StaffController::class, 'updatePassword']);
    });
});

});

// CUSTOMER

Route::middleware('auth')->group(function () {
    Route::get('/addresses', [App\Http\Controllers\HomeController::class, 'addresses'])->name('address');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('/colis', App\Http\Controllers\CourierController::class);
    Route::get('colis/invoice/{courierInfo}', [App\Http\Controllers\CourierController::class, 'courierInvoice'])->name('colis.invoice');
    Route::get('/search', [App\Http\Controllers\CourierController::class, 'search'])->name('showColis');
    Route::post('/search', [App\Http\Controllers\CourierController::class, 'search']);
    Route::get('/search-colis', [App\Http\Controllers\CourierController::class, 'searchColis'])->name('search');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
