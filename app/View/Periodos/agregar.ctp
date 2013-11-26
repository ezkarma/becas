<div class="users form" style="width:30%;margin-right:30%;" >
<h2>Agregar Periodo de Becas</h2>
<?php 

echo $this->Form->create('Periodo', array(
    'inputDefaults' => array(
        'label' => false
    )
));
/*
echo $this->Form->input('Fecha de inicio',array('label' => 'Fecha de Inicio'));
echo $this->Form->input('Fecha final',array('label' => 'Fecha Final'));
*/
?>

<head>
  <meta charset="utf-8" />
  <title>jQuery UI Datepicker - Select a Date Range</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
 
 <script>
  $(function() {
    $( "#inicio" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#final" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#final" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#inicio" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</head>
<body>
 <label for="from">De</label>

<input type="text" id="inicio" name="inicio" />

<label for="to">Hasta</label>
<input type="text" id="final" name="final" />
 
 </body>
 
<?php 

echo $this->Form->input('inicio',array('label'=>'Fecha de Inicio')); 
echo $this->Form->input('final',array('label'=>'Fecha Final')); 
echo $this->Form->input('becas_dia',array('label'=>'Becas por Dia','type'=>'textbox'));
echo $this->Form->end(__('Guardar')); 

?>
</div>
</center>
