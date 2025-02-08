<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable, CanResetPasswordTrait, HasProfilePhoto, TwoFactorAuthenticatable;

    protected $connection = 'sqlsrv_ranuser';
    protected $table = 'UserInfo';
    protected $primaryKey = 'UserNum';
    public $timestamps = false;

    protected $fillable = [
        'UserName',
        'UserID',
        'UserEmail',
        'UserPass',
        'UserPass2',
        'Upass',
        'UserType',
        'UserLoginState',
        'UserAvailable',
        'CreateDate',
        'LastLoginDate',
        'SGNum',
        'SvrNum',
        'ChaName',
        'UserBlock',
        'UserBlockDate',
        'ChaRemain',
        'ChaTestRemain',
        'PremiumDate',
        'ChatBlockDate',
        'UserPoint',
        'IpSite',
        'Donated',
    ];

    protected $hidden = [
        'UserPass',
        'UserPass2',
        'Upass',
    ];

    /**
     * Get the password for authentication.
     */
    public function getAuthPassword()
    {
        return $this->Upass;
    }

    /**
     * Accessor for the 'name' attribute.
     */
    public function getNameAttribute()
    {
        return $this->UserID;
    }

    /**
     * Accessor for the 'email' attribute.
     */
    public function getEmailAttribute()
    {
        return $this->UserEmail;
    }
	
	// Optionally, define a method to get the email for verification
    public function getEmailForVerification()
    {
        return $this->UserEmail;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new \App\Notifications\ResetPasswordNotification($token));
	}


    /**
     * Get the email address for password reset.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->UserEmail;
    }
}
