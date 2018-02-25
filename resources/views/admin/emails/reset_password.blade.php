@component('mail::message')
# Reset Password

Dear {{ $firstName }},

Someone hopefully you have requested to reset password for your account. If you didn't make the request, just ignore this mail or let us know. Kindly click reset button to reset your account password

@component('mail::button', ['url' => route('admin_password_reset_page', ['token' => $token, 'email' => $email])])
Reset Password
@endcomponent

Note: Your password won't change until you create a new password.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
