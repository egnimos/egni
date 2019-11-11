$(document).ready(function () {






    $('#selectAllBoxes').click(function (event) {

        if (!this.checked) {
            $('.checkBoxes').each(function () {

                this.checked = false;

            });
        } else {

            $('.checkBoxes').each(function () {

                this.checked = true;

            });

        }


    });

});

function loadUsersOnline(){

    $.get("function.php?onlineusers=result", function(data){

        $(".usersonline").text(data);


    });

}

setInterval(function(){

    loadUsersOnline();


},500);