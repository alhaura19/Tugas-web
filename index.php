<!-- Nama : Latifah Alhaura
      NIM : 09021181320022 -->

<!DOCTYPE html>
<html>
  <head>
    <title>Tugas Proweb</title>
    <link rel="stylesheet" href="mystyle.css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  </head>

  <body>
    <div id="wrapper">
      <div id="header">
        <table border="0" cellspacing="0">
          <tr>
              <td width="1700">
                <h1>Header</h1>
              </td>
              <td width="250">
                <center>
                  <form>
                    <select style="height:35px; width:80%">
                      <option>Latifah Al Haura</option>
                      <option>Profil</option>
                      <option>Keluar</option>
                    </select>
                  </form>
                </center>
              </td>
            </tr>
         <!--<td width="10%" height="21px">
              <input type="text" >

          </td>-->
        </table>
      </div>

          <table height: "100%" width: "100%" margin: "0px" padding: "0px">
            <tr>
              <td class="menu" id='menu_students'><label>Students </label></td> 
              <td class="menu" id='menu2'><label>Menu 2 </label></td> 
              <td class="menu" id='menu3'><label>Menu 3 </label></td> 
              <td class="menu" id='menu4'><label>Menu 4 </label></td> 
              <td class="menu" id='menu5'><label>Menu 5 </label></td> 
              <td class="menu" id='menu6'><label>Menu 6 </label></td> 
            </tr>
          </table>
          
      
      <div id="content">
          
      </div>

      <div id="footer"><b>Footer</b></div>
    </div>

  </body>
 
  <script>
    $('#menu_students').click(function(){
      $.ajax({
        url: "menu_students.php"
      }).done(function( msg ){
          $( "#content" ).html( msg );
      });
    });
  </script>

  <script>
    $('#menu2').click(function(){
      $.ajax({
        url: "menu2.html"
      }).done(function( msg ){
          $( "#content" ).html( msg );
      });
    });
  </script>

  <script>
    $('#menu3').click(function(){
      $.ajax({
        url: "menu3.html"
      }).done(function( msg ){
          $( "#content" ).html( msg );
      });
    });
  </script>
</html>
