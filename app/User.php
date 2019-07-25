<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function checkPermission($user,$route){
        switch($route){
            case 'add_donor':
            return $user->can_add_donor;
            break;
            case 'delete_donor':
            return $user->can_delete_donors;
            break;

            case 'edit_donor':
            return $user->can_edit_donors;
            break;
            case 'send_sms':
            return $user->can_send_sms;
            break;

            case 'promote_user':
            return $user->can_promote_users;
            break;
            case 'answer_chat':
            return $user->can_answer_chat;
            break;

            case 'can_departments':
            return $user->can_departments;
            break;
            case 'can_batches':
            return $user->can_batches;
            break;

            case 'add_post':
            return $user->can_add_post;
            break;
            case 'edit_post':
            return $user->can_edit_post;
            break;

            case 'delete_post':
            return $user->can_delete_post;
            break;
            case 'change_frontend':
            return $user->can_change_frontend;
            break;

            default:
            return 0;
        }
    }
}
