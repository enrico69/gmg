/**
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
define(
    ["jquery"],
    function ($) {
        "use strict";
        var dataGetter = function () {
            /**
             * Constructor
             */
            var self = this;

            /**
             * Contact the server to extract data
             */
            this.getData = function () {
                $.ajax({
                    type: "GET",
                    url: targetUrl,
                    success: function (data, textStatus, jqXHR) {
                        self.cleanTempMsg();
                        self.displayData(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        self.cleanTempMsg();
                        self.displayErrorMsg();
                    }
                });
            };

            /**
             * Display the result
             * @param data
             */
            this.displayData = function (data) {
                if (data.msg === "") {
                    $('#content').append(
                        "Bonjour, il y a actuellement " + data.count + " jeux enregistrés dans l'application."
                    );
                } else {
                    $("#content").append(data.msg);
                }
            };

            /**
             * Display generic error msg
             */
            this.displayErrorMsg = function() {
                $("#content").append("Impossible de contacter le serveur");
            };

            /**
             * Remove the temporary msg "Please wait..."
             */
            this.cleanTempMsg = function() {
                $("#tempMsg").remove();
            };
        };

        var dataReader = new dataGetter();
        dataReader.getData();
    }
);
