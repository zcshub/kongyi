<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ArticleComments extends Model
{
    protected $tables = 'article_comments';

    protected $fillable = ['article_id', 'parent_id', 'content', 'status', 'thread', 'user_id'];

    public function scopeNewComments($query)
    {
    	$query->orderBy('id', 'desc');
    }

    public function scopeOfArticle($query, $id)
    {
    	$query->where('article_id', $id);
    }

    public function scopeOfID($query, $id)
    {
        $query->where('id', $id);
    }

    public function scopeCommentsInfoOfArticle($query, $id)
    {
        $query->where('article_id', $id)
              ->newComments()
              ->leftJoin('users', 'article_comments.user_id', '=', 'users.id')
              ->select('users.icon', 'users.name', 'article_comments.*');
    }
}
