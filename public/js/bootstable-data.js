/*
Bootstable
 @description  Javascript library to make HMTL tables editable, using Bootstrap
 @version 1.1
 @autor Tito Hinostroza
*/
"use strict";
//Global variables
var params = null;  		//Parameters
var colsEdi =null;
var newColHtml = '<div class="btn-group pull-right">'+
'<button id="bEdit" type="button" class="btn btn-sm btn-link p-0 px-1 ml-2" onclick="rowEdit(this);">' +
'<i class="fas fa-pencil-alt" > </i>'+
'</button>'+
'<button id="bElim" type="button" class="btn btn-sm btn-link p-0 px-1 ml-2" onclick="rowElim(this);">' +
'<i class="fas fa-trash-alt" > </i>'+
'</button>'+
'<button id="bAcep" type="button" class="btn btn-sm btn-link p-0 px-1 ml-2" style="display:none;" onclick="rowAcep(this);">' + 
'<i class="fas fa-check" > </i>'+
'</button>'+
'<button id="bCanc" type="button" class="btn btn-sm btn-link p-0 px-1 ml-2" style="display:none;" onclick="rowCancel(this);">' + 
'<i class="fas fa-times" > </i>'+
'</button>'+
  '</div>';
var colEdicHtml = '<td name="buttons">'+ newColHtml+ '</td>'; 

$.fn.SetEditable = function (options) {
  var defaults = {
      columnsEd: null,         //Index to editable columns. If null all td editables. Ex.: "1,2,3,4,5"
      $addButton: null,        //Jquery object of "Add" button
      onEdit: function() {},   //Called after edition
      onBeforeDelete: function() {}, //Called before deletion
      onDelete: function() {}, //Called after deletion
      onAdd: function() {},     //Called when added a new row
  };
  params = $.extend(defaults, options);
  this.find('thead tr').append('<th name="buttons"></th>');  //encabezado vacío
  this.find('tbody tr').append(colEdicHtml);
  var $tabedi = this;   //Read reference to the current table, to resolve "this" here.
  //Process "addButton" parameter
  if (params.$addButton != null) {
      //Se proporcionó parámetro
      params.$addButton.click(function() {
          rowAddNew($tabedi.attr("id"));
      });
  }
  //Process "columnsEd" parameter
  if (params.columnsEd != null) {
      //Extract felds
      colsEdi = params.columnsEd.split(',');
  }
};
function IterarCamposEdit($cols, tarea) {
//Itera por los campos editables de una fila
  var n = 0;
  $cols.each(function() {
      n++;
      if ($(this).attr('name')=='buttons') return;  //excluye columna de botones
      if (!EsEditable(n-1)) return;   //noe s campo editable
      tarea($(this));
  });
  
  function EsEditable(idx) {
  //Indica si la columna pasada está configurada para ser editable
      if (colsEdi==null) {  //no se definió
          return true;  //todas son editable
      } else {  
          for (var i = 0; i < colsEdi.length; i++) {
            if (idx == colsEdi[i]) return true;
          }
          return false;  //no se encontró
      }
  }
}
function FijModoNormal(but) {
  $(but).parent().find('#bAcep').hide();
  $(but).parent().find('#bCanc').hide();
  $(but).parent().find('#bEdit').show();
  $(but).parent().find('#bElim').show();
  var $row = $(but).parents('tr');  //accede a la fila
  $row.attr('id', '');  //quita marca
}
function FijModoEdit(but) {
  $(but).parent().find('#bAcep').show();
  $(but).parent().find('#bCanc').show();
  $(but).parent().find('#bEdit').hide();
  $(but).parent().find('#bElim').hide();
  var $row = $(but).parents('tr');  //accede a la fila
  $row.attr('id', 'editing');  //indica que está en edición
}
function ModoEdicion($row) {
  if ($row.attr('id')=='editing') {
      return true;
  } else {
      return false;
  }
}
function rowAcep(but) {

  $.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
//Acepta los cambios de la edición
  var $row = $(but).parents('tr');  //accede a la fila
  var $cols = $row.find('td');  //lee campos
  if (!ModoEdicion($row)) return; 
  var tableId = $row.attr("name");
  var dataId = $row.attr("rowId");
  
  var prefix_url;

  switch(tableId){
    case 'table-kantor':
      prefix_url = '/edit_akun_kantor';
      break;
    case 'table-proyek':
      prefix_url = '/edit_akun_proyek';
      break;
    case 'table-pemasok':
      prefix_url = '/edit_pemasok';
      break;
    case 'table-proyekan':
      prefix_url = '/edit_proyek';
      break;
    default:
      prefix_url = "/edit_neraca";
      break;
  }

  var nama, var2, id;
    IterarCamposEdit($cols, function($td) {  
    id = $td.attr("id");
   
    var cont = $td.find('input').val();
      if(id == "nama") {
        nama = cont;
      } else {
        var2= cont;
      }
      $td.html(cont); 
    });

    var request =  $.ajax({
      url: prefix_url,
      type:"POST",
      data:{id:dataId, nama:nama, var2:var2},
      dataType: "html",
    });
    request.done(function( msg ) {
      window.alert("Done editing data in " + tableId);
    });
     
    request.fail(function( jqXHR, textStatus ) {
      window.alert( "Request failed: " + textStatus );
    });
  FijModoNormal(but);
  params.onEdit($row);
}
function rowCancel(but) {
  var $row = $(but).parents('tr'); 
  var $cols = $row.find('td');  
  if (!ModoEdicion($row)) return; 
  IterarCamposEdit($cols, function($td) {  
      var cont = $td.find('div').html(); 
      $td.html(cont);  
  });
  FijModoNormal(but);
}
function rowEdit(but) {  //Inicia la edición de una fila
  var $row = $(but).parents('tr');  //accede a la fila
  var $cols = $row.find('td');  //lee campos
 
  if (ModoEdicion($row)) return;  
  IterarCamposEdit($cols, function($td) { 
      var cont = $td.html(); 
      var div = '<div style="display: none;">' + cont + '</div>'; 
      var input = '<input class="form-control input-sm"  value="' + cont + '">';
      $td.html(div + input);  
  });
  
  FijModoEdit(but);
}
function rowElim(but) {  //Elimina la fila actual
  var $row = $(but).parents('tr');  //accede a la fila
  params.onBeforeDelete($row);
  $row.remove();
  var name = $row[0].cells[0].innerText;
  var prefix_url;
  var tableId = $row.attr("name");
  switch(tableId){
    case 'table-kantor':
      prefix_url = '/delete_akun_kantor/';
      break;
    case 'table-proyek':
      prefix_url = '/delete_akun_proyek/';
      break;
    case 'table-pemasok':
      prefix_url = '/delete_pemasok/';
      break;
    case 'table-proyekan':
      prefix_url = '/delete_proyek/';
      break;
    default:
      prefix_url = '/delete_neraca/';
      break;
  }
    $.ajax({
      url: prefix_url + name,
      method:'GET',
      data:{nama:name},
      success:function(data){
        window.alert("Success delete row in " + tableId);
      }
    })

  params.onDelete();
}
function rowAddNew(tabId) {  //Agrega fila a la tabla indicada.
var $tab_en_edic = $("#" + tabId);  //Table to edit
  var $filas = $tab_en_edic.find('tbody tr');
  if ($filas.length==0) {
      //No hay filas de datos. Hay que crearlas completas
      var $row = $tab_en_edic.find('thead tr');  //encabezado
      var $cols = $row.find('th');  //lee campos
      //construye html
      var htmlDat = '';
      $cols.each(function() {
          if ($(this).attr('name')=='buttons') {
              //Es columna de botones
              htmlDat = htmlDat + colEdicHtml;  //agrega botones
          } else {
              htmlDat = htmlDat + '<td></td>';
          }
      });
      // window.alert(tabId);
      $tab_en_edic.find('tbody').append('<tr >'+htmlDat+'</tr>');
  } else {
      //Hay otras filas, podemos clonar la última fila, para copiar los botones
      var $ultFila = $tab_en_edic.find('tr:last');
      $ultFila.clone().appendTo($ultFila.parent());  
      $ultFila = $tab_en_edic.find('tr:last');
      var $cols = $ultFila.find('td');  //lee campos
      $cols.each(function() {
          if ($(this).attr('name')=='buttons') {
              //Es columna de botones
          } else {
              $(this).html('');  //limpia contenido
          }
      });
  }
  params.onAdd();
}
function TableToCSV(tabId, separator) {  //Convierte tabla a CSV
  var datFil = '';
  var tmp = '';
  var $tab_en_edic = $("#" + tabId);  //Table source
  $tab_en_edic.find('tbody tr').each(function() {
      //Termina la edición si es que existe
      if (ModoEdicion($(this))) {
          $(this).find('#bAcep').click();  //acepta edición
      }
      var $cols = $(this).find('td');  //lee campos
      datFil = '';
      $cols.each(function() {
          if ($(this).attr('name')=='buttons') {
              //Es columna de botones
          } else {
              datFil = datFil + $(this).html() + separator;
          }
      });
      if (datFil!='') {
          datFil = datFil.substr(0, datFil.length-separator.length); 
      }
      tmp = tmp + datFil + '\n';
  });
  return tmp;
}