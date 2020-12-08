         document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector(
                  ".icon").style.display="none";
                document.querySelector( 
                  ".loader_bg").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  ".loader_bg").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible";
                  document.querySelector(
                    ".icon").style.display="block"; 
            } 
        }; 