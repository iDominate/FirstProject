<?php

use Illuminate\Support\Facades\Route;
use App\Models\Freelancer;
use App\Models\Service;
use App\Models\Client;
use App\Models\Offer;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Person;


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

Route::get('all-free', function(){
    return Freelancer::get();
});

Route::get('freelancer-service', function(){
    $freelancer = Freelancer::with('service')->get();
    return $freelancer;
});

Route::get('freelancer-not-have', function(Request $request){
    $freelancer = Freelancer::whereDoesntHave('service')->get();
    return $freelancer;
});

Route::get('add-to-freelancer', function(){
    //Traditional way of adding services blindly without checking if it already exists
    $freelancer = Freelancer::find(1);
    //$freelancer -> service() -> attach(['3', '4']);
    //$freelancer -> service() -> sync(['3', '4']); overrides current data
    $freelancer -> service() -> syncWithoutDetaching(['3', '4']); //adds data while checking if it exists
    return response()->json('success');
});

Route::get('/has-one-through', function(){
     $client = Client::find(2);
     return Offer::where('id',1)->first();
});

Route::get('has-many-through', function(){
    $school = School::find(1);
    return $school->student;
});

Route::get('paginate', function(){
    $persons = Person::paginate(3);
    //Pagination
    //See View And AppServiceProvider
    return view('pagination', compact('persons'));
});

Route::get('local-scope', function(){
    //Scope Example -->See Student Model
    return Student::isLessThan25()->get();
});

Route::get('global-scope', function(){
    return Student::get();
});

Route::get('accessor', function(){
    //Check Model get....Attribute
    return Person::get();
});

Route::get('mutator', function(){
    //Check Model set....Attribute
    $person = new Person;
    $person->name = 'Nastya';
    $person->age = 18;
    $person->registered = 1;
    $person->save();
});



