/* version Number update */
function updateVersion(src) {
    let versionNum = parseFloat(src.value);

    // minor updates increase by +0.1
    // major updates increase by +1.0
    if (src.id == "minor") versionNum += 0.1;
    else versionNum += 1.0;

    console.log(versionNum);
    // jquery update version number
    $("#versionNumber").val(versionNum.toFixed(1));
}

/* Date time picker */
var dateEl = document.getElementById('date');
var timeEl = document.getElementById('time');

document.getElementById('date-output').innerHTML = dateEl.type === 'date';
document.getElementById('time-output').innerHTML = timeEl.type === 'time';


