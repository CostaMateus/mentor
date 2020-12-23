
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
