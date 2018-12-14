Hello {{$first_name}}, thanks for participating in the pool!
<br><br>
Here are your registration details ...
<br><br>
Name: {{$first_name . ' ' . $last_name}}<br>
Email: {{$email}}
<br><br>
Please take a few minutes and view the rules & info section on the site.<br>
Contact me at <b>rickapf@hotmail.com</b> or by using the feedback form on the site if you have any questions or concerns.
<br><br>
Good luck & enjoy the season!
@include('partials.email_footer')