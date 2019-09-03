<?php

namespace Illuminate\Auth\Notifications;

use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->greeting('Hai!')
            ->subject(Lang::getFromJson('Notifikasi atur ulang sandi'))
            ->line(Lang::getFromJson('Anda mendapatkan notifikasi ini karena kami mendapatkan permohonan atur ulang sandi untuk akun Anda.'))
            ->action(Lang::getFromJson('Atur ulang sandi'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email_pegawai' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::getFromJson('Tautan ini akan kedaluwarsa dalam :count menit.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Jika Anda tidak mengajukan atur ulang sandi, mohon abaikan pesan ini.'));
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
