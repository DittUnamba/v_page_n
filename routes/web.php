<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/blog', function () {
         return view('blog.index');
})->name('eventos');

Route::get('/blog', function () {
           return view('blog.show');
})->name('vista');

Route::post('/git-push', function () {
    // Ejecutar el script de Git
    $output = shell_exec('bash ' . base_path('git_push.sh') . ' 2>&1');
    return response()->json(['output' => $output]);
});

Route::get('/git', function () {
    return view('git');
});

Route::post('/webhook', function (Request $request) {
    // Verificar si el evento es un push
    $payload = $request->getContent();
    $data = json_decode($payload, true);

    if (isset($data['ref']) && $data['ref'] === 'refs/heads/main') {
        // Ejecutar git pull
        $output = shell_exec('cd ' . base_path() . ' && git pull origin main 2>&1');
        return response()->json(['output' => $output]);
    }

    return response()->json(['message' => 'Evento no válido'], 400);
});