<?php
/**
 * Created by PhpStorm.
 * User: aka
 * Date: 23/08/17
 * Time: 16:25
 */

namespace App;
use Firebase\FirebaseLib;

abstract class Firebase {

  protected $firebase;
  protected $path;
  protected $primaryKey = "id";
  protected $fillable;

  public function __construct() {
    $this->firebase = new FirebaseLib(config('services.firebase.databaseURL'), config('services.firebase.dbSecreat'));
    $class = new \ReflectionClass($this);
    $this->path = "/" . strtolower($class->getShortName()) . "/";
  }

  public function getPrimaryKeyName() {
    return $this->primaryKey;
  }

  public function getFillable() {
    return $this->fillable;
  }

  public function getPath() {
    return $this->path;
  }

  public function getFirebase() {
    return $this->firebase;
  }

  public static function all() {
    $path = with($instance = new static)->getPath();
    $firebase = with($instance = new static)->getFirebase();
    return json_decode($firebase->get($path));
  }

  public static function find($id) {
    $path = with($instance = new static)->getPath();
    $firebase = with($instance = new static)->getFirebase();
    return json_decode($firebase->get($path . $id));
  }

  public static function create($data) {

    $primaryKey = with($instance = new static)->getPrimaryKeyName();
    $fillable = with($instance = new static)->getFillable();
    $path = with($instance = new static)->getPath();
    $firebase = with($instance = new static)->getFirebase();

    $input[$primaryKey] = uniqid();
    foreach ($data as $key => $value) {
      foreach ($fillable as $field) {
        if ($field == $key) {
          $input[$key] = $value;
        }
      }
    }

    $firebase->set($path . $input[$primaryKey], $input);
  }

  public static function update($data, $id) {
    $fillable = with($instance = new static)->getFillable();
    $path = with($instance = new static)->getPath();
    $firebase = with($instance = new static)->getFirebase();

    $input = array();
    foreach ($data as $key => $value) {
      foreach ($fillable as $field) {
        if ($field == $key) {
          $input[$key] = $value;
        }
      }
    }

    $firebase->update($path . $id, $input);
  }

  public static function destroy($id) {
    $path = with($instance = new static)->getPath();
    $firebase = with($instance = new static)->getFirebase();
    $firebase->delete($path . $id);
  }
}