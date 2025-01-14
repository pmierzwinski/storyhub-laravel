<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryPart extends Model
{
    protected $fillable = ['title', 'content', 'order', 'file_path'];

    use HasFactory;

    public function previousPart()
    {
        return $this->belongsTo(StoryPart::class, 'previous_part_id');
    }

    public function nextPart()
    {
        return $this->belongsTo(StoryPart::class, 'next_part_id');
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
