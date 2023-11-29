$(document).ready(function(){
    // Load chat messages on page load
    loadChat();

    // Submit form via Ajax
    $('#messageForm').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: 'sendMessage.php',  // Create this file to handle message submission
            data: formData,
            success: function(response){
                $('#messageInput').val('');
                loadChat();
            }
        });
    });

    // Function to load chat messages
    function loadChat(){
        var incoming_id = $('.incoming_id').val();
        $.ajax({
            type: 'GET',
            url: 'getMessages.php',  // Create this file to fetch messages
            data: {incoming_id: incoming_id},
            success: function(response){
                $('#chatBox').html(response);
            }
        });
    }

    // Auto-refresh chat every 3 seconds (adjust as needed)
    setInterval(function(){
        loadChat();
    }, 3000);
});
