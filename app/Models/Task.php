<?php

namespace App\Models;

use App\Enum\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $table = 'task';

    protected $fillable = ['title', 'description', 'status', 'date_deadline'];

    protected $casts = [
      'status' => TaskStatus::class,
      'title' => 'string',
      'description' => 'string',
      'date_deadline' => 'datetime:d.m.Y H:i',
      'created_at' => 'datetime:d.m.Y H:i:s',
      'updated_at' => 'datetime:d.m.Y H:i:s',
    ];
}
