// Bootstrap table
window.getbootstrapTable = function(id, options)
{
    $('#' + id).bootstrapTable(options);
}



window.formatCurrency = function(value)
{
    return new Intl.NumberFormat('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(value);
}


window.formatDate = function(str)
{
    let date = new Date(str);
    return ("0" + date.getDate()).substr(-2) +
            "/" +
           ("0" + (date.getMonth() + 1)).substr(-2) +
            "/" +
            date.getFullYear();
}


window.getNameCountry = function(countries, code)
{
    let country;

    countries.forEach(c => {
        if (c.code == code)
        {
            country = [ c.code, c.name ];
        }
    });

    return country;
}


window.formatRole = function(role)
{
    switch (role.toLowerCase()) {
        case 'top':
            return 'TOP';
        case 'tng':
            return 'JNG';
        case 'mid':
            return 'MID';
        case 'adc':
            return 'ADC';
        case 'sup':
            return 'SUP';
    }
}


window.formatRoleFull = function(role)
{
    switch (role.toLowerCase()) {
        case 'top':
            return [ 'Topo', 1 ];
        case 'jng':
            return [ 'Selva', 2 ];
        case 'mid':
            return [ 'Meio', 3 ];
        case 'adc':
            return [ 'Atirador', 4 ];
        case 'sup':
            return [ 'Suporte', 5 ];
    }
}


window.countTeamsInDivision = function(teams, idDivision)
{
    let count = 0;

    teams.forEach(t => {
        if (t.division_id == idDivision)
        {
            count++;
        }
    });

    return (count > 0) ? true : false;
}

window.checkTeamsWithoutDivisions = function(teams)
{
    let count = 0;

    teams.forEach(t => {
        if (t.division_id == null)
        {
            count++;
        }
    });

    return (count > 0) ? true : false;
}


// Limpa campos
window.clearInvalid = function () {
    $('input, select').removeClass('is-invalid');
    $('.select2-selection.select2-selection--single').removeClass('has-error');
}

// Limpa mensagens de erro
window.clearSpan = function () {
    $('[id*=span_]').html('');
}

// Mostrar erros
window.showErrors = function(e, prefix = "") {
    $.each(e.responseJSON.errors, function (key, error) {
        let pk = (prefix === "") ? key : prefix + key;

        if (key == "update")  $("#update_invalid").removeClass("d-none").find("p").html(error[0]);
        if (key == "destroy") $("#delete_invalid").removeClass("d-none").find("p").html(error[0]);

        $("#" + pk).addClass("is-invalid");
        $("#span_" + pk).html(error[0]);

        let elem = $("#" + pk);
        if (elem.next().find(".select2")) elem.next().find(".select2-selection").addClass("has-error");
    });
}

// Desativa os campos enquanto processa os dados
window.disableFields = function () {
    $("input").attr("readonly", true);
    $("select").attr("disabled", true);
}
// Reativa os campos após processar os dados
window.enableFields = function () {
    $("input").removeAttr("readonly", true);
    $("select").removeAttr("disabled", true);
}

// Delete data
window.deleteItem = function(url, data, btn)
{
    $.ajax({
        type: "DELETE",
        url: url,
        data: data,
        success: function (data) {
            window.location.reload();
        },
        error: function (err) {
            console.log(err);

            showErrors(err);
            btn.removeClass("disabled").find("i").addClass("d-none");
        }
    });
}

// Cria ou atualiza uma liga
window.submitLeagueData = function (url, formData, btn, prefix = "") {

    btn.addClass("disabled").find("i").removeClass("d-none");

    clearInvalid();
    disableFields();

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        enctype: "multipart/form-data",
        success: function (data) {
            // console.log(data);
            window.location.reload();
        },
        error: function (err) {
            console.log(err);

            clearInvalid();
            enableFields();
            showErrors(err, prefix);

            btn.removeClass("disabled").find("i").addClass("d-none");
        }
    });
}
