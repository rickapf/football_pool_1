Hello {{$fname}},
<br><br>
To reset your password for the football pool click the link below (or copy and paste it into your browser) ...
<br><br>
<a href="{{route('reset_password_form', ['id' => $resetId, 'token' => $token])}}">{{route('reset_password_form', ['id' => $resetId, 'token' => $token])}}</a>
<br><br>
-Patrick
<br><br>
<a href="{{route('home')}}">{{route('home')}}</a>
<br><br>
<small><b>Do not reply. This email is an automated notification which is unable to receive replies.</b></small>