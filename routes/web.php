<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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


//raw sql
//add
Route::get('/insert', function () {
    DB::insert('insert into students(name,date_of_birth,gpa,advisor) values(?,?,?,?)',['Ibragim','2001-01-21',3.80,'Marzhan Bekbalanova']);
});
//select
Route::get('/select', function () {
    $results = DB::select('select * from students');
    foreach($results as $students){
        echo "Name of student: ".$students->name;echo"<br>";
        echo "Date of birth: ".$students->date_of_birth;echo"<br>";
        echo "GPA: ".$students->gpa;echo"<br>";
        echo "Name of advisor: ".$students->advisor;echo"<br>";
        echo"<br>";echo"<br>";
    }
});
//update
Route::get('/update', function () {
    $updated = DB::update('update students set gpa = 4 where id = ?',[1]);
    return $updated;
});
//delete
Route::get('/delete', function () {
    $deleted = DB::delete('delete from students where id = ?',[3]);
    return $deleted;
});


//model
//add
Route::get('/insert2', function () {
    $student = new Student;
    $student -> name = 'Sultan';
    $student -> date_of_birth = '2001-03-05';
    $student -> gpa = '3.5';
    $student -> advisor = 'Medina Eskendir';
    $student -> save();
});
//select
Route::get('/select2', function () {
    $student = Student::all();
    foreach($student as $students){
        echo "Name of student: ".$students->name;echo"<br>";
        echo "Date of birth: ".$students->date_of_birth;echo"<br>";
        echo "GPA: ".$students->gpa;echo"<br>";
        echo "Name of advisor: ".$students->advisor;echo"<br>";
        echo"<br>";echo"<br>";
    }
});
//update
Route::get('/update2', function () {
    $student = Student::find(1);
    $student ->gpa=3.66;
    $student -> save();
});
//delete
Route::get('/delete2', function () {
    Student::destroy(4);
});



