function getTerms() {
    $.get("/api/terms/getterms", function(data) {
        return data;
    });
}

function showDataInTable(params, data, elementToInsert) {

    $(elementToInsert).html('');

    $(elementToInsert).append('<table class="table"><thead class="thead-light"><tr></tr></thead></table>');

    for(let elementHeader in params) {
        $(elementToInsert+' > table.table > thead > tr').append('<th scope="col">'+ params[elementHeader] +'</th>');
    }

    $(elementToInsert+' > table.table').append('<tbody></tbody>');

    for(let elementsTable in data) {
        $(elementToInsert+' > table.table > tbody').append('<tr></tr>');
        for(let dataOfRow in data[elementsTable]) {
            if(dataOfRow in params) {
                $(elementToInsert+' > table.table > tbody > tr:last').append('<td>'+ data[elementsTable][dataOfRow] +'</td>');
            }
        }
    }
}
