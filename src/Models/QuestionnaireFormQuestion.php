<?php

namespace Fereloper\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireFormQuestion extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['form_id', 'question', 'option', 'type'];

    /**
     * @var string[]
     */
    protected $casts = [
        'option' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(QuestionnaireForm::class);
    }
}
