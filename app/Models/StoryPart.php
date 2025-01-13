<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryPart extends Model
{
    protected $fillable = ['title', 'content', 'order', 'file_path'];

    use HasFactory;
}
