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
            <td rowspan = "4" style="text-align:center;"><img src="" width="65" height="65" /></td>
            <td rowspan = "4" style="text-align:center;">
                <p style="text-align:center;">H E A D Q U A R T E R S
                <br><b>SCS, IMTC, TRADOC</b>
                <br>Camp O'Donell Tarlac</p><br></td>
                <td rowspan = "4" style="text-align:center;"><img src="" width="65" height="65" /></td>
            
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
      <span class="phone-val">{{$students[0]->sex}}</span>
      <span class="separator"></span>
      <span class="phone">Civil Status: </span>
      <span class="phone-val">{{$students[0]->civil_status}}</span>
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
      <span class="email">Current Class: </span>
      <span class="email-val"></span>
      <span class="separator"></span>
      <span class="phone">Unit: </span>
      <span class="phone-val"></span>
      <span class="separator"></span>
      <span class="phone">Company: </span>
      <span class="phone-val">{{$students[0]->bloodType->name}}</span>
    </div>
    <div class="contact-info">
        <span class="email">Physical Profile: </span>
        <span class="email-val">{{$students[0]->physical_profile}}</span>
        <span class="separator"></span>
        <span class="phone">Ethnic Group: </span>
        <span class="phone-val">{{$students[0]->ethnicGroup->description}}</span>
        
      </div>
    
    
    <div class="contact-info">
      <span class="email">Religion: </span>
      <span class="email-val">{{$students[0]->religion->description}}</span>
      <span class="separator"></span>
      <span class="phone">Sex: </span>
      <span class="phone-val">{{$students[0]->sex}}</span>
      <span class="separator"></span>
      <span class="phone">Civil Status: </span>
      <span class="phone-val">{{$students[0]->civil_status}}</span>
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

  

   <div class="details">
    <div class="section">
      <div class="section__title">Basic Information</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name">Emergency Contact Person</div>
            <div class="addr">{{$students[0]->emergency_contact_person}}</div>
            <div class="addr">{{$students[0]->emergency_contact_relationship}}</div>
            <div class="duration">{{$students[0]->emergency_contact_number}}</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc">did This and that</div>
          </div>
        </div>
                <div class="section__list-item">
          <div class="left">
            <div class="name">Akount</div>
            <div class="addr">San Monica, CA</div>
            <div class="duration">Jan 2011 - Feb 2015</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc">did This and that</div>
          </div>
        </div>

      </div>
    </div>
    <div class="section">
      <div class="section__title">Education</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name">Sample Institute of technology</div>
            <div class="addr">San Fr, CA</div>
            <div class="duration">Jan 2011 - Feb 2015</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc">did This and that</div>
          </div>
        </div>
        <div class="section__list-item">
          <div class="left">
            <div class="name">Akount</div>
            <div class="addr">San Monica, CA</div>
            <div class="duration">Jan 2011 - Feb 2015</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc">did This and that</div>
          </div>
        </div>

      </div>
      
  </div>
     <div class="section">
      <div class="section__title">Projects</div> 
       <div class="section__list">
         <div class="section__list-item">
           <div class="name">DSP</div>
           <div class="text">I am a front-end developer with more than 3 years of experience writing html, css, and js. I'm motivated, result-focused and seeking a successful team-oriented company with opportunity to grow.</div>
         </div>
         
         <div class="section__list-item">
                    <div class="name">DSP</div>
           <div class="text">I am a front-end developer with more than 3 years of experience writing html, css, and js. I'm motivated, result-focused and seeking a successful team-oriented company with opportunity to grow. <a href="/login">link</a>
           </div>
         </div>
       </div>
    </div>
     <div class="section">
       <div class="section__title">Skills</div>
       <div class="skills">
         <div class="skills__item">
           <div class="left"><div class="name">
             Javascript
             </div></div>
           <div class="right">
                          <input  id="ck1" type="checkbox" checked/>

             <label for="ck1"></label>
                          <input id="ck2" type="checkbox" checked/>

              <label for="ck2"></label>
                         <input id="ck3" type="checkbox" />

              <label for="ck3"></label>
                           <input id="ck4" type="checkbox" />
            <label for="ck4"></label>
                          <input id="ck5" type="checkbox" />
              <label for="ck5"></label>

           </div>
         </div>
         
       </div>
       <div class="skills__item">
           <div class="left"><div class="name">
             CSS</div></div>
           <div class="right">
                          <input  id="ck1" type="checkbox" checked/>

             <label for="ck1"></label>
                          <input id="ck2" type="checkbox" checked/>

              <label for="ck2"></label>
                         <input id="ck3" type="checkbox" />

              <label for="ck3"></label>
                           <input id="ck4" type="checkbox" />
            <label for="ck4"></label>
                          <input id="ck5" type="checkbox" />
              <label for="ck5"></label>

           </div>
         </div>
         
       </div>
     <div class="section">
     <div class="section__title">
       Interests
       </div>
       <div class="section__list">
         <div class="section__list-item">
                  Football, programming.
          </div>
       </div>
     </div>
     </div>
  </div>
</div>
</div>
         

    &nbsp;
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thank you for giving us the opportunity to serve you better. Please help us by taking a few 
        minutes to tell us about the service that you have received so far. We appreciate your concern and want 
        to mke sure we meet your expectations and improve our services.</p>

        <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
       
 
        @foreach ($students as $data)
        <tr>
            <td>{{ $data->lastname }}</td>
            <td>{{ $data->lastname }}</td>
            <td>{{ $data->firstname }}</td>
        </tr>
        @endforeach
  
    </table>
    <br><br>
    <footer id="footer">
        <img  id="imgfooter" src="{{ public_path('storage/img/footer.jpg') }}"  />
  
        <center id="txtfooter">
           <span>Honor. Patriotism. Duty.</span>
        </center>
  </footer>
   
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
    background: #eee;
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
    }
  }
  
  
  
  </style>
  
  
  
  
  