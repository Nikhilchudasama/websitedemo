<?php

namespace App;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'menu_name', 'status'
    ];

    public static function validationRules($menusId = null)
    {
        $uniqueRule = Rule::unique('menus');
        if ($menusId) {
            $uniqueRule->ignore($menusId);
        }

        return [
            'menu_name' => 'required|string',
            'status' => 'sometimes|boolean'
        ];
    }

    public function getStatus()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
