# Travel Planet

This is Laravel project with CRUD operation for reservations of rooms in hotels<br>
Integrate authentication using Auth0 Laravel Plugin<br><hr>

Issues during Development<br>
1-Exception: Cannot handle token prior to [timestamp]
Solved:<br>
Edit
<code>JWT::$leeway = 0;</code>
to
<code>JWT::$leeway = 10;</code>
