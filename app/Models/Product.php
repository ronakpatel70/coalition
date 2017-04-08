<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Product extends Model {

	protected $fillable = ['rfc','name','quantity','price','total'];


}