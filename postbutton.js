
        function Toggle1(){
          var btnvar2 = document.getElementById("dislike");
          btnvar2.style.color="black";
            btnvar2.style.width="70px";

          var btnvar1 = document.getElementById("like");
          if(btnvar1.style.color=="blue")
          {
            btnvar1.style.color="black";
            btnvar1.style.width="70px";

          }
          else{
            btnvar1.style.color="blue";
            btnvar1.style.width="80px";
          }
        }
        function Toggle2(){
          var btnvar1 = document.getElementById("like");
          btnvar1.style.color="black";
            btnvar1.style.width="70px";
          var btnvar2 = document.getElementById("dislike");
          if(btnvar2.style.color=="red")
          {
            btnvar2.style.color="black";
            btnvar2.style.width="70px";

          }
          else{
            btnvar2.style.color="red";
            btnvar2.style.width="85px";
          }
        }
    