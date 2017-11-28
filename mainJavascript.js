function postContactToGoogle() {
    var email = $('#email').val();
    var lastName = $('#lastName').val();
    var password = $('#password').val();
    
    $.ajax({
        url: "https://docs.google.com/forms/d/e/1FAIpQLSeGrUIRY_Q4JH3yZSNFnnj09bzOM4Q3SSCJtCKQw9qcb7y8iQ/formResponse",
        data: {
            "entry.14642949": email,
            "entry.482626309": lastName,
            "entry.449965054": password
        },
        type: "POST",
        dataType: "xml"
    }); 
    
    alert('User saved')
}