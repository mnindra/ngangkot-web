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
      $firebase = new FirebaseLib(config('services.firebase.databaseURL'), config('services.firebase.dbSecreat'));
      $data = json_decode($firebase->get($path));
      if (count($data) > 0) {
        foreach ($data as $row) {
          if ($row->{$attribute} == $value) return false;
        }
      }
      return true;
    });
  }

  public function register()
  {

  }
}