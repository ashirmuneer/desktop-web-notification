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
            "instanceId" => "cd0a708f-6550-417d-b4b8-c1ea5eb4caf8",
            "secretKey" => "9E817824081B333C36BDC6023A5490521CAE91B112520050C9DD3E792AFDB8B7",
          ));


        //   $publishResponse = $pushNotifications->publishToInterests(
        //     ["donuts"],
        //     [
        //       "apns" => [
        //         "aps" => [
        //           "alert" => "Hello!",
        //         ],
        //       ],
        //       "fcm" => [
        //         "notification" => [
        //           "title" => "Hello!",
        //           "body" => "Hello, world!",
        //         ],
        //       ],
        //     ]
        //   );

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
