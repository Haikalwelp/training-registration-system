<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['title', 'description', 'complexity', 'solution', 'tags'];

    // Assuming there might be a relationship with a User model (e.g., IT professional who adds the issue)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}