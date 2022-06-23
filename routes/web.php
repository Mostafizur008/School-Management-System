<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Logout\LogoutController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\Profile\ProfileController;
use App\Http\Controllers\Backend\System\Dependence\CountryController;
use App\Http\Controllers\Backend\System\Dependence\DistrictController;
use App\Http\Controllers\Backend\System\Dependence\UpazilaController;
use App\Http\Controllers\Backend\System\Result\Type\TypeController;
use App\Http\Controllers\Backend\System\Result\Institution\InstitutionController;
use App\Http\Controllers\Backend\System\Result\Passing\PassingController;
use App\Http\Controllers\Backend\System\Result\Designation\DesignationController;
use App\Http\Controllers\Backend\Setup\Class\ClassController;
use App\Http\Controllers\Backend\Setup\Session\SessionController;
use App\Http\Controllers\Backend\Setup\Shift\ShiftController;
use App\Http\Controllers\Backend\Setup\Group\GroupController;
use App\Http\Controllers\Backend\Setup\Building\BuildingController;
use App\Http\Controllers\Backend\Setup\Floor\FloorController;
use App\Http\Controllers\Backend\Setup\Room\RoomController;
use App\Http\Controllers\Backend\Setup\Syllabus\SyllabusController;
use App\Http\Controllers\Backend\Setup\Subject\SubController;
use App\Http\Controllers\Backend\Exam\Exam\ExamController;
use App\Http\Controllers\Backend\Exam\ShortCode\ShortController;
use App\Http\Controllers\Backend\Exam\AssignSubject\AssignSubController;
use App\Http\Controllers\Backend\Exam\Routine\RoutineController;
use App\Http\Controllers\Backend\Exam\Marks\MarksController;
use App\Http\Controllers\Backend\Exam\Marks\GradPointMarksController;
use App\Http\Controllers\Backend\Exam\Admit\AdmitController;
use App\Http\Controllers\Backend\Library\Publisher\PublisherController;
use App\Http\Controllers\Backend\Library\Author\AuthorController;
use App\Http\Controllers\Backend\Library\Bookcategory\BookCategoryController;
use App\Http\Controllers\Backend\Library\Book\BookController;
use App\Http\Controllers\Backend\Library\Bookissue\BookIssueController;
use App\Http\Controllers\Backend\Category\FeeAmount\FeeAmountController;
use App\Http\Controllers\Backend\Category\FeeCategory\FeeCategoryController;
use App\Http\Controllers\Backend\Teacher\TeacherRegController;
use App\Http\Controllers\Backend\Teacher\Salary\TeacherSalaryController;
use App\Http\Controllers\Backend\Teacher\Salary\SalaryController;
use App\Http\Controllers\Backend\Teacher\Leave\LeaveController;
use App\Http\Controllers\Backend\Teacher\Attendance\AttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\Salary\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\Salary\EmSalaryController;
use App\Http\Controllers\Backend\Employee\Leave\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\Attendance\EmAttendanceController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\Roll\RollGenerateController;
use App\Http\Controllers\Backend\Student\Regfee\RegFeeController;
use App\Http\Controllers\Backend\Student\Monthly\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\Exam\ExamFeeController;
use App\Http\Controllers\Backend\Student\Id\IdController;
use App\Http\Controllers\Backend\Exam\Marks\MarkSheed\MarkSheedController;
use App\Http\Controllers\Backend\Student\Certificate\Testimonal\TestimonalController;
use App\Http\Controllers\Backend\Student\Certificate\Transfer\TransferController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\Setting\Head\HeadController;
use App\Http\Controllers\Backend\Account\StudentFee\StudentFeeController;
use App\Http\Controllers\Backend\Account\AccountSalary\AccountSalaryController;
use App\Http\Controllers\Backend\Account\TeacherSalary\ThSalaryController;
use App\Http\Controllers\Backend\Account\OtherCost\OtherCostController;
use App\Http\Controllers\Backend\Account\Profit\ProfiteController;



Route::get('/', function () {
    return view('auth.admin.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'Dashboard']);
});

Route::get('/register', function () {return view('backend/code-section/error/404');});

// User Logout
Route::get('/logout',[LogoutController::class,'Logout'])->name('user.logout');

// Login Admin/User
Route::get('/auth/login',[LoginController::class,'Login'])->name('auth.login');


   // Dependence Country
   Route::post('api/fetch-districts', [UserController::class, 'fetchDistrict']);
   Route::post('api/fetch-upazilas', [UserController::class, 'fetchUpazila']);

Route::group(['middleware' => 'auth'],function(){

// Role Permission
Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'App\Http\Controllers\Backend\Role\RolesController', ['names' => 'admin.roles']);
});

// User List
Route::post('/user',[UserController::class,'Store']);
Route::get('/fetch-user', [UserController::class, 'fetchuser']);
Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::put('update-user/{id}', [UserController::class, 'update']);
Route::delete('delete-user/{id}', [UserController::class, 'destroy']);

Route::prefix('users')->group(function()
{
   Route::get('/view',[UserController::class,'UserView'])->name('user.view');
   Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
   Route::post('/store',[UserController::class,'UserStore'])->name('Store');
});

// User Admin Profile
Route::prefix('profile')->group(function()
{
   Route::get('/view',[ProfileController::class,'AdminProfile'])->name('profile.view');
   Route::get('/edit',[ProfileController::class,'AdminProfileEdit'])->name('profile.edit');
   Route::post('/store',[ProfileController::class,'AdminStore'])->name('user.profile.store');
   Route::get('/change/password',[ProfileController::class,'ChPassword'])->name('change.password');
   Route::post('/change/password',[ProfileController::class,'ChPasswordUpdate'])->name('user.change.password.update');
});

// Dependence Country_Upazila_district
Route::post('/country_add',[CountryController::class,'Store']);
Route::get('/fetch-country', [CountryController::class, 'fetchcountry']);
Route::get('/edit-country/{id}', [CountryController::class, 'edit']);
Route::put('update-country/{id}', [CountryController::class, 'update']);
Route::delete('delete-country/{id}', [CountryController::class, 'destroy']);

Route::prefix('dependence')->group(function()
{
   Route::get('/country-view',[CountryController::class,'CountryView'])->name('country.view');

   // District Section
   Route::get('/district-view',[DistrictController::class,'DistrictView'])->name('district.view');
   Route::get('/district-create',[DistrictController::class,'DistrictAdd'])->name('add.district');
   Route::post('/district/store',[DistrictController::class,'DtStore'])->name('district.store');
   Route::get('/district/edit/{country_id}',[DistrictController::class,'DistrictEdit'])->name('dist.edit');
   Route::post('/district/update/{country_id}',[DistrictController::class,'DistrictUpdate'])->name('dist.update');
   Route::get('/district/detail/{id}',[DistrictController::class,'DistrictDetail'])->name('dist.detail');

   // Upazila Section
   Route::get('/upazila-view',[UpazilaController::class,'UpView'])->name('up.view');
   Route::get('/upazila-create',[UpazilaController::class,'UpAdd'])->name('add.up');
   Route::post('/store',[UpazilaController::class,'Store'])->name('up.store');
   Route::get('/upazila/edit/{id}',[UpazilaController::class,'UpEdit'])->name('up.edit');
   Route::post('/upazila/update/{id}',[UpazilaController::class,'UpUpdate'])->name('up.update');
   Route::get('/upazila/detail/{id}',[UpazilaController::class,'UpDetail'])->name('up.detail');
});

// Setup Ajax Type
Route::post('/type',[TypeController::class,'Store']);
Route::get('/fetch-type', [TypeController::class, 'fetchtype']);
Route::get('/edit-type/{id}', [TypeController::class, 'edit']);
Route::put('update-type/{id}', [TypeController::class, 'update']);
Route::delete('delete-type/{id}', [TypeController::class, 'destroy']);

// Setup Ajax Institution
Route::post('/institution',[InstitutionController::class,'Store']);
Route::get('/fetch-institution', [InstitutionController::class, 'fetchinstitution']);
Route::get('/edit-institution/{id}', [InstitutionController::class, 'edit']);
Route::put('update-institution/{id}', [InstitutionController::class, 'update']);
Route::delete('delete-institution/{id}', [InstitutionController::class, 'destroy']);

// Setup Ajax Passing Year
Route::post('/passing',[PassingController::class,'Store']);
Route::get('/fetch-passing', [PassingController::class, 'fetchpassing']);
Route::get('/edit-passing/{id}', [PassingController::class, 'edit']);
Route::put('update-passing/{id}', [PassingController::class, 'update']);
Route::delete('delete-passing/{id}', [PassingController::class, 'destroy']);

// Setup Ajax Designation
Route::post('/designation',[DesignationController::class,'Store']);
Route::get('/fetch-designation', [DesignationController::class, 'fetchdesignation']);
Route::get('/edit-designation/{id}', [DesignationController::class, 'edit']);
Route::put('update-designation/{id}', [DesignationController::class, 'update']);
Route::delete('delete-designation/{id}', [DesignationController::class, 'destroy']);

Route::prefix('system')->group(function()
{
   Route::get('/type/view',[TypeController::class,'TypeView'])->name('type.view');
   Route::get('/institution/view',[InstitutionController::class,'InstitutionView'])->name('institution.view');
   Route::get('/passing-year/view',[PassingController::class,'PassingView'])->name('passing.view');
   Route::get('/designation/view',[DesignationController::class,'DsView'])->name('ds.view');
});


// Setup Class
Route::post('/class',[ClassController::class,'Store']);
Route::get('/fetch-class', [ClassController::class, 'fetchclass']);
Route::get('/edit-class/{id}', [ClassController::class, 'edit']);
Route::put('update-class/{id}', [ClassController::class, 'update']);
Route::delete('delete-class/{id}', [ClassController::class, 'destroy']);

//Setup Session
Route::post('/session',[SessionController::class,'SessionStore']);
Route::get('/fetch-session', [SessionController::class, 'fetchsession']);
Route::get('/edit-session/{id}', [SessionController::class, 'edit']);
Route::put('update-session/{id}', [SessionController::class, 'update']);
Route::delete('delete-session/{id}', [SessionController::class, 'destroy']);

//Setup Group
Route::post('/group',[GroupController::class,'Store']);
Route::get('/fetch-group', [GroupController::class, 'fetchgroup']);
Route::get('/edit-group/{id}', [GroupController::class, 'edit']);
Route::put('update-group/{id}', [GroupController::class, 'update']);
Route::delete('delete-group/{id}', [GroupController::class, 'destroy']);

//Setup Shift
Route::post('/shift',[ShiftController::class,'Store']);
Route::get('/fetch-shift', [ShiftController::class, 'fetchshift']);
Route::get('/edit-shift/{id}', [ShiftController::class, 'edit']);
Route::put('update-shift/{id}', [ShiftController::class, 'update']);
Route::delete('delete-shift/{id}', [ShiftController::class, 'destroy']);

//Setup Subject
Route::post('/subject',[SubController::class,'Store']);
Route::get('/fetch-subject', [SubController::class, 'fetchsubject']);
Route::get('/edit-subject/{id}', [SubController::class, 'edit']);
Route::put('update-subject/{id}', [SubController::class, 'update']);
Route::delete('delete-subject/{id}', [SubController::class, 'destroy']);

//Setup Building
Route::post('/building',[BuildingController::class,'Store']);
Route::get('/fetch-building', [BuildingController::class, 'fetchbuilding']);
Route::get('/edit-building/{id}', [BuildingController::class, 'edit']);
Route::put('update-building/{id}', [BuildingController::class, 'update']);
Route::delete('delete-building/{id}', [BuildingController::class, 'destroy']);

//Setup Syllabus
Route::delete('delete-syllabus/{id}', [SyllabusController::class, 'destroy']);


Route::prefix('setup')->group(function()
{
   // Setup Class
   Route::get('/class/view',[ClassController::class,'ClassView'])->name('class.view');
   //Setup Session
   Route::get('/session/view',[SessionController::class,'YearView'])->name('session.view');
   //Setup Shift
   Route::get('/shift/view',[ShiftController::class,'ShiftView'])->name('shift.view');
   //Setup Group
   Route::get('/group/view',[GroupController::class,'GroupView'])->name('group.view');
   //Setup Subject
   Route::get('/subject/view',[SubController::class,'SubView'])->name('subject.view');

   //Setup Syallabus
   Route::get('/syllabus/view',[SyllabusController::class,'SyllabusView'])->name('syl.view');
   Route::post('/syllabus/store',[SyllabusController::class,'Store'])->name('syllabus.store');
   Route::get('/download/{$file}',[SyllabusController::class,'Download'])->name('download.view');

   //Setup Building
   Route::get('/building/view',[BuildingController::class,'BuildingView'])->name('building.view');

   //Setup Floor
   Route::get('/floor/view',[FloorController::class,'FloorView'])->name('floor.view');
   Route::get('/floor/add',[FloorController::class,'FloorAdd'])->name('floor.add');
   Route::post('/floor/store',[FloorController::class,'FloorStore'])->name('floor.store');
   Route::get('/floor/edit/{id}',[FloorController::class,'FloorEdit'])->name('floor.edit');
   Route::post('/floor/update/{id}',[FloorController::class,'FloorUpdate'])->name('floor.update');
   Route::get('/floor/detail/{id}',[FloorController::class,'FloorDetail'])->name('floor.detail');
   Route::get('/floor/getroom/{id}',[FloorController::class,'GetRoom'])->name('ajax.getroom');

   //Setup Room
   Route::get('/room/view',[RoomController::class,'RoomView'])->name('room.view');
   Route::get('/room/add',[RoomController::class,'RoomAdd'])->name('room.add');
   Route::post('/room/store',[RoomController::class,'RoomStore'])->name('room.store');
   Route::get('/room/edit/{id}',[RoomController::class,'RoomEdit'])->name('room.edit');
   Route::post('/room/update/{id}',[RoomController::class,'RoomUpdate'])->name('room.update');
   Route::get('/room/detail/{id}',[RoomController::class,'RoomDetail'])->name('room.detail');
});

//Setup Exam
Route::post('/exam',[ExamController::class,'Store']);
Route::get('/fetch-exam', [ExamController::class, 'fetchexam']);
Route::get('/edit-exam/{id}', [ExamController::class, 'edit']);
Route::put('update-exam/{id}', [ExamController::class, 'update']);
Route::delete('delete-exam/{id}', [ExamController::class, 'destroy']);

//Setup Exam Short Code
Route::post('/shortcode',[ShortController::class,'Store']);
Route::get('/fetch-shortcode', [ShortController::class, 'fetchshortcode']);
Route::get('/edit-shortcode/{id}', [ShortController::class, 'edit']);
Route::put('update-shortcode/{id}', [ShortController::class, 'update']);
Route::delete('delete-shortcode/{id}', [ShortController::class, 'destroy']);

//GradePoint
Route::post('/grade',[GradPointMarksController::class,'Store']);
Route::get('/fetch-grade', [GradPointMarksController::class, 'fetchgrade']);
Route::get('/edit-grade/{id}', [GradPointMarksController::class, 'edit']);
Route::put('update-grade/{id}', [GradPointMarksController::class, 'update']);
Route::delete('delete-grade/{id}', [GradPointMarksController::class, 'destroy']);

Route::prefix('examination')->group(function()
{
   // Exam
   Route::get('/view',[ExamController::class,'ExamView'])->name('exam.view');

   // Exam Sortcode
   Route::get('/short-code/view',[ShortController::class,'ShortView'])->name('code.view');

   // Assign Subject
   Route::get('/assign/subject/view',[AssignSubController::class,'AssignView'])->name('assign.view');
   Route::get('/assign/subject/add',[AssignSubController::class,'AssignAdd'])->name('assign.add');
   Route::post('/assign/subject/store',[AssignSubController::class,'AssignStore'])->name('assign.store');
   Route::get('/assign/subject/edit/{id}',[AssignSubController::class,'AssignEdit'])->name('assign.edit');
   Route::post('/assign/subject/update/{id}',[AssignSubController::class,'AssignUpdate'])->name('assign.update');
   Route::get('/assign/subject/detail/{id}',[AssignSubController::class,'AssignDetail'])->name('assign.detail');

   // Routine
   Route::get('/routine/view',[RoutineController::class,'RtView'])->name('routine.view');
   Route::get('/routine/add',[RoutineController::class,'RtAdd'])->name('routine.add');
   Route::post('/routine/store',[RoutineController::class,'RtStore'])->name('routine.store');
   Route::get('/routine/edit/{id}',[RoutineController::class,'RtEdit'])->name('routine.edit');
   Route::post('/routine/update/{id}',[RoutineController::class,'RtUpdate'])->name('routine.update');
   Route::get('/routine/detail/{id}',[RoutineController::class,'RtDetail'])->name('routine.detail');
   Route::get('/routine/pdf/{id}',[RoutineController::class,'RtPdf'])->name('routine.pdf');

   // Maeks Entry
   Route::get('/marks/entry',[MarksController::class,'MarksAdd'])->name('marks.entry.add');
   Route::get('/marks-get/subject',[MarksController::class,'GetSubject'])->name('marks.getsubject');
   Route::get('/student/marks-get',[MarksController::class,'GetStudents'])->name('student.marks.getstudents');
   Route::post('/marks/entry/store',[MarksController::class,'MarksStore'])->name('marks.entry.store');
   Route::get('/marks/edit',[MarksController::class,'MarksEdit'])->name('marks.edit');
   Route::get('/edit/marks/getstudent',[MarksController::class,'MarksEditGetStudents'])->name('edit.marks.getstudents');
   Route::post('/marks/update',[MarksController::class,'MarksUpdate'])->name('marks.entry.update');

   // Grade Point
   Route::get('/entry/grade',[GradPointMarksController::class,'MarksGradeView'])->name('view.grade');
   Route::get('/grade/detail',[GradPointMarksController::class,'GradeDetail'])->name('grade.detail');

   // Admit Card
   Route::get('/admit/view',[AdmitController::class,'AdmitView'])->name('admit.view');
   Route::get('/admit/get',[AdmitController::class,'AdmitGet'])->name('admit.get');
});

// Publisher
Route::post('/publisher',[PublisherController::class,'Store']);
Route::get('/fetch-publisher', [PublisherController::class, 'fetchpublisher']);
Route::get('/edit-publisher/{id}', [PublisherController::class, 'edit']);
Route::put('update-publisher/{id}', [PublisherController::class, 'update']);
Route::delete('delete-publisher/{id}', [PublisherController::class, 'destroy']);

// Author
Route::post('/author',[AuthorController::class,'Store']);
Route::get('/fetch-author', [AuthorController::class, 'fetchauthor']);
Route::get('/edit-author/{id}', [AuthorController::class, 'edit']);
Route::put('update-author/{id}', [AuthorController::class, 'update']);
Route::delete('delete-author/{id}', [AuthorController::class, 'destroy']);

// Book
Route::delete('delete-book/{id}', [BookController::class, 'destroy']);

// Book Category
Route::post('/book-category',[BookCategoryController::class,'Store']);
Route::get('/fetch-book-category', [BookCategoryController::class, 'fetchbookcategory']);
Route::get('/edit-book-category/{id}', [BookCategoryController::class, 'edit']);
Route::put('update-book-category/{id}', [BookCategoryController::class, 'update']);
Route::delete('delete-book-category/{id}', [BookCategoryController::class, 'destroy']);

// Book Issue
Route::delete('delete-issue/{id}', [BookIssueController::class, 'destroy']);

Route::prefix('library')->group(function()
{
   // Library Management
   Route::get('/publisher/view',[PublisherController::class,'PublisherView'])->name('publisher.view');
  
   //Setup Author
   Route::get('/author/view',[AuthorController::class,'AuthorView'])->name('author.view');

   // Book Category
   Route::get('/book-category/view',[BookCategoryController::class,'BookCategoryView'])->name('bc.view');

   // Book
   Route::get('/book/view',[BookController::class,'BookView'])->name('book.view');
   Route::get('/book/add',[BookController::class,'BookAdd'])->name('book.add');
   Route::post('/book/store',[BookController::class,'BookStore'])->name('book.store');
   Route::get('/book/edit/{id}',[BookController::class,'BookEdit'])->name('book.edit');
   Route::post('/book/update/{id}',[BookController::class,'BookUpdate'])->name('book.update');

   // Book Issue
   Route::get('/book/issue/view',[BookIssueController::class,'IssueView'])->name('issue.view');
   Route::get('/book/issue/add',[BookIssueController::class,'IssueAdd'])->name('issue.add');
   Route::post('/book/issue/store',[BookIssueController::class,'IssueStore'])->name('issue.store');
   Route::get('/book/issue/edit/{id}',[BookIssueController::class,'IssueEdit'])->name('issue.edit');
   Route::post('/book/issue/update/{id}',[BookIssueController::class,'IssueUpdate'])->name('issue.update');
   Route::get('/book/issue/detail/{id}',[BookIssueController::class,'IssueDetail'])->name('issue.detail');
});

// Fee Category
Route::post('/fee-category',[FeeCategoryController::class,'Store']);
Route::get('/fetch-fee-category', [FeeCategoryController::class, 'fetchfeecategory']);
Route::get('/edit-fee-category/{id}', [FeeCategoryController::class, 'edit']);
Route::put('update-fee-category/{id}', [FeeCategoryController::class, 'update']);
Route::delete('delete-fee-category/{id}', [FeeCategoryController::class, 'destroy']);

Route::prefix('category')->group(function()
{
   //Setup Fee Category
   Route::get('/fee/view',[FeeCategoryController::class,'CategoryView'])->name('category.view');

   //Setup Fee Amount
   Route::get('/amount/view',[FeeAmountController::class,'AmountView'])->name('amount.view');
   Route::get('/amount/add',[FeeAmountController::class,'AmountAdd'])->name('amount.add');
   Route::post('/amount/store',[FeeAmountController::class,'AmountStore'])->name('amount.store');
   Route::get('/amount/edit/{id}',[FeeAmountController::class,'AmountEdit'])->name('amount.edit');
   Route::post('/amount/update/{id}',[FeeAmountController::class,'AmountUpdate'])->name('amount.update');
   Route::get('/amount/detail/{id}',[FeeAmountController::class,'AmountDetail'])->name('amount.detail');
});

// Teacher Delete
Route::delete('delete-teacher/{id}', [TeacherRegController::class, 'destroy']);

// Leave Delete
Route::delete('delete-leave/{id}', [LeaveController::class, 'destroy']);

Route::prefix('teacher')->group(function()
{
   Route::get('/view',[TeacherRegController::class,'TeacherView'])->name('teacher.view');
   Route::get('/reg/add',[TeacherRegController::class,'TeacherAdd'])->name('teacher.add');
   Route::post('/reg/store',[TeacherRegController::class,'TeacherRegStore'])->name('teacher.reg.store');
   Route::get('/reg/edit/{id}',[TeacherRegController::class,'TeacherEdit'])->name('teacher.edit');
   Route::post('/reg/update/{id}',[TeacherRegController::class,'TeacherUpdate'])->name('teacher.update');
   Route::get('/reg/detail/{id}',[TeacherRegController::class,'TeacherDetail'])->name('teacher.detail');

   // Salary Increment
   Route::get('/increment/salary/view',[TeacherSalaryController::class,'SalaryView'])->name('salary.view');
   Route::get('/salary/increment/{id}',[TeacherSalaryController::class,'SalaryIncrement'])->name('salary.increment');
   Route::post('/salary/increment/store/{id}',[TeacherSalaryController::class,'SalaryIncrementStore'])->name('salary.increment.store');
   Route::get('/salary/detail/{id}',[TeacherSalaryController::class,'SalaryDetail'])->name('salary.detail');

   // Leave Teacher
   Route::get('/leave/view',[LeaveController::class,'LeaveView'])->name('leave.view');
   Route::get('/leave/add',[LeaveController::class,'LeaveAdd'])->name('leave.add');
   Route::post('/leave/store', [LeaveController::class, 'LeaveStore'])->name('teacher.leave.store');
   Route::get('/leave/edit/{id}',[LeaveController::class,'LeaveEdit'])->name('leave.edit');
   Route::post('/leave/update/{id}',[LeaveController::class,'LeaveUpdate'])->name('leave.update');
   Route::get('/leave/delete/{id}',[LeaveController::class,'LeaveDelete'])->name('leave.delete');

   // Teacher Attendance
   Route::get('/attendance/view',[AttendanceController::class,'AttendanceView'])->name('attendance.view');
   Route::get('/attendance/add',[AttendanceController::class,'AttendanceAdd'])->name('attendance.add');
   Route::post('/attendance/store', [AttendanceController::class, 'AttendanceStore'])->name('attendance.leave.store');
   Route::get('/attendance/edit/{date}',[AttendanceController::class,'AttendanceEdit'])->name('attendance.edit');
   Route::get('/attendance/detail/{id}',[AttendanceController::class,'AttendanceDetail'])->name('attendance.detail');

   // Teacher Monthly Salary
   Route::get('/monthly/salary/view',[SalaryController::class,'MonthlySalaryView'])->name('teacher.salary.view');
   Route::get('/monthly/salary/get',[SalaryController::class,'MonthlySalaryViewGet'])->name('teacher.monthly.slary.get');
   Route::get('/monthly/salary/payslip/{teacher_id}',[SalaryController::class,'MonthlySalaryPayslip'])->name('teacher.monthly.salary.payslip');

   Route::get('/id-card',[TeacherRegController::class,'IdView'])->name('teacher.card');
   Route::get('/card',[TeacherRegController::class,'IdGet'])->name('th.card.get');

});


// Employee Delete
Route::delete('delete-emp/{id}', [EmployeeRegController::class, 'destroy']);

// Leave Delete
Route::delete('delete-em-leave/{id}', [EmployeeLeaveController::class, 'destroy']);

Route::prefix('employees')->group(function()
{
   Route::get('/view',[EmployeeRegController::class,'EmView'])->name('emp.view');
   Route::get('/reg/add',[EmployeeRegController::class,'EmAdd'])->name('emp.add');
   Route::post('/reg/store',[EmployeeRegController::class,'EmRegStore'])->name('emp.reg.store');
   Route::get('/reg/edit/{id}',[EmployeeRegController::class,'EmEdit'])->name('emp.edit');
   Route::post('/reg/update/{id}',[EmployeeRegController::class,'EmUpdate'])->name('emp.update');
   Route::get('/reg/detail/{id}',[EmployeeRegController::class,'EmDetail'])->name('emp.detail');

   // Salary Increment
   Route::get('/increment/salary/view',[EmployeeSalaryController::class,'EmpView'])->name('ems.view');
   Route::get('/salary/increment/{id}',[EmployeeSalaryController::class,'EmpSalaryIncrement'])->name('ems.increment');
   Route::post('/salary/increment/store/{id}',[EmployeeSalaryController::class,'EmpSalaryIncrementStore'])->name('ems.increment.store');
   Route::get('/salary/detail/{id}',[EmployeeSalaryController::class,'EmpSalaryDetail'])->name('ems.detail');

   // Leave Teacher
   Route::get('/leave/view',[EmployeeLeaveController::class,'EmpLeaveView'])->name('emp.leave.view');
   Route::get('/leave/add',[EmployeeLeaveController::class,'EmpLeaveAdd'])->name('emp.leave.add');
   Route::post('/leave/store', [EmployeeLeaveController::class, 'EmpLeaveStore'])->name('emp.leave.store');
   Route::get('/leave/edit/{id}',[EmployeeLeaveController::class,'EmpLeaveEdit'])->name('emp.leave.edit');
   Route::post('/leave/update/{id}',[EmployeeLeaveController::class,'EmpLeaveUpdate'])->name('emp.leave.update');
   Route::get('/leave/delete/{id}',[EmployeeLeaveController::class,'EmpLeaveDelete'])->name('emp.leave.delete');

   // Employee Attendance
   Route::get('/attendance/view',[EmAttendanceController::class,'EmAttendanceView'])->name('em.attendance.view');
   Route::get('/attendance/add',[EmAttendanceController::class,'EmAttendanceAdd'])->name('em.attendance.add');
   Route::post('/attendance/store', [EmAttendanceController::class, 'EmAttendanceStore'])->name('em.attendance.leave.store');
   Route::get('/attendance/edit/{date}',[EmAttendanceController::class,'EmAttendanceEdit'])->name('em.attendance.edit');
   Route::get('/attendance/detail/{id}',[EmAttendanceController::class,'EmAttendanceDetail'])->name('em.attendance.detail');

   // Employee Monthly Salary
   Route::get('/monthly/salary/view',[EmSalaryController::class,'EmMonthlySalaryView'])->name('employee.salary.view');
   Route::get('/monthly/salary/get',[EmSalaryController::class,'EmMonthlySalaryViewGet'])->name('employee.monthly.slary.get');
   Route::get('/monthly/salary/payslip/{employee_id}',[EmSalaryController::class,'EmMonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');

   Route::get('/id-card',[EmployeeRegController::class,'IdView'])->name('employee.card');
   Route::get('/card',[EmployeeRegController::class,'IdGet'])->name('em.card.get');

});

// Leave Delete
Route::delete('delete-st-remove/{id}', [StudentRegController::class, 'destroy']);

Route::prefix('students')->group(function()
{
   Route::get('/register/view',[StudentRegController::class,'RegView'])->name('student.reg.view');
   Route::get('/register/add',[StudentRegController::class,'StudentAdd'])->name('student.add');
   Route::post('/register/store',[StudentRegController::class,'RegStore'])->name('reg.store');
   Route::get('/class/year',[StudentRegController::class,'StudentSear'])->name('student.class.year');
   Route::get('/register/edit/{student_id}',[StudentRegController::class,'RegEdit'])->name('reg.edit');
   Route::post('/register/update/{student_id}',[StudentRegController::class,'RegUpdate'])->name('reg.update');
   Route::get('/detail/pdf/{student_id}',[StudentRegController::class,'StudentDetail'])->name('student.detail');

   // Promotion
   Route::get('/promotion/{student_id}',[StudentRegController::class,'StudentPromotion'])->name('student.promotion');
   Route::post('/promotion/update/{student_id}',[StudentRegController::class,'StudentPromotionUpdate'])->name('student.promotion.update');

   // Roll Generate
   Route::get('/roll/view',[RollGenerateController::class,'RollView'])->name('roll.generate');
   Route::get('/roll/getstudent',[RollGenerateController::class,'GetStudent'])->name('student.registration.getstudents');
   Route::post('/roll/generate/store',[RollGenerateController::class,'RollStore'])->name('roll.generate.store');

   // Register Fee
   Route::get('/reg/fee/view', [RegFeeController::class, 'RegFeeView'])->name('registration.fee.view');
   Route::get('/reg/fee/classwisedata', [RegFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
   Route::get('/reg/fee/payslip', [RegFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

   // Monthly Free
   Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
   Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
   Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
    
   // Exam Fee  
   Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
   Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
   Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');

   // Student Id Card
   Route::get('/id-card',[IdController::class,'IdView'])->name('student.card');
   Route::get('/card',[IdController::class,'IdGet'])->name('card.get');

   // Marksheet
   Route::get('/marksheet/view',[MarkSheedController::class,'MarkSheetView'])->name('marksheet.view');
   Route::get('/result',[MarkSheedController::class,'MarkSheetGet'])->name('marksheet.get');

   // Testimonal
   Route::get('/testimoanl/view',[TestimonalController::class,'TestimonalView'])->name('testimonal.view');
   Route::get('/testimonal',[TestimonalController::class,'TestimonalGet'])->name('testimonal.get');

   // Transfer Certificate
   Route::get('/transfer/certificate',[TransferController::class,'TransferView'])->name('transfer.view');
   Route::get('/transfer',[TransferController::class,'TransferGet'])->name('transfer.get');
    
});

// Setting
Route::prefix('setting')->group(function()
{
   Route::get('/update',[SettingController::class,'SettingView'])->name('setting.view');
   Route::post('/update',[SettingController::class,'SettingUpdate'])->name('setting.update');

   // Headmaster
   Route::get('/head/update',[HeadController::class,'HeadView'])->name('head.view');
   Route::post('/head/update',[HeadController::class,'HeadUpdate'])->name('head.update');
});

// Account
Route::prefix('account')->group(function()
{
   Route::get('/student-fee',[StudentFeeController::class,'FeeView'])->name('fee.view');
   Route::get('/create-fee',[StudentFeeController::class,'FeeAdd'])->name('fee.add');
   Route::get('/getstudent',[StudentFeeController::class,'GetStudent'])->name('account.fee.getstudent');
   Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');
   
   // Employee Salary Routes
   Route::get('/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
   Route::get('/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
   Route::get('/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
   Route::post('/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');

   // Teacher Salary Routes
   Route::get('/teacher/salary/view', [ThSalaryController::class, 'TeacherSalaryView'])->name('th.salary.view');
   Route::get('/teacher/salary/add', [ThSalaryController::class, 'TeacherSalaryAdd'])->name('teacher.salary.add');
   Route::get('/teacher/salary/getteacher', [ThSalaryController::class, 'TeacherSalaryGetTeacher'])->name('teacher.salary.getteacher');
   Route::post('/teacher/salary/store', [ThSalaryController::class, 'TeacherSalaryStore'])->name('teacher.salary.store');

   // Other Cost Rotues 
   Route::get('other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');
   Route::get('other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');
   Route::post('other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');
   Route::get('other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');
   Route::post('other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');
});

// Report
Route::prefix('report')->group(function()
{
   Route::get('monthly/profit/view', [ProfiteController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
   Route::get('monthly/profit/datewais', [ProfiteController::class, 'MonthlyProfitDatewais'])->name('report.profit.datewais.get');
   Route::get('monthly/profit/pdf', [ProfiteController::class, 'MonthlyProfitPdf'])->name('report.profit.pdf');

});
});
