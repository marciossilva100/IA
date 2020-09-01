<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
// use App\resposta;

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

// Route::get('mostrar',function(){
//     return view('index');
// });

// Route::get('/',function(){

//     return redirect('batepapo-chatbot-inteligencia-artificial');

// });
// Route::get('chat',function(){
//         return view('chat');
  
// });

Route::get('admin',function(){
    return view('admin');
});

Route::get('insert-r',function(){
    return view('insert');
});

// Route::get('login',function(){
//     return view('login');
// });

// Route::get('cadastro',function(){
//     return view('cadastro');
// });

Route::get('escolher-avatar',function(){
    return view('escolher-avatar');
});

Route::get('escolher-genero',function(){
    
    // session(['email' => 'convidado@gmail.com']);
    // session(['id_cliente' => 65]);
    // session(['user' => 'convidado']);
    // session(['cad_person' => 1]);

    return view('escolher-genero');
});

Route::get('admin','buscaController@getAjax');
Route::post('admin','buscaController@getOcasiao');

Route::get('ocasioes-edit','criterioController@getAjax');
Route::post('ocasioes-edit','criterioController@getCriterio');
// Route::post('chat','respostaController@getResposta');


 Route::get('chat','respostaController@getAjax');
//  Route::post('chat','respostaController@getInteresse');
 Route::post('chat','respostaController@getResposta');


// Route::get('cadastro','insertClienteController@getAjax');
// Route::post('cadastro','insertClienteController@insertCliente');

Route::get('login','autenticarController@getAjax');
Route::post('login','autenticarController@getAutenticacao');

Route::get('start-chatbot','insertClienteController@getAjax');
Route::post('start-chatbot','insertClienteController@insertCliente');

// Route::get('chat','sairController@getAjax');
// Route::post('chat','sairController@sair');