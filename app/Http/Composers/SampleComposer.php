<?php 
namespace App\Http\Composers;

use Illuminate\View\View;

class SampleComposer {
  public function compose(View $view) {
    $view->with('view_msg','composer massage!');
  }
}namespace App\Http\Composers;

use Illuminate\View\View;

class SampleServiceProvider extends ServiceProvider {
  public function boot() {
    view::composer(
      'dashboard', 'App\Http\Composers\SampleComposer '
    );
  }
}