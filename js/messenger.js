$( document ).ready(function() {
    console.log( "ready!" );
    let userList = [];
    var userMessages = [];
    var userId = '';
    var user_two = '';
    var conversation_id = '';
    var last_message_id = '';
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
            console.log(userList);
            
            
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
                    var secText = online == 1 ? 'Active now' : last_login == '' ? register_on : last_login ;
                    //var UI_user_list = document.getElementById("UserList");
                    UI_user_list.innerHTML += '<a href="#" id="'+id+'" data-id="'+id+'"  class="UserInList list-group-item list-group-item-action">'+
                                                '<div class="container">'+
                                                '<div class="row">'+
                                                '<div class="col-3 position-relative" style="padding: 0;text-align: center;">'+
                                                '<div>'+
                                                '<img src="usericons/'+profile_pic+'" class="img-fluid " style="width: 80%;"/>'+
                                                '<span class="position-absolute bottom-0  translate-middle p-2 bg-'+ badge +' border border-light rounded-circle" style="border: 3px solid #fff !important;">'+
                                                '<span class="visually-hidden">New alerts</span>'+
                                                '</span>'+
                                                '</div>'+
                                                '</div>'+
                                                '<div class="col-9" style="padding: 10px;">'+
                                                '<p style="margin: 0;">'+full_name+'</p>'+
                                                '<span class="text-secondary" style="font-size: 14px;">'+secText+'</span>'+
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
    
    
function GetAnatherUser(){
    $('.UserInList').click(function(){
        user_two = this.id;
        ShowProfileOfUser();
        GetConversationId();
        //setTimeout(showUsers, 1000);   
         //alert(this.id);
        if ($( ".UserInList" ).hasClass('active')) {
            $( ".UserInList" ).removeClass( 'active');
        } else {
          $( "#"+this.id ).addClass( 'active');
        }

        return false;

    });
    // document.getElementById ("UserInList").addEventListener ("click", myFunction, false);

    // function myFunction() {
    // alert("Hello! I am an alert box!!");
    // }

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
                    console.log(data);
                    conversation_id = data;
                    console.log(conversation_id);

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
}

function GetMessages(){
    if(conversation_id){
        $.ajax({
            type:"POST",
            url: "api/get_messages.php",
            data:{conversation_id:conversation_id},
            success: function(data){ 
                console.log(data);
                userMessages = data;
                var count = JSON.parse(data);
                console.log("lenght of msg"+count.length)
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
    SendMessage();
});

function submitOnEnter(event){
    if(event.which === 13){
       // event.target.form.dispatchEvent(new Event("submit", {cancelable: true}));
        event.preventDefault(); // Prevents the addition of a new line in the text field (not needed in a lot of cases)
        SendMessage();
    }
}

document.getElementById("messenger-text").addEventListener("keypress", submitOnEnter);

function SendMessage(){
    
    var input_msg = document.getElementById("messenger-text").value;
    document.getElementById("messenger-text").value = "";
    console.log(input_msg);
    // var userId 
    // var user_two 
    // var conversation_id 
    if(conversation_id && userId && user_two && input_msg != ''){
        $.ajax({
            type:"POST",
            url: "api/send_message.php",
            data:{ user_one: userId, user_two:user_two, conversation_id:conversation_id, message:input_msg},
            success: function(data){ 
                console.log(data);
                getNewMessages();
               
            },
            error: function(){
                alert("There was an error.");
            }
        });
    }else{
        console.log("ERROR WHILE SENDING MESSAGE");
    }
}

function ShowProfileOfUser(){
    if(!userList){
        console.log("ERROR WHILE SETTING NAME");
    }
    const myObj = JSON.parse(userList);
    console.log(myObj[0].id);
    var UserProfileName = document.getElementById("User_two_details");
    UserProfileName.innerHTML = '';
    for (let index = 0; index < myObj.length; index++) {
        var id = myObj[index].id;
        if(user_two == id){
            console.log('user 2 is'+ user_two);
            var full_name = myObj[index].full_name;
            UserProfileName.innerHTML += full_name.toUpperCase();
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
        console.log(myObj[newId].id);
        if(myObj.length == undefined){
            Messagebox.innerHTML +='<h2 class="text-center">Say hi to start conversation</h2>';
            return false;
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
            if(user_from == userId){
                Messagebox.innerHTML += '<li class="list-group-item msgbox">'+
                '<div id="'+id+'" class="msgText msgright" style="padding:10px;position: relative;border: 1px solid #e2e0e0";>'+
                                        '<div class="msg">'+message+'</div>'+
                                        '<div class="timing">'+timestamp+' </div>'+
                                    '</div>'+
                                '</li>';
            }else{
                Messagebox.innerHTML += '<li class="list-group-item msgbox">'+
                '<div id="'+id+'" class="msgText msgleft" style="max-width: 80%;padding: 10px;display: block;position: relative;border: 1px solid #cecece";>'+
                    '<div class="msg">'+message+'</div>'+
                        '<span class="timing">'+timestamp+' </span>'+
                    '</div>'+
                '</li>';
            }
        }
        }
    }else{
        console.log('ERROR IN SHOWING MESSAGE');
    }
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
                    console.log("lenght"+JSON.parse(data).length);
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
        console.log("ERROR::AT NEW MSG")
    }

    setTimeout(getNewMessages, 5000);
}

}); //End of on Ready



