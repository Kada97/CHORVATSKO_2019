//FUNKCE GO přesměruje na daný obsah ze SELECT menu
// FUNKCE SETJSACTIVE nastaví proměnnou na jedna, pokud element existuje
// checkDB je AJAX pokud v databázi existují záznamy vráti ihned error
// validace na submit, validuje se heslo, a email
function go(){
    document.homeNav.submit();
    //console.log(document.homeNav.homeOption.options[document.homeNav.homeOption.selectedIndex].value);
    
//    var e = document.getElementById("mobileOptions");
//    var temp = e.options[e.selectedIndex].value;
//    console.log(temp);
//    if(temp=="LOGOUT"){closeTab();}
//    
}

function setJsActive() {
    document.getElementById("jsActive").value = 1;
}

function closeTab(){
    window.close();
}

////////////
//AJAX
////////////


    function checkDB(value, name) {
        if (value.length === 0) {
            document.getElementById("errorDiv").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("errorDiv").innerHTML += this.responseText;
                }
            };
            value = value.replace(/#/g, "%23");
            var column = "ID";
            var errorMsg = "error";
            switch (name) {
                    case "nick":            column = "NICK";        errorMsg = "username";  break;
                    case "password":        column = "PASSWORD";    break;
                    case "passwordCheck":   column = "PASSWORD";    break;

            }
            if (column === "PASSWORD") {
                document.querySelector("#pswO").addEventListener("blur", validatePasswords);
                document.querySelector("#pswC").addEventListener("blur", validatePasswords);
                validatePasswords();
            } else {

                xmlhttp.open("GET", "ajaxRequests.php?value=" + value + "&tablename=users&datafrom=" + column + "&errorMsg=" + errorMsg, true);
                xmlhttp.send();
            }
        }
    }
    
    var validatePasswords = function (e) {
        var pswdO       = document.querySelector("#pswO");
        var pswdC      = document.querySelector("#pswC");
        var errorMsg    = document.querySelector("#errorDiv");
        pswdO.classList.remove("pswdNotMatchRegistration");
        pswdC.classList.remove("pswdNotMatchRegistration");
        pswdO.classList.remove("pswdMatchRegistration");
        pswdC.classList.remove("pswdMatchRegistration");
        errorMsg.innerHTML = "";
        if(pswdC.value.length > 0){
            if(pswdO.value !== pswdC.value) {
                
                pswdO.classList.add("pswdNotMatchRegistration");
                pswdC.classList.add("pswdNotMatchRegistration");
                errorMsg.innerHTML = "Hesla se neshodují!";
            }
            else {
                pswdO.classList.add("pswdMatchRegistration");
                pswdC.classList.add("pswdMatchRegistration");
            }
        }

    };

    var form = document.querySelector("#registerMajorForm");
    var pswdO = document.querySelector("#pswO");
    var pswdC = document.querySelector("#pswC");

    pswdO.addEventListener("blur",validatePasswords);
    pswdC.addEventListener("blur",validatePasswords);

    form.addEventListener("submit",function (e) {
        validateEmail(e);
        validatePasswords(e);
    });





