const xhr = new XMLHttpRequest();
personArray = []
sendXHR(personArray)

function sendXHR(personArray){
const xhr = new XMLHttpRequest();
document.getElementById("formTable").innerHTML="<form><table class='formTable' id='formTable'><tr><th><p>Select:</p></th><th><p>Navn:</p></th><th><p>Alder</p></th></tr>"
xhr.open("GET", "http://localhost:8080/");
xhr.send();
xhr.responseType = "json";
xhr.onload = () => {
  if (xhr.readyState == 4 && xhr.status == 200) {
    const data = xhr.response;
    console.log(data);
    personArray=data
    
    formTable = document.getElementById("formTable")
    for(let i = 0;i<data.length; i++) {
       formTable.innerHTML+="<tr><td><input type='checkbox' name='Select' value='" + i +"'></input></td><td>"+data[i].fornavn + " " +data[i].etternavn+"</td><td> "+ data[i].age +" </td></tr>"
    }
    document.getElementById("formTable").innerHTML+="<input type='button' id='add' value='Add' onclick='nextPage(value)'></input><input type='button' id='edit' value='Edit' onclick='nextPage(value)'></input><input type='button' id='delete' onclick='deletePeople()'value='Delete'></input>"
  } else {
    console.log(`Error: ${xhr.status}`);
    document.getElementById("formTable").innerText= xhr.status
  }
}
}

function deletePeople(){

  console.log("Pressed Delete")
  CheckBoxes = document.getElementsByName("Select")
  CheckedBoxes=[]
  for(let i=0; i<CheckBoxes.length; i++){
    if(CheckBoxes[i].checked == true){
      CheckedBoxes.push(CheckBoxes[i].value)
    }
  }
  xhr.open("GET", "http://localhost:8080/");
  xhr.send();
  xhr.responseType = "json";
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const data = xhr.response;
      console.log(data)
      personArray=data
    } else {
      console.log(`Error: ${xhr.status}`);
      document.getElementById("formTable").innerText= xhr.status
    }
  };
  console.log(personArray)
  for(let i=0; i<CheckedBoxes.length; i++){
    const Delxhr = new XMLHttpRequest();
    url="http://localhost:8080/" +personArray[CheckedBoxes[i]].id
    console.log("trying to delete at " + url)
    Delxhr.open("DELETE", url, true);
    Delxhr.send()
    Delxhr.onload = () =>{
      console.log("Request Sent")
      if (Delxhr.status === 200) { 
        console.log("deleted at " + personArray[CheckedBoxes[i]].id)
        
      }else {
        console.log(`Error: ${Delxhr.status}`);
      }

    }
  }
  sendXHR(personArray)
}
function nextPage(buttonValue){
  console.log(buttonValue)
  if(buttonValue=="Add"){
    window.location.replace("addPerson.html")
  }
}