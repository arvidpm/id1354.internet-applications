/**
 * Created by arvid on 2016-10-22.
 *
 * This is the Comments ViewModel powered by KnockoutJS and JQuery
 */

var CommentsViewModel = function () {

    var self = this;
    self.comments = ko.observableArray([]);
    self.commentText = ko.observable("");


    self.comments.push({
        author: 'Arvid',
        comment: 'ContentContent',
        cid: 1,
        canDelete: true
    });

    self.comments.push({
        author: 'Bertil',
        comment: 'Content2Content2',
        cid: 1,
        canDelete: true
    });


    var data = {"site": "meatballs", "page": "0"};

    /* Get comments when loading page */
    $.post("http://localhost/id1354/seminar-4/Comments/getComment", data, function (data) {
        for (var i in data) {
            self.comments.push
            ({
                author: data[i].username,
                comment: data[i].comment,
                cid: data[i].cid,
                canDelete: true
            });
        }
    });


    /*
     var currentLocation = window.location.hash;

     console.log(currentLocation);

     if (currentLocation == "meatballs")
     var postData = {"site": "meatballs", "page": "0"};
     else
     var postData = {"site": "pancakes", "page": "1"};


     var postData = {"site": "meatballs", "page": "0"};

     $.post("Members/get_member_id", function (secondData) {

     $.post("Comments/getComment", postData, function (data) {
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
     }, "json");
     });

     */

};

ko.applyBindings(new CommentsViewModel());