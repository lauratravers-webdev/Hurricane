// alert('hello');

axios.get('http://127.0.0.1:8000/api/users').then(function(response){

$.each(response.data, function( key, user ){
    // if(user.id!=currentLoggedInUserId){
        $(".followers-box").append(user.name);
    // }
});

    // console.log(response);

    // var followers = "";
    // $.each(response.data, function(key, value){
    //     $("#people-follow").append("" + user.name + " &nbdsp;<button follower_id>")
    //     follower = follower + user.name + "&nbsp;"
    // });


$('.followers-box button').click(function(){
    alert($(this).attr("follower_id"))
    
});

});




// $.get("http://127.0.0.1:8000/api/users", function(peopleFollow){
//
// followResults = "";
// $.each(peopleFollow.follow[0], function(key, value){
//     followResults = followResults + key + ": " + value + "<br>";
// });
//
//
// $('#people-follow').html(followResults);
//
// });
