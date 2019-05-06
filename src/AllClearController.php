<?php

namespace R_blaster\Allclear;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class AllClearController extends Controller
{
    public function handle()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('clear-compiled');
            Artisan::call('config:clear');
            return Redirect::back()->with('message', 'All Cache Clear Successful !');
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }
}
