<?php
// messages.php

// Fetch messages
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Fetch messages from the database or any other data source
  $messages = [
    [
      'id' => 1,
      'sender' => 'John',
      'text' => 'Hello!'
    ],
    [
      'id' => 2,
      'sender' => 'Jane',
      'text' => 'Hi there!'
    ]
  ];

  header('Content-Type: application/json');
  echo json_encode($messages);
}

// Add new message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  // Save the message to the database or any other data source
  // $data['message'] contains the new message text

  // Send a success response
  echo json_encode(['status' => 'success']);
}
