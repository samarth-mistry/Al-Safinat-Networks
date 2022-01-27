<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Al-Safinat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
	<body>
        <p style="font-size: 18px;">Hello! <b>{{ $booking->owner_name }}<br></b> your booking is been Successfully approved.</p>
        <p>The tracking id for tracking the container : <b>{{ $booking->tracking_id }}</b></p>
        <p>The unit number assigned is : {{ $unit-> name }}</p>
	</body>
</html>