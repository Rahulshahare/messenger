$( document ).ready(function() {
    console.log("Lets Begin");
    let userList = [];
    var userMessages = [];
    var userId = '';
    var user_two = '';
    var conversation_id = '';
    var last_message_id = '';

    /**
     * 
     */
     $('#scrollingComponent').scroll(function() {
        var pos = $('#scrollingComponent').scrollTop();
        if (pos == 0) {
            //alert('top of the div');
            //can be useful for getting old messages
        }
    });




    /**
     * A function to get cookie
     * 
     */
     function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    userId = getCookie("userId"); //getting cookie
    console.log(userId);
    
    getNewMessages();

    //getting user details
    if(userId){
        //console.log('getting data');
        getUserDetails(userId);
    }

    function OnUserClick(id){
        console.log(id);
    }
    
    /**
     * 
     * @param {id of div} id 
     */
    const scrollSmoothlyToBottom = (id) => {
        const element = $(`#${id}`);
        element.animate({
           scrollTop: element.prop("scrollHeight")
        }, 500);
     }
/**
 * function to get user details
 */
function  getUserDetails(id){
        $.ajax({
            url: "api/get_user_details.php",
            data:{ userId: id},
            success: function(data){ 
                //console.log(data);
                userList = data;
                showUsers();
            },
            error: function(){
                alert("There was an error.");
            }
        });
}
        
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function showUsers(){
        if(userList){
            // console.log(userList);
            
            
            const myObj = JSON.parse(userList);
            x = myObj.id;
            // Object.entries(myObj).forEach(([key, value]) => {
            //     console.log(key , value); // key ,value
            //   });
            var renderUserList;
            var UI_user_list = document.getElementById("UserList");
              for (let index = 0; index < myObj.length; index++) {
                    var id = myObj[index].id;
                    var full_name = capitalizeFirstLetter(myObj[index].full_name);
                    var profile_pic = myObj[index].profile_pic;
                    var online = myObj[index].online;
                    var last_login = myObj[index].last_login;
                    var register_on = myObj[index].register_on;
                    var badge = online == 1 ? 'success' :'secondary';
                    var secText = online == 1 ? 'Active now' : last_login == '' ? time_ago(register_on) : time_ago(last_login) ;
                    //var UI_user_list = document.getElementById("UserList");
                    UI_user_list.innerHTML += '<a href="#" id="'+id+'" data-id="'+id+'"  class="UserInList list-group-item list-group-item-action">'+
                                                '<div class="container">'+
                                                '<div class="row">'+
                                                '<div class="col-3 position-relative text-center" style="padding: 0;">'+
                                                '<div>'+
                                                '<img src="usericons/'+profile_pic+'" class="img-fluid " style="width: 80%;"/>'+
                                                '<span class="position-absolute bottom-0  translate-middle p-2 bg-'+ badge +' border border-light rounded-circle" style="border: 3px solid #fff !important;">'+
                                                '<span class="visually-hidden">New alerts</span>'+
                                                '</span>'+
                                                '</div>'+
                                                '</div>'+
                                                '<div class="col-9" style="padding: 10px;">'+
                                                '<p style="margin: 0;font-weight: 500;font-size: 15px;">'+full_name+'</p>'+
                                                '<span class="text-secondary" style="font-size: 12px;font-weight: 500;">'+secText+'</span>'+
                                                '</div></div></div></a>';
                                           
                                               
                  
              }
              GetAnatherUser();

            // let UI_user_list = document.getElementById("UserList");
            // UI_user_list.innerHTML = renderUserList; 
            // console.log(renderUserList);

            
            for (var key in myObj) {
                for (var i = 0; i < myObj[key].length; i++) {
                    //HTML logic
                    console.log(data[key][i].profile_pic);
                }
            }
             
        }

        
}

function deleteMessage(){
    $('.DeleteMsg').click(function(){
        msg_id = this.id;
        console.log(msg_id);
    });
}

    
function GetAnatherUser(){
    $('.UserInList').click(function(){
        user_two = this.id;
        ShowProfileOfUser();
        GetConversationId();
        //setTimeout(showUsers, 1000);   
        //alert(this.id);
        //showing msg pane i.e. #msgBox
        if( $("#msgBox").hasClass('d-none')){
            
            $("#introBox").addClass('d-none');
            $("#msgBox").removeClass('d-none');
            
        }


        //Showing active user
        if ($( ".UserInList" ).hasClass('active')) {
            $( ".UserInList" ).removeClass( 'active');
        } else {
          $( "#"+this.id ).addClass( 'active');
        }

        return false;

    });
 
}
function GetConversationId(){
    var user_one = userId;
    //user_two
        
        if(user_two && user_one){
            var data = 'user_one='+ userId  & 'user_two='+ user_two; 
            $.ajax({
                type:"POST",
                url: "api/get_conversation_id.php",
                data:{ user_one: user_one, user_two:user_two},
                success: function(data){ 
                    //console.log(data);
                    conversation_id = data;
                    //console.log(conversation_id);

                    GetMessages();
                   
                },
                error: function(){
                    alert("There was an error.");
                }
            });
        }else{
            alert("ERROR WHILE GETTING CONVERSATION ID");
        }
}


function GetMessages(){
    if(conversation_id){
        $.ajax({
            type:"POST",
            url: "api/get_messages.php",
            data:{conversation_id:conversation_id},
            success: function(data){ 
                //console.log(data);
                    userMessages = data;
                    var countLength = JSON.parse(data);
                    //console.log("lenght of msg "+countLength.length)
                    showMessages();
                    scrollSmoothlyToBottom('scrollingComponent');
               
            },
            error: function(){
                alert("There was an error.");
            }
        });
    }else{
        console.log("ERROR WHILE GETTING INITIAL MESSAGES");
    }
} 

$('.sendButton').click(function(){
    var input_msg = document.getElementById("messenger-text").value;
    var st = input_msg.trim();
    if(st != ''){
        SendMessage();
        if( $('#Imagepicker').hasClass('d-none') ){
            $('#Imagepicker').removeClass('d-none');
            $('#Sendbutton').addClass('d-none');
         }
    }else{
        document.getElementById("messenger-text").value = "";
        if( $('#Imagepicker').hasClass('d-none') ){
            $('#Imagepicker').removeClass('d-none');
            $('#Sendbutton').addClass('d-none');
         }
    }
    
});

function submitOnEnter(event){
    if(event.which === 13){
       // event.target.form.dispatchEvent(new Event("submit", {cancelable: true}));
        event.preventDefault(); // Prevents the addition of a new line in the text field (not needed in a lot of cases)
        //SendMessage();
    }
}

//function to check wheather to show send button or image picker
$('#messenger-text').bind('input propertychange', function() {
    //console.log(this.value);
     if(this.value.length){
        //console.log(this.value.length);
            //hide image show send
            if( $('#Sendbutton').hasClass('d-none') ){
                $('#Sendbutton').removeClass('d-none');
                $('#Imagepicker').addClass('d-none');
            }
          
        }else{
            //hide send show image
            if( $('#Imagepicker').hasClass('d-none') ){
                $('#Imagepicker').removeClass('d-none');
                $('#Sendbutton').addClass('d-none');
            }
        }
    
});

//document.getElementById("messenger-text").addEventListener("keypress", submitOnEnter);

function SendMessage(picture = null){
    var input_msg
    if(picture){
        input_msg =picture;
    }else{
        input_msg = document.getElementById("messenger-text").value;
    }
    
    //var input_msg = document.getElementById("messenger-text").value;
    document.getElementById("messenger-text").value = "";
    //console.log("Entered Message is "+input_msg);

    if(conversation_id && userId && user_two && input_msg != ''){
        input_msg = encodeURIComponent(input_msg);
        $.ajax({
            type:"POST",
            url: "api/send_message.php",
            data:{ user_one: userId, user_two:user_two, conversation_id:conversation_id, message:input_msg},
            success: function(data){ 
                console.log("STATUS::"+data.trim());
                getNewMessages();
               
            },
            error: function(){
                alert("There was an error.");
            }
        });
    }else{
        console.log("STATUS::ERROR WHILE SENDING MESSAGE");
    }
}

function ShowProfileOfUser(){
    if(!userList){
        console.log("ERROR WHILE SETTING NAME");
    }
    const myObj = JSON.parse(userList);
    //console.log(myObj[0].id);
    var UserProfileName = document.getElementById("User_two_details");
    UserProfileName.innerHTML = '';
    for (let index = 0; index < myObj.length; index++) {
        var id = myObj[index].id;
        if(user_two == id){
            console.log('user 2 is '+ user_two);
            var full_name = myObj[index].full_name;
            var online = myObj[index].online;
            var last_login = myObj[index].last_login;
            var register_on = myObj[index].register_on;
            var status = online == 1 ? '<span class="badge rounded-pill bg-primary">online</span>' :'<span class="badge rounded-pill bg-light text-dark">offline</span>';
             UserProfileName.innerHTML += full_name.toUpperCase() +' '+status;
        }

    }
}

function showMessages(){
    if(userMessages){
        const myObj = JSON.parse(userMessages);
        //console.log(myObj);
        var Messagebox = document.getElementById("Messagebox");
        Messagebox.innerHTML = '';
        // console.log("the lenght is"+myObj.length);
        var newId = myObj.length -1;
        //console.log(myObj[newId].id);
        //console.log("object length"+myObj.length);
        if(myObj.length == undefined){
            Messagebox.innerHTML +='<h2 class="text-center">Say hi to start conversation</h2>';
        }
        
        if(myObj.length != undefined){
            var newId = myObj.length -1;
            last_message_id =  (myObj[newId].id);
        
        for (let index = 0; index < myObj.length; index++) {
            //console.log(myObj[index].id)
            var  conversation_id = myObj[index].conversation_id
            var id = myObj[index].id;
            var message = myObj[index].message;
            var seen = myObj[index].message;
            var timestamp = myObj[index].timestamp;
            var user_from = myObj[index].user_from;
            var user_to = myObj[index].user_to;
            
            var hasTest = message.includes("Image::");
            if(hasTest == true){
                var image = message.replace("Image::","");
                message = '<a data-fancybox="gallery" href="#" data-src="uploads/'+image+'"><img  src="uploads/'+image+'" class="img-fluid" /></a>';
            }
            var timeAgo = time_ago(timestamp);
            if(user_from == userId){
                Messagebox.innerHTML += '<li class="list-group-item msgbox">'+
                '<div id="'+id+'" class="msgText msgright" style="padding:10px;position: relative;border: 1px solid #e2e0e0";>'+
                                        '<div class="msg"><div class="preWrap">'+message+'</div></div>'+
                                        '<div class="secondary-text mt-1" title=" '+timestamp+' ">'+timeAgo+' </div>'+
                                        '<a class="DeleteMsg delete-msg  text-danger fst-italic mt-1" id="'+id+'">delete </a>'+
                                    '</div>'+
                                '</li>';
            }else{
                Messagebox.innerHTML += '<li class="list-group-item msgbox">'+
                '<div id="'+id+'" class="msgText msgleft" style="max-width: 80%;padding: 10px;display: block;position: relative;border: 1px solid #cecece";>'+
                    '<div class="msg"><div class="preWrap">'+message+'</div></div>'+
                        '<span class="secondary-text mt-1" title=" '+timestamp+' ">'+timeAgo+' </span>'+
                    '</div>'+
                '</li>';
            }
        }
        }
    }else{
        console.log('ERROR IN SHOWING MESSAGE');
    }

    deleteMessage();
}

function getNewMessages(){
    if(conversation_id){
        
        if(last_message_id){
            $.ajax({
                type:"POST",
                url: "api/get_new_message.php",
                data:{conversation_id:conversation_id, last_message_id:last_message_id},
                success: function(data){ 
                    console.log(data);
                    //console.log("lenght"+JSON.parse(data).length);
                    if(JSON.parse(data).length != undefined){
                    //userMessages.push(data);
                        var obj = JSON.parse(userMessages);
                        var NewObj = JSON.parse(data);
                        for (let index = 0; index < NewObj.length; index++) {
                            obj.push(NewObj[index]);
                        }
                        
                        //back object mode
                        userMessages = JSON.stringify(obj);
                        
                        scrollSmoothlyToBottom('scrollingComponent');
                    
                    //console.log("ALL MESSAGES"+userMessages);
                     showMessages();
                    }
                   
                },
                error: function(){
                    alert("There was an error.");
                }
            });

        }else{
            GetMessages(); //get messages
        }

    }else{
        console.log("STATUS::ANATHER USER NOT SELECTED");
    }

    setTimeout(getNewMessages, 5000);
}



//$("#messenger-text").val($("#messenger-text").val() + 'temp_string'); 
//Helpful for working with emojis


// navigator.geolocation.getCurrentPosition(function(location) {
//     console.log(location.coords.latitude);
//     console.log(location.coords.longitude);
//     console.log(location.coords.accuracy);
//   });

//   getLocation();
//   function getLocation() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition);
//     } else {
//         console.log("Geolocation is not supported by this browser.");
//     }
// }
// function showPosition(position) {
//     console.log("Latitude: " + position.coords.latitude + 
//     "<br>Longitude: " + position.coords.longitude); 
// }


//Sending Multimedia Message

var imageUpload = document.getElementById("send_image");
// display file name if file has been selected
imageUpload.onchange = function() {
  var input = this.files[0];
  var formData = new FormData()
  formData.append('userImage', input)
    if (input) {
        console.log(input);
        $.ajax({
            type:"POST",
            url: "upload.php",
            data:formData,
            processData: false,
            contentType:false,
            success: function(data){ 
                console.log("Image::"+data);
                //saveTODB
                SendMessage(picture = "Image::"+data)
            },
            error: function(){
                alert("There was an error.");
            }
        });
        
    } else {
        //console.log("Please select a file");
}
};







// FancyBox to show media 
Fancybox.bind('[data-fancybox="gallery"]', {
    infinite: false
});

//Deleting Message







}); //End of on Ready



