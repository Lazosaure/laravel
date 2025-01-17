<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer(
			'*',
			function ( $view ) {
				$view->with( 'order', Auth::check() ? Auth::user()->orders()->where( 'status', 'active' )->first() : null );
			}
		);
	}
}
