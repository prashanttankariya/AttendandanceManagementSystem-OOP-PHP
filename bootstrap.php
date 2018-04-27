<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="bootstrap.js"></script>
	<script type="text/javascript" src="jquery-1.11.3.js"></script>
        <script type="text/javascript" src="jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="jquery-ui.css" />
        <script type="text/javascript">
          $(function(){
             $(".datepicker").datepicker({ dateFormat: 'MM-yy'}).val();  
          });
          
          $(function(){
             $(".date-picker").datepicker({ dateFormat: 'yy-mm-dd'}).val();  
          });
         </script>    
        <script type="text/javascript">
          $(function(){
              
             $(".datepicker").datepicker({ 
                 changeMonth: true,
                 changeYear:true,
                 showButtonPanel:true,
                 dateFormat: 'MM-yy',
                 onClose: function (dateText, inst){
                     var month = $("#ui-datepicker-div .ui-datrpicker-month :selected").val();
                     var month = $("#ui-datepicker-div .ui-datrpicker-year :selected").val();
                     $(this).datepicker('setDate', new Date(year, month, 1));
                    
                 }
             });
          });
  </script>    
</head>
<body class="" style="font-family: calibri,cambria; font-size:1.5em;">

</body>
</html>