<?php

namespace App\Models;

use App\Models\Scopes\AllowedFilterSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory, AllowedFilterSearch;

    protected $fillable = ['title', 'description', 'isComplete', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
