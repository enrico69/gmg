/**
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
define(
    ["jquery"],
    function ($) {
        "use strict";

        /**
         * Declaring the object.
         */
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
                        self.showTempMsg(false);
                        self.displayData(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        self.showTempMsg(false);
                        self.displayErrorMsg();
                    }
                });
            };

            /**
             * Display the result
             * @param data
             */
            this.displayData = function (data) {
                var gameListNode = $("#gameList");
                var contentExample = $('#contentExample').html();

                $("#mainTitle").append(" (" + data.length + " entrées)");

                $.each(data, function (index, value) {
                    var gameInfo = contentExample;
                    gameInfo = gameInfo.replace("@GAME_NAME@", value.name);
                    gameInfo = gameInfo.replace("@GAME_URL@", gameDetailUrl + value.id);
                    gameListNode.append(gameInfo);
                });
            };

            /**
             * Display generic error msg
             */
            this.displayErrorMsg = function () {
                $("#content").append("Impossible de contacter le serveur");
            };

            /**
             * Show / Hide the temporary msg "Please wait..."
             */
            this.showTempMsg = function(status) {
                if (status) {
                    $("#tempMsg").show();
                } else {
                    $("#tempMsg").hide();
                }
            };
        };

        var dataReader = new dataGetter();
        dataReader.getData();
    }
);