<?php
/**
 * Created by PhpStorm.
 * User: aka
 * Date: 23/08/17
 * Time: 15:00
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Firebase\FirebaseLib;

class ValidatorServiceProvider extends ServiceProvider  {
  public function boot()
  {
    $this->app['validator']->extend('firebase_unique', function ($attribute, $value, $parameters) {
      $path = $parameters[0];
      $firebase = new FirebaseLib(env('databaseURL'), env('dbSecreat'));
      foreach (json_decode($firebase->get($path)) as $row) {
        if ($row->username == $value) return false;
      }
      return true;
    });
  }

  public function register()
  {

  }
}