    function typehint(){
        var lcity = document.forms["search_flight"]["lcity"].value;
        if(lcity.length  >= 3){
            var hr = new XMLHttpRequest();
            hr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("lcities").innerHTML = this.responseText;
                }
            }
            hr.open("POST", "city.php", true);
            hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var vars ="p="+lcity;
            hr.send(vars);
        }
    }

    function typehintd(){
        var dcity = document.forms["search_flight"]["dcity"].value;
        if(dcity.length  >= 3){
            var hr = new XMLHttpRequest();
            hr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dcities").innerHTML = this.responseText;
                }
            }
            hr.open("POST", "city.php", true);
            hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var vars ="p="+dcity;
            hr.send(vars);
        }
    }

    function search_btn(){
        var lcity = document.forms["search_flight"]["lcity"].value;
        var lcity = lcity.substring(0, 3);
        var dcity = document.forms["search_flight"]["dcity"].value;
        var dcity = dcity.substring(0, 3);
        var ddate = document.forms["search_flight"]["ddate"].value;
        var rdate = document.forms["search_flight"]["rdate"].value;
        var ag = document.forms["search_flight"]["Ag"].value;
        var cg = document.forms["search_flight"]["Cg"].value;
        var ig = document.forms["search_flight"]["Ig"].value;
        var cabin = document.forms["search_flight"]["cabin"].value;
        document.getElementById("tr").style.visibility = "visible";
        document.getElementById("search_conn").style.display = "block";
        document.getElementById("search_con").style.display = "none";
        document.getElementById("sr1").style.display = "none";
        if (lcity === "" || dcity === "" || ddate === ""){
            var hr = new XMLHttpRequest();
            hr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("search_con").style.display = "none";
                    document.getElementById("sr1").style.display = "block";
                    document.getElementById("sr1").innerHTML = this.responseText;
                    document.getElementById("search_conn").style.display = "none";
                }
            }
            hr.open("POST", "server.php", true);
            hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var vars ="lcity="+lcity+"&dcity="+dcity+"&ddate="+ddate+"&rdate="+rdate+"&ag="+ag+"&cg="+cg+"&ig="+ig+"&cabin="+cabin;
            hr.send(vars);
        } else {
            var hr = new XMLHttpRequest();
            hr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sr1").style.display = "none";
                    document.getElementById("search_con").style.display = "block";
                    document.getElementById("search_con").innerHTML += this.responseText;
                    document.getElementById("search_conn").style.display = "none";
                }
            }
            hr.open("POST", "server.php", true);
            hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var vars ="lcity="+lcity+"&dcity="+dcity+"&ddate="+ddate+"&rdate="+rdate+"&ag="+ag+"&cg="+cg+"&ig="+ig+"&cabin="+cabin;
            hr.send(vars);
        }
    }