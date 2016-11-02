var AppInteractive = (function() {

 var APPURLS = {

      "logout"    :      "index.php/users/logout",
      "save"      :      "index.php/calories/save",
      "edit"      :      "index.php/calories/edit",
      "index"     :      "index.php/calories/index",
      "find"      :      "index.php/calories/find",
      "delete"    :      "index.php/calories/delete",
      "set_calories" :   "index.php/users/setCalories",
      "filter"    :      "index.php/calories/filter"

 };

    return {

        logOutUser: function() {

            $.ajax({
                type: 'POST',
                url: APPURLS.logout,
                error: function(data) {
                    console.log(data)
                },
                data: {},
                success: function(data) {
                    window.location.replace('front_app.php');
                },
                dataType: "json"
            });

        },

        saveCaloriesEntry: function() {

            var data = {
                "id": $("#id").val(),
                "description": $("#description").val(),
                "num_calories": $("#num_calories").val(),
                "date": $("#date").val(),
                "time": $("#time").val()
            };

            console.log(typeof data.id);

            var url = (!data.id) ? APPURLS.save : APPURLS.edit;

            if (!data.description || !data.num_calories) {
                alert('Description and number of calories cannot be null');
                return;
            }

            $.ajax({
                type: 'POST',
                url: url,
                error: function(data) {
                    console.log(data)
                },
                data: data,
                success: function(data) {
                    if (data.success) {
                        alert('Entry saved with success!');
                    }

                },
                dataType: "json"
            });


        },


        populaSelectField: function(data) {

            $('select#calorieslist option').each(function() {
                $(this).remove();
            });

            $.each(data, function(i, item) {

                $('select#calorieslist')
                    .append($("<option></option>")
                    .attr("value", item.id)
                    .text(item.description));
            });
        },

        getCalories: function() {

            $.when($.ajax({
                type: 'GET',
                url: APPURLS.index,
                success: function(data) {
                    //console.log(data);
                },
                dataType: 'json'

            })).then(function(data, textStatus, jqXHR) {

                //console.log(data);
                AppInteractive.populaSelectField(data.data);


            });
            //
        },


        getCaloriesEntry: function() {

            $.when($.ajax({
                type: 'POST',
                data: {
                    id: $('select#calorieslist').val()
                },
                url: APPURLS.find,
                success: function(data) {

                },
                dataType: 'json'

            })).then(function(data, textStatus, jqXHR) {

                $("#id").val(data.data.id);
                $("#description").val(data.data.description);
                $("#num_calories").val(data.data.num_calories);
                $("#date").val(data.data.date);
                $("#time").val(data.data.time);

            });

        },

        deleteCaloriesEntry: function() {

            $.when($.ajax({
                type: 'POST',
                data: {
                    id: $('select#calorieslist').val()
                },
                url: APPURLS.delete,
                success: function(data) {

                },
                dataType: 'json'

            })).then(function(data, textStatus, jqXHR) {

                alert("Selected Entry successfully deleted");
            });
        },


        getCaloriesConsumed: function() {

            var data = {
                "end": $("#end").val(),
                "begin": $("#begin").val()
            };
            if (!data.end || !data.begin) {
                alert('Must fill all fields');
                return;
            }

            $.ajax({
                type: 'POST',
                url: APPURLS.filter,
                error: function(data) {
                    console.log(data)
                },
                data: data,
                success: function(data) {
                    $("#total_calories").removeClass();
                    AppInteractive.displayCalories($("#total_calories"), data.total, ' calories consumed in period', 'No calories consumed in period')

                },
                dataType: "json"
            });


        },

        setExpectedDailyCalories: function() {

            var cal_data = {
                "daily_cal": $("#daily_cal").val()
            };
            if (!cal_data.daily_cal) {

                alert('Field requires value');
                return;
            }

            $.when($.ajax({
                type: 'POST',
                url: APPURLS.set_calories,
                error: function(data) {
                    console.log(data)
                },
                data: cal_data,
                success: function(data) {},
                dataType: "json"
            })).then(function(data, textStatus, jqXHR) {

                if (data.success)
                    alert('Daily calories updated successfully!');

                var data_value = parseInt(cal_data.daily_cal);

                $("#current_daily_calories").removeClass(); // remove any class and reset
                AppInteractive.displayCalories($("#current_daily_calories"), data_value, 'calories', ' Not set')

            });

        },

        displayCalories: function(div, data_value, success_text, failure_text) {

            if (data_value > 0) {

                $(div)
                    .text(data_value + success_text)
                    .addClass("alert alert-dismissible alert-success");

            } else {

                $(div)
                    .text(failure_text)
                    .addClass("alert alert-dismissible alert-danger");
            }
        }

    }; // return,

})();

$(document).ready(function() {

    AppInteractive.getCalories();

    var data_value = parseInt($("#current_daily_calories").text());

    AppInteractive.displayCalories($("#current_daily_calories"), data_value, ' calories', 'Not Set');

    $(".dash-menu li a").click(function() {
        $(this).parent().addClass('active').siblings().removeClass('active');

    });

    $("#dashboard").show();

    $("#dashboard-page").click(function() {
        $("#manage").hide();
        $("#setting").hide();
        $("#dashboard").show();

    });

    $("#management-page").click(function() {
        $("#manage").show();
        $("#setting").hide();
        $("#dashboard").hide();

    });

    $("#setting-page").click(function() {
        $("#manage").hide();
        $("#setting").show();
        $("#dashboard").hide();

    });


    $("#logout_link").click(function() {
        AppInteractive.logOutUser();
    });


    $("#calories-button").click(function() {

        AppInteractive.saveCaloriesEntry();
        //event.preventDefault();

    });

    $("#fill-form").click(function() {
        AppInteractive.getCaloriesEntry();

    });

    $("#delete-entry").click(function() {
        AppInteractive.deleteCaloriesEntry();

    });

    $("#filter-button").click(function() {
        AppInteractive.getCaloriesConsumed();
    });

    $("#daily-cal-button").click(function() {
        AppInteractive.setExpectedDailyCalories();
    });


});
