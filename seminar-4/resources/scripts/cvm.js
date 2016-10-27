/**
 * Created by arvid on 2016-10-22.
 *
 * This is the Comments ViewModel powered by KnockoutJS and JQuery
 */

/* Called when document finished loading */
$(document).ready(function() {

    var CommentsViewModel = function () {

        /* Creating observables */
        var self = this;
        self.comments = ko.observableArray([]);
        self.commentText = ko.observable("");

        /* pathArray contains full path split into elements.
        * We can target 'meatballs' or 'pancakes' by targeting
        * the last element in the array
        */
        var pathArray = window.location.pathname.split('/');
        var site = pathArray[5];
        var base_url = 'http://localhost/id1354/seminar-4/';
        var data;

        if (site == 'meatballs')
            data = {'page': '0'};
        else
            data = {'page': '1'};


        $.post(base_url+'Members/get_member_id', function (secondData) {

            /* Loading comments when page finished loading */
            $.post(base_url+'Comments/getComment', data, function (data) {

                for (var i in data) {

                    /* if comment author is the one logged in */
                    if (data[i].id == secondData) {

                        self.comments.push
                        ({
                            author: data[i].username,
                            comment: data[i].comment,
                            cid: data[i].cid,
                            canDelete: true
                        });
                    }

                    /* else we just push comments without the ability to delete */
                    else {
                        self.comments.push
                        ({
                            author: data[i].username,
                            comment: data[i].comment,
                            cid: data[i].cid,
                            canDelete: false
                        });
                    }
                }
            }, 'json');
        });


        /* Add comment to database */
        self.addComment = function () {
            if (!(self.commentText().length == 0)) {
                data['comment'] = self.commentText();
                $.post(base_url+'Comments/addComment', data,

                    /* function (returnedData) {

                        self.comments.push
                        ({
                            author: returnedData.username,
                            comment: self.commentText(),
                            cid: returnedData.cid,
                            canDelete: true
                        });

                }*/ 'json');

                /* This updates knockout view */
                self.comments.push
                ({
                    author: "",
                    comment: self.commentText(),
                    cid: "",
                    canDelete: true
                });

            } self.commentText("")

        }.bind(self);

        /* Delete comment from database, updated locally in view */
        self.delComment = function (comments, event) {

            var element = event.target;
            data['delcomment'] = element.id;
            $.post(base_url+'Comments/delComment', data, 'json');

            /* This updates knockout view */
            self.comments.remove(comments);

        }.bind(self);

    };

    ko.applyBindings(new CommentsViewModel());
});