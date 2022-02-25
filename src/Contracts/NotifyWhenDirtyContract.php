<?php
namespace MohammadAlhallaq\ChangeAndNotify\Contracts;

use Illuminate\Mail\Mailable;

interface NotifyWhenDirtyContract
{
    function passwordColumnName(): string;

    function emailColumnName(): string;

    function nameColumnName(): string;

    function shouldPasswordChangedNotificationMailBeQueued(): bool;

    function isPasswordChanged(): bool;

    function passwordChangedNotificationMail(): Mailable;

    function sendPasswordChangedEmail(): void;
}
