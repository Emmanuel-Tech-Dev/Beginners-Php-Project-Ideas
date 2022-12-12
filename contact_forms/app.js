const forms = document.querySelector("form"),
statusTxt = forms.querySelector(".status");


forms.onsubmit = (e) =>{
  e.preventDefault(); //Prevent form from submitting


  statusTxt.style.backgroundColor = "#bbe4c9";
  statusTxt.style.color = "#2d884d";
statusTxt.style.display = "block";

 let xhr = new XMLHttpRequest();
 xhr.open("POST" , "message.php" , true);

 xhr.onload = () =>{

    if(xhr.readyState == 4 && xhr.status == 200){

        let response = xhr.response ;

        if(response.indexOf("Email and message field is required!") !=-1 || response.indexOf("Enter a valid email address") || response.indexOf("Sorry , failed to send message")){

 statusTxt.style.backgroundColor = "#d2a4a6";
 statusTxt.style.color = "#b34045";
        }
        else{

           
            forms.reset();
            setTimeout(() =>{

                statusTxt.style.display = "none";
            } , 3000)
        }

         statusTxt.innerHTML= response;
    }

 }
let formData = new FormData(forms);
 xhr.send(formData);
}