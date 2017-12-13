<script language= JavaScript type=text/JavaScript>
function mostrar(valor,total1){
    // alert(total1);
  var d=valor.split("*");

  $("#aid").val(d[0]);
  $("#anom").val(d[1]);
  $("#acognom").val(d[2]);
  $("#anacionalitat").val(d[3]);
}

$(function a() {
  $('#enviarautor').on('click', function(e){
    e.preventDefault();

    var Nom = $('#nomAutor').val();
    var Cognom = $('#cognomAutor').val();
    var Nacionalitat = $('#nacionalitatAutor').val();
    if(Nom=="" || Cognom=="" || Nacionalitat==""){
      $('#mensajes').html('Completa els camps');

    }else{
    $.ajax({
      type: "POST",
      url: "Autors/altaautors.php",
      data: ('nom='+Nom+'&cognom='+Cognom+'&nacionalitat='+Nacionalitat),
      success: function(resposta){
        alert(resposta);
        if(resposta==1){
          $('#mensajes').html('Autor registrat correctament');

          // document.location.href='./Index_autors.php';


        }else{
          $('#mensajes').html('El Autor ja existeix');
        }
        // document.location.href='./Index_autors.php';
      }
    })}
  })

})
$(function b(){
  $('#close').on('click', function(e){
    e.preventDefault();

      // alert("adeu");
      document.location.href='./Index_autors.php';

  })
})

</script>
