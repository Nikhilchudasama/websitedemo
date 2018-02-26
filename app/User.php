<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'password', 'email', 'mobile', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token, $this->email, $this->first_name));
    }

    /**
     * Validation Rules
     *
     * @param int $userId
     * @return array
     **/
    public static function validationRules($userId = null)
    {
        $uniqueRule = Rule::unique('users');
        $passwordValidation = 'required|string';

        if ($userId) {
            $uniqueRule->ignore($userId);
            $passwordValidation = '';
        }

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => [
                'required',
                'string',
                $uniqueRule
            ],
            'password' => $passwordValidation,
            'email' => 'required|max:255|string',
            'mobile' => 'nullable|string',
            'active' => 'sometimes|boolean'
        ];
    }

    /**
     * Returns the name of the user
     *
     * @return string
     */
    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Returns the status of the user
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->active ? 'Active' : 'Inactive';
    }

    /**
     * Returns the list of users
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getList()
    {
        return static::orderBy('created_at', 'desc')
            ->paginate(10)
        ;
    }
}
