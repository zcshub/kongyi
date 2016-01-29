<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	protected $tables = 'articles';

	protected $fillable = ['publish_at', 'title', 'content', 'html_content', 'tag'];

	protected $dates = ['publish_at'];


	//set [] Attribute
	public function setPublishAtAttribute($date)
	{
		$this->attributes['publish_at'] = Carbon::createFromFormat('Y-m-d H:i', $date);
	}

	public function scopePublished($query)
	{
		$query->where('publish_at', '<=', Carbon::now());
	}

}
