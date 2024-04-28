LoadData();

function LoadData() {
    $.ajax({
        type: "POST",
        url: "book.php",
        data: {
            transaction: "Get-User-Data",
        },
    }).done(function(msg) {
        var studentList = JSON.parse(msg);
        $("#tableBook> tbody").empty();
        studentList.forEach((element) => {
            var s = "<tr>";
            s = s + "<td>" + element.LRN + "</td>";
            s = s + "<td>" + element.FirstName + "</td>";
            s = s + "<td>" + element.LastName + "</td>";
            s = s + "<td>" + element.Section + "</td>";
            s = s + "<td>" + element.GradeLevel + "</td>";
            s = s + "<td>" + element.ContactNumber + "</td>";
            btnEdit = "<button class='Edit'>EDIT</button>";
            btnDelete = "<button class='Delete'>DELETE</button>";
            s = s + "<td>" + btnEdit + "</td>";
            s = s + "<td>" + btnDelete + "</td>";
            s = s + "</tr>";
            $("#tableBook> tbody").append(s);
        });
    });
}