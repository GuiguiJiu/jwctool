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
Route::get('/p2', function () {
    $majors = \App\Models\JxnuClass::find('66')->students;
    foreach ($majors as $major) {
        echo $major->name . "<br>";
    }
    return ;
    dd(\App\Models\JxnuClass::find('66')->students);
});
Auth::routes([
    'register' => false,
    'email/verify' => false,
]);
Route::get('/password/update', 'Auth\UpdatePasswordController@index');
Route::post('/password/update', 'Auth\UpdatePasswordController@update');


Route::get('/profile', function () {
    if(Auth::user()->type == 'Student')
        return view('students.profile');
    else if (Auth::user()->type == 'Teacher') {
        $user = \App\Models\Teacher::find(Auth::id());
        return view('teachers.profile', [
            'user' => $user,
        ]);
    }
});
Route::get('/edit', function () {
    if(Auth::user()->type == 'Student')
        return view('students.profile-edit');
    else if (Auth::user()->type == 'Teacher') {
        $user = \App\Models\Teacher::find(Auth::id());
        return view('teachers.profile-edit', [
            'user' => $user,
        ]);
    }

});

//Route::get('/p1', function () {return view('p1');});
//Route::get('/p2', function () {return view('p2');});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/404', 'HomeController@error404')->name('error404');
Route::get('/score-reports', 'Student\ScoreReportController@index')->name('score-reports');
Route::get('/report-analyze', 'Student\ReportAnalyzeController@index')->name('report-analyze');
Route::get('/timetable', 'Student\TimetableController@index')->name('timetable');

