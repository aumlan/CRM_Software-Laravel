$(document).ready(function() {
    $('#userNameBtn').on('click', function() {
        //var userName = $('#userNameBtn').text();
        //var userName = document.getElementById('userNameBtn').innerHTML;
        //console.log(userName);
    });
});

$(document).ready(function() {
    $('#msgBoxSection1').scrollTop($(document).height());
    $('#searchBox').on('keyup', function() {
        var searchText = $("#searchBox").val();
        console.log(searchText);
        if (searchText.length > 1 || searchText != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/chat/searchUser',
                method: 'post',
                datatype: 'json',
                data: { 'userName': searchText },
                success: function(response) {
                    if (response.product !== 'error' && response.product !== undefined) {
                        console.log(response);
                        console.log('Success');
                    } else {
                        //console.log(response);
                        console.log(response.full_name);
                        $('#clientBox').hide();
                        $('#clientSearchBox').show();
                        $('#clientSearchBox').empty();
                        if (response.full_name != undefined) {
                            $('#clientSearchBox').append("<a href='/chat/" + response.id + "' class=" + "btn btn-success rounded border border-light btn-block btn-sm text-light text-decoration-none text-left border border-light" + ">" + response.full_name + "</a><br>");
                        } else {
                            $("#clientSearchBox").append("No client found!");
                        }
                    }
                },
                error: function(response) {
                    var text = response.responseText.substring(searchText.length);
                    var product = JSON.parse(text);
                }
            });
        } else {

            $('#clientBox').show();
            $('#clientSearchBox').hide();
        }
    });

    $('#sendMsgBtn1').on('click', function() {

        var msgBody1 = $('#textMsg1').val();
        var clientName = $('#clientNameLabel1').text();
        //alert(clientName);
        // console.log(msgBody);
        // console.log(clientName);
        if (msgBody1.length > 1 || msgBody1 != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/chat/send-message',
                method: 'post',
                datatype: 'json',
                data: { 'clientName': clientName, 'message': msgBody1 },
                success: function(response) {
                    // alert('chatClient');
                    if (response.product !== 'error' && response.product !== undefined) {
                        console.log(response);
                        console.log('Success');
                    } else {
                        console.log(response);
                        if (response[0].sent_from == 'Manager') {
                            $('#msgBoxSection1').append("<br><br><span id='rcorners3' class='float-left'>" + response[0].body + "</span>");
                            $('#msgBoxSection1').scrollTop($(document).height());
                            $('#textMsg1').val('');
                        } else if (response[0].sent_from == 'Client') {
                            $('#msgBoxSection1').append("<br><br><span id='rcorners4'  class='float-right'>" + response[0].body + "</span><br>");
                            $('#msgBoxSection1').scrollTop($(document).height());
                            $('#textMsg1').val('');
                        }
                    }
                },
                error: function(response) {
                    console.log(response);
                    console.log('Error');
                }
            });
        } else {}
    });
    setInterval(function() {
        var clientName = $('#clientNameLabel1').text();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chat/get-chat',
            method: 'post',
            datatype: 'json',
            data: { 'clientName': clientName },
            success: function(response) {
                if (response.product !== 'error' && response.product !== undefined) {
                    console.log(response);
                    console.log('Success');
                } else {
                    console.log(response);
                    $("#msgBoxSection1").html("");
                    for (var i = response.length - 1; i >= 0; i--) {
                        if (response[i].sent_from == 'Manager') {
                            $("#msgBoxSection1").append("<br><br><span id='rcorners3' class='float-left'>" + response[i].body + "</span>");
                        } else if (response[i].sent_from == 'Client') {
                            $("#msgBoxSection1").append("<br><br><span id='rcorners4'  class='float-right'>" + response[i].body + "</span>");
                        }
                    }
                }
            },
            error: function(response) {
                console.log(response);
                console.log('Error');
            }
        });
    }, 2000);
});