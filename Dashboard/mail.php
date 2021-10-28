<?php
require 'vendor/autoload.php';

use \Mailjet\Resources;
//clients email
//$name = $_POST['name'];
//clients email
//$email = $_POST['email'];
//clients email
//$subject = $_POST['subject'];
//message to be sent
//$message = $_POST['message'];
$mj = new \Mailjet\Client('c4935265598bc981e73ed556caeea5e6', '9ad7d81a2303e266d3c65782f126bfc1', true, ['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "aoshayne18@gmail.com",
                'Name' => "no-reply"
            ],
            'To' => [
                [
                    'Email' => "aoshayne18@gmail.com",
                    'Name' => "$name"
                ]
            ],
            'Subject' => "$subject",
            'TextPart' => "ApionCRM",
            'HTMLPart' => "<h3>$name,</h3><br /><p>$message</p>",
            'CustomID' => "ApionCRM",
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
//header("location: index.php");
