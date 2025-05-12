function addPerson(){
    fornavn=document.getElementById("fornavn").value
    etternavn=document.getElementById("etternavn").value
    alder=document.getElementById("alder").value
    alder=parseInt(alder)
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost:8080/", true);
    jsonPerson = JSON.stringify({"fornavn" : fornavn, "etternavn" : etternavn, "age" : alder})
    console.log(jsonPerson)
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.send(jsonPerson);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 201) {
            console.log("Person lagt til!!")
        }else {
            console.log(`Error: ${xhr.status}`);
          }
    }
}

function addPeople(){
    mengdeFolk=document.getElementById("MengdeFolk").value
    mengdeFolk=parseInt(mengdeFolk)
    for(i=0; i<mengdeFolk; i++){
        addPerson()
    }
}