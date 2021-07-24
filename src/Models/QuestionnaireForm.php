<?php

namespace Fereloper\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireForm extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['title', 'description', 'user_id'];

    /**
     * @var string[]
     */
    protected $appends = ['author', 'total_questions'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(QuestionnaireFormQuestion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(QuestionnaireFormResponse::class);
    }

    /**
     * @return mixed
     */
    public function getAuthorAttribute()
    {
        return $this->user->name;
    }

    /**
     * @return int
     */
    public function getTotalQuestionsAttribute()
    {
        return $this->questions()->count();
    }
}
