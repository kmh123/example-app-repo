<?php

namespace App\Models;

use App\Models\User;
use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $casts = [
        'option_name' => 'array',
    ];
    protected $fillable = ['title', 'question_type', 'option_name', 'user_id'];
    public function survey() {
      return $this->belongsTo(Survey::class);
    }
  
    public function user() {
      return $this->belongsTo(User::class);
    }
  
    public function answers() {
      return $this->hasMany(Answer::class);
    }
    
    protected $table = 'questions';
}
