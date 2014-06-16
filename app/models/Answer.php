<?php

class Answer extends \Eloquent {
	protected $fillable = ['id', 'user_id', 'question_id', 'answer'];
	// protected $table = 'answers';
	public static $rules = array(
		'answer'=>'required|min:2|max:255'
	);
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
	public function user() {
		return $this->belongsTo('Users');
	}
	public function question() {
		return $this->belongsTo('Question');
	}
}
