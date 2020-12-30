
// Valida se a image existe no caminho passado
window.validateImage = function(path, image)
{
    let xhr = new XMLHttpRequest();
    xhr.open('HEAD', path + image, false);
    xhr.send();

    return (xhr.status == "404") ? false : true;
}

// Bootstrap table
window.getbootstrapTable = function(id, options)
{
    $('#' + id).bootstrapTable(options);
}

// Show modal image
window.showImage = function(id, path, image)
{
    if (window.validateImage(path, image))
    {
        $('#' + id).find('img').attr('src', path + image);
    }
    else
    {
        $('#' + id).find('img').attr('src', path + 'default.png');
    }

    $('#' + id).modal('show');
}

// Delete data
window.deleteItem = function(url, data)
{
    $.ajax({
        type: 'DELETE',
        url: url,
        data: data,
        success: function (data) {
            location.reload();
        },
        error: function (error) {
            console.log(error.statusText);
        }
    });
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


window.formatteRole = function(role)
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


window.formatteRoleFull = function(role)
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
