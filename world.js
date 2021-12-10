window.onload = function() {

  var  country = document.getElementById('country');
  var  lookup = document.getElementById('lookup');
  var  query = document.getElementById('cities');
  var results = document.getElementById('results');

  lookup.click(function(event) { 
        event.preventDefault();
        console.log("Clicked");
        httpRequest= new XMLHttpRequest();
        httpRequest.onreadystatechange=Recall;
        httpRequest.open('GET',url);
        httpRequest.send();
        var search = country.value
        var url =  search + "http://localhost/info2180-lab5/world.php?country="; 
       
        console.log(url);
    });

    query.click(function(event) { 
        event.preventDefault();
        console.log("Clicked");
        httpRequest= new XMLHttpRequest();
        httpRequest.onreadystatechange=Recall;
        httpRequest.open('GET',url);
        httpRequest.send();
        var search = country.value
        var context = "&context=cities";
        var url = search + context + "http://localhost/info2180-lab5/world.php?country=" ; 
       
        console.log(url);
    });
    const Recall=()=>{
        country.value = '';
        if (httpReq.readyState === XMLHttpRequest.DONE) {
          if (httpReq.status === 200) {
            const answer = httpReq.responseText;
            results.innerHTML=answer;
          } else {

            alert('There was a problem with the request.');
          }
        }
      }
    
    }