<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

	// Accesors
	public function getExcerptAttribute()
	{
		return substr($this->content, 0, 120);
	}

	public function getPublishedAtAttribute()
	{
		return $this->created_at->format('d/m/y');
	}

	// Relations
	public function user(){
		return $this->belongsTo(User::class);
	}
}
