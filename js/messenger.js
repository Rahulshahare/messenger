$( document ).ready(function() {
    console.log( "ready!" );
    let userList = [];
    var messages = '';
    var userId = '';
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
    
    //getting user details
    if(userId){
        //console.log('getting data');
        getUserDetails(userId);
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
        
    
    function showUsers(){
        if(userList){
            console.log(userList);
            
            
            const myObj = JSON.parse(userList);
            x = myObj.id;
            Object.entries(myObj).forEach(([key, value]) => {
                console.log(key , value); // key ,value
              });
              
            console.log(myObj[0]["id"]);

            
             
        }
    }
    
}); //End of on Ready