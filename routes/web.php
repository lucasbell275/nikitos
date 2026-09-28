<?php

use App\Http\Controllers\AdminClienteController;
use App\Http\Controllers\AdminListaPrecioController;
use App\Http\Controllers\AdminPedidoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListaPrecioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetadataController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaPrivadaController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\EnsureClienteActivo;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/{producto}', [ProductosController::class, 'show'])->name('productos.show');
Route::get('/donde-comprar', [DistribuidorController::class, 'index'])->name('mapa.index');
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros.index');
Route::get('/recetas', [RecetasController::class, 'index'])->name('recetas.index');
Route::get('/recetas/{receta}', [RecetasController::class, 'show'])->name('recetas.show');
Route::get('/contacto', [ContactoController::class, 'create'])->name('contacto.create');
Route::post('/contacto/store', [ContactoController::class, 'store'])->name('contacto.store');
Route::post('/', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/login/admin', [LoginController::class, 'AdminLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/clientes/ingresar', [ClienteAuthController::class, 'showLogin'])->name('clientes.login');
Route::post('/clientes/ingresar', [ClienteAuthController::class, 'login'])->middleware('throttle:5,1')->name('clientes.login.submit');
Route::post('/clientes/salir', [ClienteAuthController::class, 'logout'])->name('clientes.logout');

Route::middleware(['auth:cliente', EnsureClienteActivo::class])->prefix('zona-privada')->name('zona.')->group(function (): void {
    Route::get('/', [ZonaPrivadaController::class, 'productos'])->name('productos');
    Route::post('/pedidos', [ZonaPrivadaController::class, 'storePedido'])->name('pedidos.store');
    Route::get('/pedidos', [ZonaPrivadaController::class, 'historial'])->name('pedidos.index');
    Route::get('/pedidos/{pedido}', [ZonaPrivadaController::class, 'showPedido'])->name('pedidos.show');
    Route::post('/pedidos/{pedido}/repetir', [ZonaPrivadaController::class, 'repetirPedido'])->name('pedidos.repetir');
    Route::get('/listas-de-precios', [ListaPrecioController::class, 'index'])->name('listas-precios.index');
    Route::get('/listas-de-precios/{listaPrecio}/ver', [ListaPrecioController::class, 'ver'])->name('listas-precios.ver');
    Route::get('/listas-de-precios/{listaPrecio}/descargar', [ListaPrecioController::class, 'descargar'])->name('listas-precios.descargar');
});

Route::middleware(['auth:web', EnsureAdmin::class])->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/productos/index', [ProductosController::class, 'AdminIndex'])->name('productos.index');
    Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');
    Route::get('/categorias/index', [CategoriasController::class, 'AdminIndex'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::put('/home/update', [HomeController::class, 'update'])->name('home.update');
    Route::get('/mapa/index', [DistribuidorController::class, 'AdminIndex'])->name('mapa.index');
    Route::get('/mapa/create', [DistribuidorController::class, 'create'])->name('mapa.create');
    Route::post('/mapa/store', [DistribuidorController::class, 'store'])->name('mapa.store');
    Route::get('/mapa/{distribuidor}/edit', [DistribuidorController::class, 'edit'])->name('mapa.edit');
    Route::put('/mapa/{distribuidor}', [DistribuidorController::class, 'update'])->name('mapa.update');
    Route::delete('/mapa/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('mapa.destroy');
    Route::get('/nosotros/edit', [NosotrosController::class, 'edit'])->name('nosotros.edit');
    Route::put('/nosotros', [NosotrosController::class, 'update'])->name('nosotros.update');
    Route::get('/recetas/index', [RecetasController::class, 'AdminIndex'])->name('recetas.index');
    Route::get('/recetas/create', [RecetasController::class, 'create'])->name('recetas.create');
    Route::get('/recetas/edit/{receta}', [RecetasController::class, 'edit'])->name('recetas.edit');
    Route::put('/recetas/update', [RecetasController::class, 'update'])->name('recetas.update');
    Route::post('/recetas/store', [RecetasController::class, 'store'])->name('recetas.store');
    Route::delete('/recetas/{receta}', [RecetasController::class, 'destroy'])->name('recetas.destroy');
    Route::get('/contacto/index', [ContactoController::class, 'AdminIndex'])->name('contacto.index');
    Route::get('/contacto/show/{contacto}', [ContactoController::class, 'show'])->name('contacto.show');
    Route::delete('/contacto/{contacto}', [ContactoController::class, 'destroy'])->name('contacto.destroy');
    Route::get('/metadata', [MetadataController::class, 'index'])->name('metadata.index');
    Route::put('/metadata', [MetadataController::class, 'update'])->name('metadata.update');
    Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('/newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/clientes', [AdminClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/crear', [AdminClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [AdminClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/editar', [AdminClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [AdminClienteController::class, 'update'])->name('clientes.update');

    Route::get('/listas-de-precios', [AdminListaPrecioController::class, 'index'])->name('listas-precios.index');
    Route::post('/listas-de-precios', [AdminListaPrecioController::class, 'store'])->name('listas-precios.store');
    Route::get('/listas-de-precios/{listaPrecio}/ver', [ListaPrecioController::class, 'ver'])->name('listas-precios.ver');
    Route::get('/listas-de-precios/{listaPrecio}/descargar', [ListaPrecioController::class, 'descargar'])->name('listas-precios.descargar');
    Route::delete('/listas-de-precios/{listaPrecio}', [AdminListaPrecioController::class, 'destroy'])->name('listas-precios.destroy');

    Route::get('/pedidos', [AdminPedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/{pedido}', [AdminPedidoController::class, 'show'])->name('pedidos.show');
    Route::put('/pedidos/{pedido}', [AdminPedidoController::class, 'update'])->name('pedidos.update');
    Route::get('/pedidos/{pedido}/archivo', [AdminPedidoController::class, 'archivo'])->name('pedidos.archivo');
});
