<!DOCTYPE html>
<head>
  <title>Pusher Test</title>

</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>

  <input type="hidden" name="user_id" id="user_id" value="1">


<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
  <script>
    const beamsClient = new PusherPushNotifications.Client({
      instanceId: 'instance id will come here',
    });

    const beamsTokenProvider = new PusherPushNotifications.TokenProvider({
        url: "{{ url('api/beams-auth') }}",
        queryParams: {
                user_id: "11", // URL query params your auth endpoint needs
            }
        });

        console.log(beamsTokenProvider);

    beamsClient.start()
    //   .then(() => beamsClient.addDeviceInterest('hello'))
      .then(() =>  beamsClient.setUserId("11", beamsTokenProvider))
      .catch(console.error);
  </script>

</body>

</html>
