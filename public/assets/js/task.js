var root = document.location.origin+"/cse318";
assignedList = document.querySelector(".assigned-user-list");
cat_id = $('input[name="cat"]').val();
incoming_id = null;
ref = window.location.href;

$(document).ready(function () {
  searchUser();
});

//Load DOM on page load
$(document).ready(function() {
  getAssignedUserList();
});

/**
 * 
 * User Search From Databse
 * 
 */
function searchUser(){
  $("#user_search").on("keyup", function () {
    var search_term = $(this).val();

    $.ajax({
      url: root + "/ajax/user-search.php",
      type: "POST",
      data: {search:search_term},
      success:function(data){
        $(".user-search-list").html(data);
      }
    });
  });
}

//Assigend user
function setPresident( user_id ){
  var checkBoxUser = document.getElementById( user_id );

  //Send AJAX Request
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/set-president.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        console.log("Checked " + user_id);
        getAssignedUserList();
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("user_id=" + user_id + "&category_id=" + cat_id + "&status=" + true);
}

//De Assigend user
function deassignedUser( user_id ){
  var checkBoxUser = document.getElementById( user_id );

  //Send AJAX Request
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/set-president.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        console.log("UnChecked " + user_id);
        getAssignedUserList();
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("user_id=" + user_id + "&category_id=" + cat_id + "&status=" + false);
}

//Get Assigned User List
function getAssignedUserList(){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", root + "/ajax/get-assigned-user.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        assignedList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("category_id="+cat_id);
}


$(document).ready(function (e) {
  $("#add-file").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url:  root + "/ajax/file-upload.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
        console.log(data);
      },
      error: function(e) 
      {
        console.log(e);
      }
    });
  }));
});