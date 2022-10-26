/*global $*/
/*global document*/

$(document).ready(function () {
    $("#live_search").keyup(function () {
        //when users type any value or releases anykey then that "$(this).val();" value will be stored in variable called "input" and will be showed using alert function.
        var input = $(this).val();
        //alert(input);

        if (input != "") {
            $.ajax({
                url: "function/function-admin_liveSearch.php",
                method: "POST",
                data: {
                    input: input
                },
                success: function (data) {
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "block");
                }
            });
        } else {
            $("#searchresult").css("display", "none");
        }
    });
});
