/**
 * Created by arvid on 2016-10-22.
 *
 * This is the Comments ViewModel powered by Knockout JS
 */

var CommentViewModel = function () {

    var self = this;
    self.comment = ko.observableArray([]);
    self.commentText = ko.observable("");

    var site = $("#title").html();
    var post;

    if (site == "Meatballs")
        post = {"site": "meatballs", "page": "0"};
    else
        post = {"site": "pancakes", "page": "1"};

    /* get the user id to check if user can edit a comment */
    $.post("Members/get_member_id", function (secondData) {

        /* Get comments when loading page */
        $.post("/Comments/getComment", post, function (data) {
            for (var i in data) {
                if (data[i].userid == secondData) {
                    self.comments.push({
                        member: data[i].username,
                        comment: data[i].content,
                        id: data[i].cid,
                        canDelete: true
                    });
                }
                else {
                    self.comments.push({
                        member: data[i].username,
                        comment: data[i].content,
                        id: data[i].cid,
                        canDelete: false
                    });
                }
            }
            fetchFromServer();
        }, "json");
    });

    
};

ko.applyBindings(new CommentViewModel());