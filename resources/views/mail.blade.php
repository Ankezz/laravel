{{-- @dd($contactData) --}}
Hello <i>{{ $contactData['name'] }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
<div>
<p><b>From:</b>&nbsp;{{ $contactData['email'] }}</p>
</div>
<div>
<p><b>Message:</b>&nbsp;{{ $contactData['message'] }}</p>
</div>
Thank You,
<br/>
<i>{{ $contactData['subject'] }}</i>
