<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status_id',
        'completed_at',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, "status", "name");
    }
    
    public function setCompleted()
    {
        $this->status = 'completed';
        $this->completed_at = now();
        $this->save();
    }

    public function setPending()
    {
        $this->status = 'pending';
        $this->completed_at = null;
        $this->save();
    }
}
