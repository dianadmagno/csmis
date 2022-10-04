<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


</head>

<body>

  <header id="header">
    <center><p id="font1">By 2028, a world-class Army that is a source of national pride.</p></center>
 </header>
 
 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
     
          <tr> 
             <td rowspan = "4" style="text-align:center;"><img src="https://i.ibb.co/z6BGzN6/imtc-removebg-preview.png" width="100" height="100" /></td>
             <td rowspan = "4" style="text-align:center;">
                 <p style="text-align:center;">
                 <b>SCHOOL FOR CANDIDATE SOLDIER</b>
                 <br>INITIAL MILITARY TRAINING CENTER (P) </b>
                 <br>TRAINING AND DOCTRINE COMMAND, PHILIPPINE ARMY
                 <br><i>Camp O’Donnell, Sta. Lucia, Capas, Tarlac</i></p><br></td>
                 <td rowspan = "4" style="text-align:center;"><img src="https://i.ibb.co/VD27cBt/scs.png" width="100" height="100" /></td>
             
          </tr>
     
        
         
       </table>
       <p style="text-align:center;"><b>List of Class</b></p><br>

    <table border="1" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th>Class</th>
                <th>Class Name</th>
                <th>No. of Students</th>
                <th>Graduation Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr align="center">
                     <td>{{ $class->description }}</td>
                     <td>{{ $class->alias }}</td>
                     <td>{{ count($class->studentClasses) > 0 ? count($class->studentClasses) : '' }}</td>
                     @if($class->graduation_date == null)
                     <td>No Available Date Yet</td>
                     @else
                     <td>{{ $class->graduation_date }}</td>
                     @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
 


<style type="text/css">
  #font1 {
     font-style: italic;
    
  }
  p.solid {border-style: solid;}

  #header {
     position: fixed;
     top: -30;
     width: 100%;
     height: 100px;
  }

  #footer {
     position: fixed;
     bottom: 0;
     width: 100%;
     height: 50px;
  }

  .left{         
     text-align:left;
     float:left;
  }
  .right{
     float:right;
     text-align:right;
  }
  .centered{
     text-align:center;
     font-style: italic;
     font-family: arial;
  }
  #imgfooter{
     position: fixed;
     bottom:5;
     width:130;
  }
  #txtfooter{
     position: fixed;
     bottom:-8;
     font-style: italic
  }
  body{
     margin-top:20px;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 13.1px;
  }     

</style>