function showDataInTable(params, data, elementToInsert, object) {

    $(elementToInsert).html('');

    $(elementToInsert).append('<table class="table"><thead class="thead-light"><tr></tr></thead></table>');

    for(let elementHeader in params) {
        $(elementToInsert+' > table.table > thead > tr').append('<th scope="col">'+ params[elementHeader] +'</th>');
    }

    $(elementToInsert+' > table.table').append('<tbody></tbody>');

    for(let elementsTable in data) {
        let idItem = data[elementsTable]['id'];
        $(elementToInsert+' > table.table > tbody').append('<tr id="item-'+ idItem +'"></tr>');
        for(let dataOfRow in data[elementsTable]) {
            if(dataOfRow in params) {
                $('tr#item-'+ idItem).append('<td><input name="'+dataOfRow+'" type="text" class="form-control-plaintext" aria-label="" aria-describedby="inputGroup-sizing-default" value="'+ data[elementsTable][dataOfRow] +'" form="itemForm-'+ idItem +'" readonly></td>');
            }
        }

        $('tr#item-'+ idItem).append('<td><form action="#" id="itemForm-'+ idItem +'" onsubmit="updateObject('+ idItem +', \''+ object +'\', \'curso\'); return false;"><div class="btn-group" role="group" aria-label="Actions"><button id="saveButton-'+ idItem +'" style="display: none;" title="Guardar" type="submit" class="btn btn-success"><i class="fas fa-check"></i></button><button id="cancelButton-'+ idItem +'" style="display: none;" title="Cancelar" type="reset" class="btn btn-secondary" onclick="changeInputToEdit(\'item-'+ idItem +'\'); showButton([\'#editButton-'+ idItem +'\']); hideButton([\'#saveButton-'+ idItem +'\',\'#cancelButton-'+ idItem +'\']);"><i class="fas fa-times"></i></button><button id="editButton-'+ idItem +'" title="Editar" type="button" class="btn btn-primary" onclick="changeInputToEdit(\'item-'+ idItem +'\'); hideButton([\'#editButton-'+ idItem +'\']); showButton([\'#saveButton-'+ idItem +'\',\'#cancelButton-'+ idItem +'\']);"><i class="fas fa-edit"></i></button><button id="deleteButton-'+ idItem +'" title="Eliminar" type="button" class="btn btn-danger" onclick="location.href=\''+object+'/delete/'+ idItem +'\'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></form></td>');
    }
}

function changeInputToEdit(id) {
    let inputsRow = $('tr#'+ id +' > td > input').get();
    for(let input in inputsRow) {
        var attr = $(inputsRow[input]).attr('readonly');
        if(typeof attr !== typeof undefined && attr !== false) {
            $(inputsRow[input]).attr('class', 'form-control');
            $(inputsRow[input]).removeAttr('readonly');
        } else {
            $(inputsRow[input]).attr('class', 'form-control-plaintext');
            $(inputsRow[input]).attr('readonly', '');
        }
    }
}

function hideButton(buttonsElement) {
    for(let button in buttonsElement) {
        $(buttonsElement[button]).hide();
    }
}

function showButton(buttonsElement) {
    for(let button in buttonsElement) {
        $(buttonsElement[button]).show();
    }
}

function changeStatusButton(buttonsElement) {
    for(let button in buttonsElement) {
        var attr = $(buttonsElement[button]).attr('disabled');
        if(typeof attr !== typeof undefined && attr !== false) {
            $(buttonsElement[button]).removeAttr('disabled');
        } else {
            $(buttonsElement[button]).attr('disabled', '');
        }
    }
}

function changeLoadingOfButton(elementButton, status='') {
    let icon = '<i class="fas fa-check"></i>';
    if(status == '') {
        if($(elementButton).has(icon)) {
            $(elementButton).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        }
    } else {
        $(elementButton).html(icon);
    }
}

function updateObject(idItem, object, name) {
    changeInputToEdit('item-'+ idItem);
    changeStatusButton([
        '#deleteButton-'+ idItem,
        '#cancelButton-'+ idItem,
        '#saveButton-'+ idItem
    ]);
    changeLoadingOfButton('#saveButton-'+ idItem);
    $.ajax({
        url: '/api/'+object+'/update/'+idItem,
        method: 'PUT',
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data: $('#itemForm-'+idItem).serializeArray(),
        success: (data) => {
            changeStatusButton([
                '#deleteButton-'+ idItem,
                '#cancelButton-'+ idItem,
                '#saveButton-'+ idItem
            ]);
            showButton(['#editButton-'+ idItem]);
            changeLoadingOfButton('#saveButton-'+ idItem, 1);
            hideButton(['#saveButton-'+ idItem, '#cancelButton-'+ idItem]);
            toastr["success"]('Has editado el '+ name +' #'+ idItem +' correctamente.');
        },
        error: (data) => {
            toastr["error"]('Ha ocurrido un problema con la base de datos y no se ha podido editar el '+ name +' satisfactoriamente.');
            changeStatusButton([
                '#deleteButton-'+ idItem,
                '#cancelButton-'+ idItem,
                '#saveButton-'+ idItem
            ]);
            showButton(['#editButton-'+ idItem]);
            changeLoadingOfButton('#saveButton-'+ idItem, 1);
            hideButton(['#saveButton-'+ idItem, '#cancelButton-'+ idItem]);
            $('#itemForm-'+ idItem).trigger("reset");
        }
    });
}

function allowButtonToPressIfTextIsSame(textNeedsToBeEqual, inputText, buttonElement) {
    if(textNeedsToBeEqual == inputText) {
        $(buttonElement).removeAttr('disabled');
    } else {
        $(buttonElement).attr('disabled', '');
    }
}

function softDeleteObject(idItem, object, name) {
    changeStatusButton(['#deleteObject']);
    changeLoadingOfButton('#deleteObject');
    $.ajax({
        url: '/api/'+object+'/delete/'+idItem,
        method: 'DELETE',
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (data) => {
            location.href = '/admin/'+ object;
        },
        error: (data) => {
            toastr["error"]('Ha ocurrido un problema con la base de datos y no se ha podido eliminar el '+ name +' satisfactoriamente.');
            changeStatusButton(['#deleteObject']);
            $('#deleteObject').html('Eliminar');
        }
    });
}
