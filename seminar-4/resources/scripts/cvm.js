/**
 * Created by arvid on 2016-10-22.
 *
 * This is the Comments ViewModel powered by Knockout JS
 */

var CommentsViewModel = function () {

    var self = this;
    self.comments = ko.observableArray([]);
    self.commentText = ko.observable("");

    var site = $("#recipe_title").html();
    if (site == "Meatballs")
        var postData = {"site": "meatballs", "page": "0"};
    else
        var postData = {"site": "pancakes", "page": "1"};

    /* get the user id to check if user can edit a comment */
    $.post("Members/get_member_id", function (secondData) {

        /* Get comments when loading page */
        $.post("Comments/getComment", postData, function (data) {
            for (var i in data) {
                if (data[i].id == secondData) {
                    self.comments.push
                    ({
                        username: data[i].username,
                        comment: data[i].comment,
                        cid: data[i].cid,
                        canDelete: true
                    });

                } else {
                    self.comments.push
                    ({
                        username: data[i].username,
                        comment: data[i].comment,
                        cid: data[i].cid,
                        canDelete: false
                    });
                }
            }
            //fetchFromServer();
        }, "json");
    });


};

ko.applyBindings(new CommentsViewModel());