<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Pusher\PushNotifications\PushNotifications;


class PostController extends Controller
{
    //

    public function store(Request $request) {
        // ...
        // validation can be done here before saving
        // with $this->validate($request, $rules)
        // ...

        // get data to be saved in an associative array using $request->only()
        $data = $request->only(['title', 'description']);

        //  save post and assign return value of created post to $post array
        $post = Post::create($data);

        // return post as response, Laravel automatically serializes this to JSON
        return response($post, 201);
      }

      public function send_notification(){

        $pushNotifications = new PushNotifications(array(
            "instanceId" => "instance id will come here",
            "secretKey" => "secret key will come here",
          ));




          $publishResponse = $pushNotifications->publishToUsers(
            array("11"),
            array("web" => array("notification" => array(
              "title" => "Gamer",
              "body" => "Hello, World!",
              "deep_link" => "https://www.pusher.com",
            )),
          ));



          echo("Published with Publish ID: " . $publishResponse->publishId . "\n");

      }

      public function subscirbe_notify(){

        return view('subscribe');
      }


}
