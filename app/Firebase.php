<?php
/**
 * Created by PhpStorm.
 * User: aka
 * Date: 23/08/17
 * Time: 16:25
 */

namespace App;
use Firebase\FirebaseLib;

class Firebase {

  protected $firebase;
  protected $path;
  protected $primaryKey;
  protected $fillable;

  public function __construct() {
    $this->firebase = new FirebaseLib(env('databaseURL'), env('dbSecreat'));
    $this->primaryKey = "id";
    $class = new \ReflectionClass($this);
    $this->path = "/" . strtolower($class->getShortName()) . "/";
  }

  public function create($data) {
    $input[$this->primaryKey] = uniqid();

    foreach ($data as $key => $value) {
      foreach ($this->fillable as $field) {
        if ($field == $key) {
          $input[$key] = $value;
        }
      }
    }

    $path = $this->path . $input[$this->primaryKey];
    $this->firebase->set($path, $input);
  }
}