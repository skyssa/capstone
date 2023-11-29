<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.chat-area {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    overflow: hidden;
}

header {
    background-color: #4285f4;
    color: #fff;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.back-icon {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.details span {
    font-weight: bold;
}

.chat-box {
    height: 300px;
    overflow-y: auto;
    padding: 10px;
}

.typing-area {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border-top: 1px solid #ddd;
    background-color: #f9f9f9;
}

.input-field {
    flex: 1;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

button {
    background-color: #4285f4;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0c7cd5;
}


    </style>
    <title>Chat Application</title>
</head>
<body>
    <?php include 'chat.php'; ?>
</body>
</html>
