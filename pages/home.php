<?php
echo '
<div class="col-md-8 offset-md-2 content" style="text-align: left;">
<h2 >Project #2</h2>
	<p>Functional requirements:</p>
<ul>
<li>Account creation (profile with Name, Surname, Address, NIP,PESEL, avatar &#8211; uploaded with standarized size) &#8211; 5 points.</li>
<li>Sessions in Redis &#8211; 25 points</li>
<li>Wall is similar to Facebook wall, but we have only one wall for all users, just with text (max 256 chars) and it shows only last 10 posts. The current content of wall should be cached using Redis. After every update of the wall the cache should be updated. &#8211; 15 points</li>
<li>When a user sends some text to a wall, it will be added to a queue (RabbitMQ) for admin approval. Admin can check all the posts waiting in queue and can either approve (meaning the post will go to the wall) or reject it (the post will be discarded) &#8211; 15 points</li>
</ul>
<p>Cluster requirements:</p>
<ul>
<li>The app should run on both web server RS1 and RS2, load-balanced with LVS using Keepalived &#8211; 10 points.</li>
<li>Each App server should connect to Mysql Master for necessary queries (like updates, but also some selects), and to slave for other queries &#8211; 20 points.</li>
<li>Gluster should cover the availability of avatar on all server &#8211; 10 points.</li>
</ul>
<p>Caution:</p>
<p><span style="text-decoration: underline;"><strong>Having a working code doesn&#8217;t mean you&#8217;ll get any points.</strong></span> To each and every function the teacher can ask some questions (or give you some test) related to the subject and only <span style="text-decoration: underline;">both the correct answers</span> and <span style="text-decoration: underline;">working code</span> will be rewarded with points.</p>
</div>
';
?>
