<?php

namespace App\Models;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];
    protected $dates = ['deleted_at'];
    protected $table = 'surveys';
  
    public function questions() {
      return $this->hasMany(Question::class);
    }
  
    public function user() {
      return $this->belongsTo(User::class);
      
    }
    
    public function answers() {
      return $this->hasMany(Answer::class);
    }
  
}
