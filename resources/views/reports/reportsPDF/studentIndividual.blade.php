<!DOCTYPE html>
<html>
<head>
    <title>CSMIS</title>
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


    
    
         <link href='https://fonts.googleapis.com/css?family=Arial:400,300,700' rel='stylesheet' type='text/css'>

          <div class="container">
            <div class="header">
              <div class="section__title">Personal Information</div>
              <div class="full-name">
                <span class="first-name">{{$students[0]->firstname}} {{$students[0]->middlename}} </span> 
                <span class="first-name">{{$students[0]->lastname}}</span>
              </div>
              <div class="contact-info">
                <span class="email">Age: </span>
                <span class="email-val">{{$students[0]->age}}</span>
                <span class="separator"></span>
                <span class="email">Email: </span>
                <span class="email-val">{{$students[0]->email}}</span>
                <span class="separator"></span>
                <span class="phone">Phone: </span>
                <span class="phone-val">{{$students[0]->mobile_number}}</span>
              </div>
              <div class="contact-info">
                  <span class="email">Birthday: </span>
                  <span class="email-val">{{$students[0]->birthdate}}</span>
                  <span class="separator"></span>
                  <span class="phone">Serial Number: </span>
                  <span class="phone-val">{{$students[0]->serial_number}}</span>
                  <span class="separator"></span>
                  <span class="phone">Blood Type: </span>
                  <span class="phone-val">{{$students[0]->bloodType->name}}</span>
                </div>
              
              
              <div class="contact-info">
                <span class="email">Religion: </span>
                <span class="email-val">{{$students[0]->religion->description}}</span>
                <span class="separator"></span>
                <span class="phone">Sex: </span>
                @if ($students[0]->sex == 1) 
                <span class="phone-val">
                  Male
                </span>
                @else
                <span class="phone-val">
                  Female
                </span>
                @endif
                <span class="separator"></span>
                <span class="phone">Civil Status: </span>
                @if ($students[0]->civil_status == 1) 
                <span class="phone-val">
                  Single
                </span>
                @elseif ($students[0]->civil_status == 2)
                <span class="phone-val">
                  Married
                </span>
                @elseif ($students[0]->civil_status == 3)
                <span class="phone-val">
                  Widowed
                </span>
                @elseif ($students[0]->civil_status == 4)
                <span class="phone-val">
                  Separated
                </span>
                @elseif ($students[0]->civil_status == 5)
                <span class="phone-val">
                  Divorced
                </span>
                @endif
                
              </div>
              <div class="contact-info">
              
                <span class="phone">Highest Educational Attainment: </span>
                <span class="phone-val">{{$students[0]->educational_attatinment}}</span>
                <span class="separator"></span>
                <span class="phone">Course: </span>
                <span class="phone-val">{{$students[0]->course}}</span>
              </div>
              <div class="about">
                <span class="email">Address </span>
                
                  {{$students[0]->address}}
              </span>
              </div>

              
            </div>
            &nbsp;
            <div class="header">
              <div class="section__title">Student Information</div>
              
              <div class="contact-info">
                <span class="email">Rank: </span>
                <span class="email-val">{{$students[0]->rank->description}}</span>
                <span class="separator"></span>
                <span class="email">Serial: </span>
                <span class="email-val">{{$students[0]->serial_number}}</span>
                <span class="separator"></span>
                <span class="phone">Enlistment Type: </span>
                <span class="phone-val">{{$students[0]->enlistmentType->description}}</span>
              </div>
              <div class="contact-info">
                {{-- <span class="email">Current Class: </span>
                <span class="email-val"></span>
                <span class="separator"></span> --}}
                <span class="phone">Unit: </span>
                <span class="phone-val">{{$students[0]->unit->description}}</span>
                <span class="separator"></span>
                <span class="phone">Company: </span>
                <span class="phone-val">{{$students[0]->company->description}}</span>
              </div>
              <div class="contact-info"> 
                <span class="phone">Physical Profile: </span>
                @if ($students[0]->physical_profile == 1) 
                <span class="phone-val">
                  P1
                </span>
                @elseif ($students[0]->physical_profile == 2)
                <span class="phone-val">
                  P2
                </span>
                @elseif ($students[0]->physical_profile == 3)
                <span class="phone-val">
                  P3
                </span>
                @elseif ($students[0]->civil_status == 4)
                <span class="phone-val">
                  P4
                </span>
                @endif
                  <span class="separator"></span>
                  <span class="phone">Ethnic Group: </span>
                  <span class="phone-val">{{$students[0]->ethnicGroup->description}}</span>
                  
                </div>
                      
              <div class="section__list-item">
                <div class="">
                  <div class="section__title">Tariff Sizes</div>
                  <div>
                    <span class="phone">Headgear Size: </span>
                    <span class="phone-val">{{$students[0]->headgear}}</span>
                    <span class="separator"></span>
                    <span class="phone">BDA Size: </span>
                    <span class="phone-val">{{$students[0]->bda}}</span>
                    <span class="separator"></span>
                    <span class="phone">GOA Chest Size: </span>
                    <span class="phone-val">{{$students[0]->goa_chest}}</span>
                  </div>
                  <div>
                    <span class="phone">GOA Waist Size: </span>
                    <span class="phone-val">{{$students[0]->goa_waist}}</span>
                    <span class="separator"></span>
                    <span class="phone">Shoe Size: </span>
                    <span class="phone-val">{{$students[0]->shoe_size}}</span>
                    <span class="separator"></span>
                    <span class="phone">Shoe Width: </span>
                    <span class="phone-val">{{$students[0]->shoe_width}}</span>
                  </div>
                  <div>
                    <span class="phone">Shoe Size: </span>
                    <span class="phone-val">{{$students[0]->shoe_size}}</span>
                    <span class="separator"></span>
                    <span class="phone">Shoe Width: </span>
                    <span class="phone-val">{{$students[0]->shoe_width}}</span>
                    </div>
                  
                </div>
                  &nbsp;
                  <div class="section__list-item">
                    <div class="left">
                      <div class="section__title">Emergency Contact Person</div>
                      <div class="addr">{{$students[0]->emergency_contact_person}}</div>
                      <div class="addr">{{$students[0]->emergency_contact_relationship}}</div>
                      <div class="duration">{{$students[0]->emergency_contact_number}}</div>
                    </div>
                
                </div>

            
              </div>
            </div>
          </div>
          </div>
                  
            
              {{-- <footer>
                  <img  id="imgfooter" src="{{ public_path('storage/img/footer.jpg') }}"  />
            
                  <center id="txtfooter">
                    <span align=center>Honor. Patriotism. Duty.</span>
                  </center>
            </footer> --}}
            
          </body>
          </html>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  html {
    height: 100%;  
  }
  
  body {
    min-height: 100%;  
    background: #fff;
    font-family: 'Arial', sans-serif;
    font-weight: 400;
    color: #222;
    font-size: 14px;
    line-height: 26px;
    padding-bottom: 50px;
  }
  
  .container {
    max-width: 700px;   
    background: #fff;
    margin: 0px auto 0px; 
    box-shadow: 1px 1px 2px #DAD7D7;
    border-radius: 3px;  
    padding: 40px;
    margin-top: 50px;
  }
  
  .header {
    margin-bottom: 30px;
    
    .full-name {
      font-size: 40px;
      text-transform: uppercase;
      margin-bottom: 5px;
    }
    
    .first-name {
      font-weight: 700;
    }
    
    .last-name {
      font-weight: 300;
    }
    
    .contact-info {
      margin-bottom: 20px;
    }
    
    .email ,
    .phone {
      color: #999;
      font-weight: 300;
    } 
    
    .separator {
      height: 10px;
      display: inline-block;
      border-left: 2px solid #999;
      margin: 0px 10px;
    }
    
    .position {
      font-weight: bold;
      display: inline-block;
      margin-right: 10px;
      text-decoration: underline;
    }
  }
  
  
  .details {
    line-height: 20px;
    
    .section {
      margin-bottom: 40px;  
    }
    
    .section:last-of-type {
      margin-bottom: 0px;  
    }
    
    .section__title {
      letter-spacing: 2px;
      color: #54AFE4;
      font-weight: bold;
      margin-bottom: 10px;
      text-transform: uppercase;
    }
    
    .section__list-item {
      margin-bottom: 40px;
    }
    
    .section__list-item:last-of-type {
      margin-bottom: 0;
    }
    
    .left ,
    .right {
      vertical-align: top;
      display: inline-block;
    }
    
    .left {
      width: 60%;    
    }
    
    .right {
      tex-align: right;
      width: 39%;    
    }
    
    .name {
      font-weight: bold;
    }
    
    a {
      text-decoration: none;
      color: #000;
      font-style: italic;
    }
    
    a:hover {
      text-decoration: underline;
      color: #000;
    }
    
    .skills {
      
    }
      
    .skills__item {
      margin-bottom: 10px;  
    }
    
    .skills__item .right {
      input {
        display: none;
      }
      
      label {
        display: inline-block;  
        width: 20px;
        height: 20px;
        background: #C3DEF3;
        border-radius: 20px;
        margin-right: 3px;
      }
      
      input:checked + label {
        background: #79A9CE;
      }
      

   #imgfooter{
      position: fixed;
      bottom:0;
      width:50;
   }
   #txtfooter{
      position: fixed;
      bottom: 0;
      font-style: italic
      text-align: center;
   }
   #header1 {
      position: fixed;
      top: -30;
      width: 100%;
      height: 100px;
   }

   #footer1 {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 100px;
   }
    }
  }
  
  
  
  </style>
  
  
  
  
  