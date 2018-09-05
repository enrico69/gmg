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
                    var content = "";

                    content += "Bonjour.";
                    content += "<ul>";
                    content += "<li>Il y a actuellement " + data.ownedCount + " jeux possédés enregistrés dans l'application.</li>";
                    content += "<li>Il y a actuellement " + data.toBuyCount + " jeux à acheter enregistrés dans l'application.</li>";
                    content += "<li>Il y a actuellement " + data.hardwareToBuyCount + " éléments de matériel à acheter enregistrés dans l'application.</li>";
                    content += "</ul>";
                    $("#content").append(content);
                    self.displayHallOfFame(data);
                } else {
                    $("#content").append(data.msg);
                }
            };

            /**
             * Display the hall of fame content
             * @param data
             */
            this.displayHallOfFame = function (data) {
                if (data.allOfFameGames.length == 0) {
                    return;
                }

                var content = "";
                content += "<br>Il y a plusieurs jeux dans le Hall of Fames..."
                content += "<br>";
                content += "<ul>";
                var previousYear = 0;
                var liOpened = false;

                $.each(data.allOfFameGames, function (index, value) {
                    if (previousYear != value.all_of_fame_year) {
                        if (previousYear != 0) {
                            content = content.substr(0, content.length - 2);
                            content += "</li>";
                            liOpened = false;
                        }
                        previousYear = value.all_of_fame_year;
                        content += "<li>" + value.all_of_fame_year + ": ";
                        liOpened = true;
                    }
                    content +=value.name + ", ";
                });
                if (liOpened) {
                    content = content.substr(0, content.length - 2);
                    content += "</li>";
                }
                content += "</ul>";
                $("#content").append(content);
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
