<?php

namespace Fereloper\LaravelQuestionnaire\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireFormResponse extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['author_id', 'student_id', 'form_id', 'response'];

    /**
     * @var string[]
     */
    protected $casts = [
        'response' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(QuestionnaireForm::class);
    }
}
