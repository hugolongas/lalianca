<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitat extends Model
{
    
	public function slug()
	{
        return config('app.url').'/activitat/'.$this->url;
	}

	public function category()
	{
		$this->belongsTo(Category::class);
	}
}
