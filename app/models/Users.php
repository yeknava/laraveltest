<?php

class Users extends Eloquent {
	protected $fillable = ['id', 'username', 'password'];
	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|min:4',
		'password'=>'required|alpha_num|between:4,8|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,8'
	);
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
	public function questions() {
		return $this->hasMany('Question');
	}
	public function answer() {
		return $this->hasMany('Answer');
	}

}
