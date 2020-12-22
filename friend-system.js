var count=0;
var friend  =new Array();
var country = new Array();

var clickInsertBtn=0;
var clickDelBtn=0;

var content="";

function init(){
    
   friend=["Tin mai","Sandar","Yin","ko ko lwin","may thet"];
   country=["Myanamr","Myanmar","Singapore","thailand","USA"];
   
   
    
}

function insert(){
    
    var nameValue  = document.getElementById("friend_name").value;
    var countryValue   = document.getElementById("country_name").value;
    
    
    
    friend[friend.length]=nameValue;
    country[country.length]=countryValue;
    
    count++;
    
    alert("successfully inerted...");
    clickInsertBtn=1;
    
    clear();
    
}

function deleteFriend(index){
    
    
    //var delIndex=document.getElementById('delFriend').value;
    
    alert("del index"+index);
    alert("friend"+friend[index]);
    friend=friend.splice(index,index+1);
    country=country.splice(index,index+1);
     count--;
    show();
   
   
  
    
   
    
}

function clear(){
    
    document.getElementById("friend_name").value="";
    document.getElementById("country_name").value="";
    content="";
    
}

 function show() {
     
        
       
        
         if(clickInsertBtn==0){
             
             
             
             for(var i = 0; i < count; i++) {
                
               
            content +="<div class=well> Name : <span class=badge>"+ friend[i]+"</span>";
            content+="| Country: <span class=badge>"+country[i]+"</span>";
            content+="&nbsp;&nbsp;&nbsp;&nbsp;<button id=delFriend class=btn-danger";
            content+=" onClick='deleteFriend("+i+")' > remove </button></div>";
             
                
    
            }
            
             
             
         }       
         else{
        
       
            for(var i = 0; i < count; i++) {
                
               
              content +="<div class=well> Name : <span class=badge>"+ friend[i]+"</span>";
            content+="| Country: <span class=badge>"+country[i]+"</span>";
            content+="&nbsp;&nbsp;&nbsp;&nbsp;<button id=delFriend class=btn-danger";
            content+=" onClick='deleteFriend("+i+")' > remove </button></div>";
             
             
                
    
            }
            
            
        
         }
       
                      
        document.getElementById('display').innerHTML = content; 
        
        clear();
 }
