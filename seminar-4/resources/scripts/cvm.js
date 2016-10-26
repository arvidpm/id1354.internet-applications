/**
 * Created by arvid on 2016-10-22.
 *
 * This is the Comments ViewModel powered by KnockoutJS and JQuery
 */

var CommentsViewModel = function () {

    var self = this;
    self.comments = ko.observableArray([]);
    self.commentText = ko.observable("");


    var pathArray = window.location.pathname.split( '/' );
    var site = pathArray[5];
    var data;

    if(site=='meatballs')
        data = {'page': '0'};
    else
        data = {'page': '1'};


    $.post('http://localhost/id1354/seminar-4/Members/get_member_id', function (secondData) {

        /* Get comments when loading page */
        $.post('http://localhost/id1354/seminar-4/Comments/getComment', data, function (data) {

            for (var i in data) {
                if (data[i].id == secondData) {

                    self.comments.push
                    ({
                        author: data[i].username,
                        comment: data[i].comment,
                        cid: data[i].cid,
                        canDelete: true
                    });

                } else {

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


    /* Add comment to database (updated directly in client via long pollig) */
    self.addComment = function () {
        if(!(self.commentText().length == 0)) {
            data['comment'] = self.commentText();
            $.post('http://localhost/id1354/seminar-4/Comments/addComment', data, 'json');

        }
        self.commentText("")
    };


    self.delComment = function (CommentsViewModel) {

        var target;

        if (event.target) target = event.target;
        else if (event.srcElement) target = event.srcElement;

        if (target.nodeType == 3) // defeat Safari bug
            target = target.parentNode;

        target.parentNode.innerHTML = "fake";

        //data['delcomment'] = cid;
        //$.post('http://localhost/id1354/seminar-4/Comments/delComment', data, 'json');

    };

};

ko.applyBindings(new CommentsViewModel());