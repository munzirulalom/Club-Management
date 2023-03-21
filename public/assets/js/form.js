var root = document.location.origin+"/cse318";
projectList = document.querySelector(".task-project-list");
notificationList = document.querySelector(".notification-list");
incoming_id = null;

$(document).ready(function () {
  addClub();
});

//Load DOM on page load
$(document).ready(function() {
  getClubList();
  getNotification();
});


/**
* 
* Add New Project to Database
* 
*/
function addClub(){
  $("#add-club").submit(function (event) {
    var formData = {
      club_name: $("#club_name").val(),
      club_description: $("#club_description").val(),
    };

    $.ajax({
      type: "POST",
      url: root + "/ajax/add-club.php",
      data: formData,
      // dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
      $("#add-club").trigger("reset");
      getClubList();

    });

    event.preventDefault();
  });
}

//Get Project List
function getClubList(){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/get-club.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        projectList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id="+incoming_id);
}

function deleteClub( club_id ){
  if (confirm("Are you sure? You want to delete this club? It also delete all the related event and other informations.")) {
    
    //Send AJAX Request
    let xhr = new XMLHttpRequest();
    xhr.open("POST", root + "/ajax/delete-club.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          location.reload(true);
        }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("club_id=" + club_id + "&status=" + true);
  } else {
    console.log("Cancel!");
  }
}

function joinClub( club_id ){
  if (confirm("Are you sure? You want to join this club?")) {
    
    //Send AJAX Request
    let xhr = new XMLHttpRequest();
    xhr.open("POST", root + "/ajax/join-club.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          location.reload(true);
        }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("club_id=" + club_id + "&status=" + true);
  } else {
    console.log("Cancel!");
  }
}

function leaveClub( club_id ){
  if (confirm("Are you sure? You want to leave from this club?")) {
    
    //Send AJAX Request
    let xhr = new XMLHttpRequest();
    xhr.open("POST", root + "/ajax/leave-club.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          location.reload(true);
        }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("club_id=" + club_id + "&status=" + true);
  } else {
    console.log("Cancel!");
  }
}

function updateUserRole( role_id, user_id, club_id ){
  //Send AJAX Request
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/update-user-role.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        location.reload(true);
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("role_id=" + role_id + "&user_id=" + user_id + "&club_id=" + club_id);
}

//Get Project List
function getNotification(){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/get-notification.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        notificationList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
}

/**
 * 
 * Auto Server Request
 * 
 */

setInterval(getClubList, 60000);
setInterval(getNotification, 15000);