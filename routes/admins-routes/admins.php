<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AdminController,
};

Route::controller(AdminController::class)->group(function() {
// Administrators
Route::get('/administratori', [AdminController::class, 'index'])->name('all-admin');
Route::get('/administrator/{user:username}', [AdminController::class, 'show'])->name('show-admin');
Route::get('/novi-administrator', [AdminController::class, 'create'])->name('new-admin');
Route::post('/novi-administrator', [AdminController::class, 'store'])->name('store-admin');
Route::get('/izmijeni-profil-administratora/{user:username}', [AdminController::class, 'edit'])->name('edit-admin');
Route::put('/izmijeni-profil-administratora/{id}', [AdminController::class, 'update'])->name('update-admin');

// Delete ownself
Route::delete('/izbrisi-admina/{id}', [AdminController::class, 'destroy'])->name('destroy-admin');
});

// For multiple student delete
Route::delete('izbrisi-sve/administratore', [AdminController::class, 'deleteMultiple'])->name('delete-all-admins');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain administrator through URI
Route::get('/administratori/{id}', function ($id) {});
Route::post('/administratori/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
});

Route::post('/crop/admin', [AdminController::class, 'crop'])->name('admin.crop');


?>
