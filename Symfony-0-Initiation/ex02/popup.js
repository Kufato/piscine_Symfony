document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("myForm");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        displayFormContents();
    });
});

function displayFormContents() {
    var out = '';

    out += 'Firstname = ' + document.getElementById('firstname').value + '\n';
    out += 'Name = '      + document.getElementById('name').value      + '\n';
    out += 'Phone = '     + document.getElementById('phone').value     + '\n';
    out += 'Age = '       + document.getElementById('age').value       + '\n';
    out += 'Email = '     + document.getElementById('email').value     + '\n';

    out += 'Gender = ';
    if (document.getElementById('male').checked)
        out += document.getElementById('male').value;
    if (document.getElementById('female').checked)
        out += document.getElementById('female').value;
    if (document.getElementById('other').checked)
        out += document.getElementById('other').value;
    out += '\n';

    if (document.getElementById('student').checked)
        out += 'Student at 42 = yes';
    else
        out += 'Student at 42 = no';

    alert(out);
}
