<!DOCTYPE html>

		<html lang="en">
		
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="icon" href="" type="image/png">
			<title>Search Flight</title>
			<link rel="stylesheet" href="style.css" />			
		</head>
		<body>	
            <header>
                <h1>Start Your Journey</h1>
                <h2>Compare hundreds travel websites at once </h2>
            </header>
            <section class="search">
                <div class="d1">
                    <form method="GET" id="search_flight" name="search_flight" class="search_flight" action="">
                        <p>Enter Details to Search Flight</p>
                        <b>Departure City</b>
                        <input list="lcities" type="text" name="lcity" placeholder="" onkeyup="typehint()" />
                        <datalist id="lcities">
                        </datalist>
                        <b>Destination City</b>
                        <input type="text" name="dcity" list="dcities" onkeyup="typehintd()"  />
                        <datalist id="dcities">
                        </datalist>
                        <b>Departure Date</b>
                        <input type="date" name="ddate" min="" id="mind" onchange="dd()" />
                        <script> 
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1;
                        var yyyy = today.getFullYear();
                        if(dd<10){
                                dd='0'+dd
                            } 
                            if(mm<10){
                                mm='0'+mm
                            } 

                        today = yyyy+'-'+mm+'-'+dd;
                        document.getElementById("mind").setAttribute("min", today);
                        </script>
                        <b>Return Date</b>
                        <script> 
                        function dd() {
                        var dd  = document.forms["search_flight"]["ddate"].value;
                        document.getElementById("minr").setAttribute("min", dd);
                        }
                        </script>
                        <input type="date" name="rdate" id="minr" />
                        <b>Number of Passengers</b>
                        <input type="number" name="Ag" max="9" placeholder="Adults ( > 12 yrs Old)"  />
                        <input type="number" name="Cg" placeholder="Children (2 - 12 yrs Old)" />
                        <input type="number" name="Ig" placeholder="Infants ( 0 - 2 yrs Old)" />
                        <b>Carbin Class</b> 
                        <label class="carbin">
                            <input type="radio" name="cabin" value="First"  class="hin"  /><span></span> First Class
                            <input type="radio" name="cabin" value="Economy"  class="hin"  /><span></span> Economy
                            <input type="radio" name="cabin" value="Premium"  class="hin"  /> <span></span> Premium
                            <input type="radio" name="cabin" value="Business"  class="hin"  /> <span></span> Business
                            <input type="radio" name="cabin" value="All"  class="hin"  /><span></span>  All <br />
                        </label>
                        <a href="#tr" onclick="search_btn()">Search</a>
                    </form>
                </div>
                <div  id="tr">
                    <h3 id="sr1"> </h3>
                    <div id="search_conn">
                        <img src="gifspin.gif" style="width:30%; display:block; margin:auto;" />
                    </div>
                    <table id="search_con">
                        <tr style="position:sticky;top:0;">
                            <th colspan="2"> Departure </th>
                            <th colspan="2"> Arrival </th>
                            <th> Airline </th>
                            <th> Cost </th>
                        </tr>
                        <tr style="position:sticky;top:20px;background:skyblue;color:black;text-align:center;">
                            <td> Date, Time </td>
                            <td> Airport Name </td>
                            <td> Date, Time </td>
                            <td> Airport Name </td>
                            <td> Airline / Flight Number </td>
                            <td> Currency - Amount </td>
                        <tr>
                    </table>
                </div>
            </section>

		<script src="script.js"></script>
		</body>
	</html>