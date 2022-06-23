<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>

#customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #ffffff;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
   
      color: rgb(0, 0, 0);
    }

      #main_header2 {
       margin-top: 0!important;
      }

    #main_header2 {
    height: auto;
    background-color: #ffffff;
    text-align:;
    }

    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
     }

   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
   }
   .btn-success {
    color: #fff;
    background-color: #ffffff;
    border-color: #ffffff;
     }
   table {
    border-collapse: collapse;
    }

    body {
      background: url(backend/mrs/_nuxt/img/id/test1.png);
              background-repeat: no-repeat;
              background-size: 330mm 190mm;
   }


		</style>


	</head>

	<body>

        <br/><br/>
     <div>

	<div>
      <img align="left" src="{{('backend/all-images/web/default/logo.png')}}" width="100" height="100" style=" padding: 0px 0px 0px 440px;">
      <h4><font color="black">KALIAPARA DAKATIA MAZEDA MAZID HIGH SCHOOL   </font></h4>
      <h5><font color="black">ARAIPARA BAZAR, SHAKHIPUR, TANGAIL</font></h5>
  

        </div>

        <br/>

        <table  width="100%">
            <thead>
                <tr align="left">
                    <th width="44%"></th>
                
                  <th width="12%">
        
                    <div>
                       <u> <h2>TESTIMONAL</h2> </u>
                    </div>
                </th>
                  
                <th width="44%"></th>
                  
                </tr>
              </thead>
             
        </table>
       

 
  
  <table width="100%">
    <thead>
      <tr>
        <th width="17%"></th>
        <th width="25%" align="left"><h3>Serial No:.......................................</h3></th>
        <th width="5%"></th>
        <th width="25%"></th>
        <th width="5%"></th>
        <th width="25%"><h3>Reg. No.: {{ $admit['0']['st_name']['id_no'] }} </h3></th> 
        <th width="15%"></th> 
      </tr>
    </thead>
    
    </table>
     
  <table  width="100%">
    <thead>

  


        <tr align="left">
            <th width="15%"></th>
          <th width="75%" style="text-align: justify;">
              
           <h3> 
               This is to certify that <u> {{ $admit['0']['st_name']['name'] }} </u> Father<u> {{ $admit['0']['st_name']['fathers_name'] }} </u> Mother <u> {{ $admit['0']['st_name']['mothers_name'] }} </u> Address <u> {{ $admit['0']['st_name']['address'] }} </u> is know to me as a student of this institution.The passed the SSC Examination under the Board of Intermediate and Secondary Education,Dhaka,hold in <u> {{ $admit['0']['session']['name'] }} </u>in the GPA <u>  </u> Beaning the Roll <u> Kapadamam </u> Registration No <u> {{ $admit['0']['st_name']['id_no'] }} </u> this date or birth is <u> {{ $admit['0']['st_name']['dob'] }} </u> . <br/><br/>
        
        Duning  his studentship here he had never seen to be associated with any movement subversive of the state and of the general descipline of the school.The learn an excellent moral character. <br/><br/>

        I wish him every success in life.
        </h3> 
        
        </th> 
        <th width="15%"></th>
          
        </tr>
      </thead>
     
</table>

<br/><br/>

<table width="100%">
<thead>
  <tr>
    <th width="17%"></th>
    <th width="25%" align="left">Writer:.......................................<br/><br/>
    Date:........................................... 

    </th>
    <th width="5%"></th>
    <th width="25%"></th>
    <th width="5%"></th>
    <th width="25%">Md. Yeasin Ali<br/>Headmaster<br/>Kapadamam High School</th>  
    <th width="15%"></th> 
  </tr>
</thead>

</table>


        </div> 
        
       
          
 
        
        
  