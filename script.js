
// возвращает cookie с именем name, если есть, если нет, то undefined
/*
if(getCookie("failedLogin")){
  $(".menu>li").css("background","red");
  $(".modal1").css("display","block");
  $(".form-group").eq(3).append(`<small >Логин и/или пароль не верны </small >`);
}*/
//alert(getCookie("failedLogin"));
/*function deleteCookie( name ) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }
  */

  function deleteCookie(name, path, domain) 
  {
    if (getCookie(name)) {
    document.cookie = name + "=" +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }

  }

  function deleteLoginTaken ( ){
  if( getCookie("LoginTaken")){
  deleteCookie("LoginTaken","/","localhost");
  }
}
function deleteInvalidePassworld ( ){
 if(getCookie("InvalidePassworld")){
  deleteCookie("InvalidePassworld","/","localhost");
 }
}
function deleteEmailTaken ( ){
 if(getCookie("EmailTaken")){
  deleteCookie("EmailTaken","/","localhost");
 }
}
function deleteEmailLoginTaken( ){
 if(getCookie("EmailLoginTaken")){
  deleteCookie("EmailLoginTaken","/","localhost");
 }
}
function deleteFailedLogin( ){
    if(getCookie("failedLogin")){
     deleteCookie("failedLogin","/","localhost");
    }
   }
   function deleteTelTaken( ){
    if(getCookie("TelTaken")){
     deleteCookie("TelTaken","/","localhost");
    }
   }
   function deleteTelEmailLoginTaken( ){
    if(getCookie("TelEmailLoginTaken")){
     deleteCookie("TelEmailLoginTaken","/","localhost");
    }
   }
   function deleteTelLoginTaken( ){
    if(getCookie("TelLoginTaken")){
     deleteCookie("TelLoginTaken","/","localhost");
    }
   }
   function deleteEmailTelTaken( ){
    if(getCookie("EmailTelTaken")){
     deleteCookie("EmailTelTaken","/","localhost");
    }
   }
   function getCookie1(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
      offset = cookie.indexOf(search);
      if (offset != -1) {
        offset += search.length;
        end = cookie.indexOf(";", offset)
        if (end == -1) {
          end = cookie.length;
        }
        setStr = unescape(cookie.substring(offset, end));
      }
    }
    return(setStr);
  }
  function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function getCookie2(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

 
function failedRegistration (){
if( getCookie("LoginTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(4).append(`<small >Логин не совпадает</small >`);
    deleteLoginTaken ();
}
if( getCookie("InvalidePassworld")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(5).append(`<small >Пароль не совпадает</small >`);
    deleteInvalidePassworld ( );
    //form-text text-muted  
}
if( getCookie("EmailTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(1).append(`<small >Эмайл уже используется</small >`);
    deleteEmailTaken ( );
}
if( getCookie("EmailLoginTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","action/registration");
    $(".form-group").eq(4).append(`<small >Логин не совпадает</small >`);
    $(".form-group").eq(1).append(`<small >Эмайл уже используется</small >`);
    deleteEmailLoginTaken( );
}

if( getCookie("TelTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(2).append(`<small >Телефон уже используется</small >`);
  //  $(".form-group").eq(1).append(`<small >Эмайл уже используется</small >`);
  deleteTelTaken( );
}
if( getCookie("TelEmailLoginTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(2).append(`<small >Телефон уже используется</small >`);
    $(".form-group").eq(4).append(`<small >Логин не совпадает</small >`);
   $(".form-group").eq(1).append(`<small >Эмайл уже используется</small >`);
  deleteTelEmailLoginTaken( );
}
if( getCookie("TelLoginTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(2).append(`<small >Телефон уже используется</small >`);
    $(".form-group").eq(4).append(`<small >Логин не совпадает</small >`);
 
  deleteTelLoginTaken( );
}
if( getCookie("EmailTelTaken")){
    $(".modal1").css("display","block");
    $(".form-group.registration").css("display","block");
    $("form").prop("action","/template/main/registration");
    $(".form-group").eq(2).append(`<small >Телефон уже используется</small >`);
   
    $(".form-group").eq(1).append(`<small >Эмайл уже используется</small >`);
  deleteEmailtelTaken( );
}


if( getCookie("failedLogin")){
    $(".modal1").css("display","block");
    $(".form-group").eq(4).append(`<small >Логин и/или пароль не верны </small >`);
    deleteFailedLogin( );
}






}

failedRegistration ();


/*$(".form-group.registration").css("display","none");*/
$(".row button[type=button].btn.btn-primary.login-button").on("click",function(){
//alert("hello");
//event.preventDefault();
$(".form-group.registration").css("display","block");
$("form").prop("action","/template/main/registration");
$('#name').prop('required',true);
$('#exampleInputEmail1').prop('required',true);
$('#surname').prop('required',true);
//$('#login').prop('required',true);
//$('#exampleInputPassword1').prop('required',true);
$('#exampleInputReapetPassword1').prop('required',true);
//$('#exampleCheck1').prop('required',true);
alert($("form").attr("action"));




});
$(".row button[type=button].btn.btn-primary.submit-button").on("click",function( ){
    //alert("hello");
    //event.preventDefault();
    $(".form-group.registration").css("display","none");
    $("form").prop("action","/template/main/login");
    alert($("form").attr("action"));
    $('#name').prop('required',false);
$('#exampleInputEmail1').prop('required',false);
$('#surname').prop('required',false);
//$('#login').prop('required',false);
//$('#exampleInputPassword1').prop('required',true);
$('#exampleInputReapetPassword1').prop('required',false);
//$('#exampleCheck1').prop('required',false);
    
    
    });
/*$("form:not()").on("click",function(){
    alert("hello");
    
    
    
    });*/
    $(".modal1").on("click",function(event){
        if(event.target.className==="modal1 a"){
            $(".modal1").css("display","none");
        }
        
        
        
        });
        $(".close").on("click",function(){
            
                $(".modal1").css("display","none");
            
            
            
            
            });

            $("ul.menu li span").on("click",function(){
                $(".form-group.registration").css("display","none");
                $(".modal1").css("display","block");
            
            
            
            
            });