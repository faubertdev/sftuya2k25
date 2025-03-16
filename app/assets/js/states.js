$(document).ready(function () {
    let dropdown = $('#edit_user_details_form_state')
    let dropdownOptions = $('#edit_user_details_form_state option')
    let test = document.getElementById("edit_user_details_form_state");

    $("#edit_user_details_form_country_id").change(function () {
        dropdown.prop("disabled", true);
        test.options.length = 0
        dropdown.find('option').remove().end().append('<option value="0">-</option>').val('0');
        $('.spinner-border').css('display','block');

        let id = $("#edit_user_details_form_country_id").val();

        $.ajax({
            type: "GET",
            url: "/user/county/states",
            data: {
                country: id,
            },
        }).done(function (data) {
            dropdown.find('option').remove().end().append('<option value="0">-</option>').val('0');
            dropdown.prop("disabled", false)

            $.each(data, function (key, value) {
                dropdown.append($('<option></option>').attr('value', value.code).text(value.name))
            })

            $('.spinner-border').css('display','none');
        })
    })
})