<?php

use Illuminate\Support\Facades\Mail;
use MohammadAlhallaq\ChangeAndNotify\Mails\PasswordChangedNotificationMail;
use MohammadAlhallaq\ChangeAndNotify\Tests\Models\User;

it('can test', closure: function () {

    Mail::fake();

    $user = User::factory()->create();
    $user->password = bcrypt('password');
    $user->save();

    Mail::assertSent($user->PasswordChangedNotificationMail()::class);

    expect(true)->toBeTrue();
});
