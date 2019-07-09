let flag =true;
$(document).on("scroll",function(){
     if (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) {
          // $("div.header >.menu-box").css("position","fixed"); 
           $("div.header >.menu-box").removeClass("menu-box-rel");
           $("div.header >.menu-box").addClass("styck-heder"); 
               $("div.header >.menu-box > .menu").addClass("translate-menu");
         $(".text").css("margin-top","300px"); 
       
         if(flag){
              flag = false;
         $(".menu-box").prepend(`<a href="index.html" style="">
                <img class="logo"  style="display: inline"; src="img/logo.png" alt="LOGO">
            </a`);
               $("div.header > a .logo").css("visibility","hidden");
     }
      // 
  }  
})