$(document).ready(function () {

    var x = $('#company').val();
    getBranches(x);

    $('#company').change(function () {
        getBranches($(this).val());
    })

});

getBranches = function (id) {
    $.get('http://' + window.location.host + '/company/' + id + '/branches', function (data) {
        getOptionTag(data);
    })
};


getOptionTag = function (data) {
    var options = '<option value="">All</option>';

    $.each(data, function (index, row) {
        options += '<option value="' + row.id + '">' + row.branch + '</option>'
    });

    $('#branches').html(options);
}
