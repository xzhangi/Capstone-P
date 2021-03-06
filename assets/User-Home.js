$(document).ready(function() {
  

  function lockerSizeChange() {
    var rad = document.lockerSizeForm.lockersize;
    var prev = null;
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            (prev)? console.log(prev.value):null;
            if(this !== prev) {
                prev = this;
            }
            varLockerSizeSelected = this.value;
        };
    }
  };

  function check(input) {
    if (input.value != document.getElementById('pincode').value) {
        input.setCustomValidity('Pincode Must be Matching.');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
  };

  //Disable show pin button (after user shows pin)
  function disableShowPinBtn() {
    var rows = document.getElementsByTagName("table")[0].rows;
    var last = rows[rows.length - 1];
    var cell = last.cells[0];
    var value = cell.innerHTML;
    if (value != "******")
        document.getElementById("showPinBtn").disabled = true;
  };


});

function generatePinCheck() {
    if (document.getElementById('autogeneratepin').checked)
    {
        document.getElementById('pincode').style.display = 'none';
        document.getElementById('pincode').disabled = 'disabled';
        document.getElementById('pincode_confirm').style.display = 'none';
        document.getElementById('pincode_confirm').disabled = 'disabled';
    }
    else
    {
        document.getElementById('pincode').style.display = 'block';
        document.getElementById('pincode').disabled = '';
        document.getElementById('pincode_confirm').style.display = 'block';
        document.getElementById('pincode_confirm').disabled = '';
    }
  };