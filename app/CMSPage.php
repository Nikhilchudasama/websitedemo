<?php

namespace App;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CMSPage extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'content', 'image', 'status'
    ];

    public static function validationRules($cMSPageId = null)
    {
        $uniqueRule = Rule::unique('cmspage');
        if ($cMSPageId) {
            $uniqueRule->ignore($cMSPageId);
        }

        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'sometimes|boolean'
        ];
    }

    public function getStatus()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
