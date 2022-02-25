<?php

namespace MohammadAlhallaq\ChangeAndNotify\Traits;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use MohammadAlhallaq\ChangeAndNotify\Contracts\NotifyWhenDirtyContract;
use MohammadAlhallaq\ChangeAndNotify\Mails\PasswordChangedNotificationMail;

/**
 * @method wasChanged(string $passwordColumnName)
 * @method getRawOriginal(string $emailColumnName)
 */
trait NotifyWhenDirtyTrait
{

    protected static function booted()
    {
        static::saved(function (NotifyWhenDirtyContract $user) {
            $user->sendPasswordChangedEmail();
        });
    }

    function passwordColumnName(): string
    {
        return 'password';
    }

    function emailColumnName(): string
    {
        return 'email';
    }

    function nameColumnName(): string
    {
        return 'name';
    }

    function shouldPasswordChangedNotificationMailBeQueued(): bool
    {
        return false;
    }

    function isPasswordChanged(): bool
    {
        return $this->wasChanged($this->passwordColumnName());
    }

    function passwordChangedNotificationMail(): Mailable
    {
        return new PasswordChangedNotificationMail($this);
    }

    function sendPasswordChangedEmail(): void
    {

        if (!$this->isPasswordChanged()) {
            return;
        }

        $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

        if ($this->shouldPasswordChangedNotificationMailBeQueued()) {
            $mail->queue($this->passwordChangedNotificationMail());
            return;
        }
        $mail->send($this->passwordChangedNotificationMail());
    }

}
