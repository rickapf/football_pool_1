Hello {{$first_name}},
<br><br>
To reset your password for the football pool click the link below (or copy and paste it into your browser) ...
<br><br>
<a href="{{route('reset_password_form', ['id' => $resetId, 'token' => $token])}}">{{route('reset_password_form', ['id' => $resetId, 'token' => $token])}}</a>
<br><br>
<b>Note:</b> This link will expire in {{config('pool.reset_password_link.expire')}}.
@include('partials.email_footer')