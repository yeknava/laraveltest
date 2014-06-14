<?php

class Question extends Eloquent {
	protected $fillable = ['id', 'user_id', 'question', 'solved'];
	public static $rules = array(
		'question'=>'required|min:10|max:255',
		'solved'=>'in:0,1'
	);
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
	public function users(){
		return $this->belongsTo('Users');
	}
	public static function unsolved() {
		return static::where('solved', '=', 0)->orderBy('id', 'DESC')->paginate(1);
	}
}
