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
                    $('#content').append("Bonjour.");
                    $('#content').append("<ul>");
                    $('#content').append(
                        "<li>Il y a actuellement " + data.ownedCount + " jeux possédés enregistrés dans l'application.</li>"
                    );
                    $('#content').append(
                        "<li>Il y a actuellement " + data.toBuyCount + " jeux à acheter enregistrés dans l'application.</li>"
                    );
                    $('#content').append(
                        "<li>Il y a actuellement " + data.hardwareToBuyCount + " éléments de matériel à acheter enregistrés dans l'application.</li>"
                    );
                    $('#content').append("</ul>");
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
