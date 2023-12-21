// let chatCont = document.querySelector(".chat-msg");
// let errovl = $(".chat-msg-ovl");
// let incoming_id = $("#incoming_id_inp");
// let chatInp = $("#send-msg-inp");
// let subbtn = $("#send-btn");
// let incoming_msg = $("#chat-msg");


// chatCont.onmouseenter = ()=>{
//   chatCont.classList.add("active");
// }

// chatCont.onmouseleave = () => {
//   chatCont.classList.remove("active");
// };




// let sendbtn = document.querySelector("#send-btn");
// subbtn.on("click", (e) => {
//     e.preventDefault();

//     if (chatInp.val() == "") {
//         alert("Input cannot be empty");
//         return false;
//     } else {
//         $.ajax({
//           url: "model/insert_msg.php",
//           method: "post",
//           dataType: "text",
//           data: {
//           insert_data: "true",
//           user_inp: chatInp.val(),
//           incoming_id: incoming_id.val(),
//           },
//           success: (data, stat) => {
//           chatInp.val("");
//             scrollmsg();
//           },
//         });
//     }
// });

// function scrollmsg() {
//   chatCont.scrollTop = chatCont.scrollHeight;
// }
// let fetchmsgfunc = setInterval(() => {
//   $.ajax({
//     url: "model/messages.php",
//     method: "post",
//     dataType: "text",
//     data: {
//       fetch_msg: "true",
//       incoming_id: incoming_id.val(),
//     },
//     success: (data, stat) => {
//       if (data == "Null") {
//         errovl.show();
//         errovl.css("display", "flex");
//       } else if (data) {
//           errovl.hide();
//           errovl.css("display", "none");
//           chatCont.innerHTML = data;
//         if (!chatCont.classList.contains("active")) {
//           scrollmsg();
//         }
//       }
//     }
//   });
// }, 500);


let chatCont = document.querySelector(".chat-msg");
let errovl = $(".chat-msg-ovl");
let incoming_id = $("#incoming_id_inp");
let chatInp = $("#send-msg-inp");
let subbtn = $("#send-btn");
let incoming_msg = $("#chat-msg");
let fileInput = $("#fileInput"); // Assuming you have an input for file selection

chatCont.onmouseenter = () => {
  chatCont.classList.add("active");
};

chatCont.onmouseleave = () => {
  chatCont.classList.remove("active");
};

subbtn.on("click", (e) => {
  e.preventDefault();

  if (chatInp.val() == "") {
    alert("Input cannot be empty");
    return false;
  }

  let formData = new FormData();
  formData.append("insert_data", "true");
  formData.append("user_inp", chatInp.val());
  formData.append("incoming_id", incoming_id.val());

  // Append the selected file to FormData
  let selectedFile = fileInput[0].files[0];
  if (selectedFile) {
    formData.append("file", selectedFile);
  }

  $.ajax({
    url: "model/insert_msg.php",
    method: "post",
    processData: false,
    contentType: false,
    data: formData,
    success: (data, stat) => {
      chatInp.val("");
      fileInput.val(""); // Reset the file input
      scrollmsg();
    },
  });
});

function scrollmsg() {
  chatCont.scrollTop = chatCont.scrollHeight;
}

let fetchmsgfunc = setInterval(() => {
  $.ajax({
    url: "model/messages.php",
    method: "post",
    dataType: "text",
    data: {
      fetch_msg: "true",
      incoming_id: incoming_id.val(),
    },
    success: (data, stat) => {
      if (data == "Null") {
        errovl.show();
        errovl.css("display", "flex");
      } else if (data) {
        errovl.hide();
        errovl.css("display", "none");
        chatCont.innerHTML = data;
        if (!chatCont.classList.contains("active")) {
          scrollmsg();
        }
      }
    },
  });
}, 500);
