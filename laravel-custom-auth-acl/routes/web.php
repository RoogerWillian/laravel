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

use Illuminate\Support\Facades\Route;

Route::get("/registrar", "UsuarioController@registrar")->name("registrar");
Route::post("/salvar", "UsuarioController@salvar")->name("salvar");
Route::get("/login", "AutenticacaoController@login")->name("login");
Route::post("/logar", "AutenticacaoController@logar")->name("logar");
Route::get("/logout", "AutenticacaoController@logout")->name("logout");
Route::get("/", "AutenticacaoController@home")->name("home");

Route::middleware(["auth"])->group(function () {
    Route::get("dashboard", "AutenticacaoController@privada")->name("privada");
    Route::get("usuarios", "UsuarioController@listar")->name("usuarios.listar");
    Route::get("usuarios/{id}/editar", "UsuarioController@editar")->name("usuarios.editar");
    Route::post("usuarios/{id}/atualizar", "UsuarioController@atualizar")->name("usuarios.atualizar");
});
