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
       @if($report == 1)
       
       @elseif($report == 10)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By Sex</b></p><br>
       @elseif($report == 9)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By Region</b></p><br>
       @elseif($report == 8)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By License</b></p><br>
       @elseif($report == 3)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By Ethnic Group</b></p><br>
       @elseif($report == 4)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By Highest Educational Attainment</b></p><br>
       @elseif($report == 6)
       <p style="text-align:center;"><b>Reports of {{ $className->description }} By Blood Type</b></p><br> 
       @elseif($report == 11)
       <p style="text-align:center;"><b>List of Students of {{ $className->description }}</b></p><br>
       @elseif($report == 12)
       <p style="text-align:center;"><b>Count of students per class</b></p><br>
       @endif

    <table border="1" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead>
            <tr>
               @if($report == 1)
               <th>Vaccine Name</th>
               <th>Total</th>
               @elseif($report == 10)
               <th>Gender</th>
               <th>Total</th>
               @elseif($report == 9)
               <th>Region</th>
               <th>Region Name</th>
               <th>Total</th>
               @elseif($report == 8)
               <th>License</th>
               <th>Total</th>
               @elseif($report == 3)
               <th>Ethnic Name</th>
               <th>Ethnic Description</th>
               <th>Total</th>
               @elseif($report == 4)
               <th>Highest Educational Attainment</th>
               <th>Total</th>
               @elseif($report == 6)
               <th>Blood Type</th>
               <th>Total</th>   
               @elseif($report == 11)
               <th>Rank</th>
               <th>Last Name</th>
               <th>First Name</th>
               <th>Middle Name</th>
               <th>Mobile Number</th>
               <th>Email</th>
               @elseif($report == 12)
               <th>Class</th>
               <th>Total</th>
               @elseif($report == 13)
               <th>Nr</th>
               <th>Rank</th>
               <th>Last Name</th>
               <th>First Name</th>
               <th>Middle Name</th>
               <th>GWA</th>
               @elseif($report == 14)
               <th>Nr</th>
               <th>Rank</th>
               <th>Last Name</th>
               <th>First Name</th>
               <th>Middle Name</th>
               <th>Mobile Number</th>
               <th>Email</th>
               <th>Remarks</th>
              
               @endif
                
               
            </tr>
        </thead>
         @if($report == 1||$report == 2||$report == 3||$report == 4||$report == 5||$report == 6||$report == 7||$report == 8||$report == 9||$report == 10)
            <tbody>
                  @foreach ($data as $key => $e)
                     <tr align="center">
                        @foreach($e as $new)
                        <td>{{ $new }}</td>
                     @endforeach
                        
                     </tr>
                  @endforeach
            </tbody>
         @elseif($report == 11)
         <tbody>
            @foreach($data as $key => $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->lastname }}</td>
                    <td>{{ $d->firstname }}</td>
                    <td>{{ $d->middlename }}</td>
                    <td>{{ $d->mobile_number }}</td>
                    <td>{{ $d->email }}</td>
                </tr>
            @endforeach
        </tbody>
        @elseif($report == 13)
        <tbody>
               @foreach($data as $key => $d)
                  <tr>
                     <td>{{ $key+1 }}</td>
                     <td>{{ $d->name }}</td>
                     <td>{{ $d->lastname }}</td>
                     <td>{{ $d->firstname }}</td>
                     <td>{{ $d->middlename }}</td>
                     <td>{{ $d->gwa }}</td>
                  </tr>
               @endforeach
         </tbody>
         @elseif($report == 14)
         <tbody>
            @foreach($data as $key => $d)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->lastname }}</td>
                    <td>{{ $d->firstname }}</td>
                    <td>{{ $d->middlename }}</td>
                    <td>{{ $d->mobile_number }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->termination_remarks }}</td>
                </tr>
            @endforeach
         </tbody>
         @endif
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