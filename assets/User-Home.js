function generatePinCheck() {
	if (document.getElementById('autogeneratepin').checked)
	{
		document.getElementById('pincode').style.display = 'none';
		document.getElementById('pincode').disabled = 'disabled';
	}
	else
	{
		document.getElementById('pincode').style.display = 'block';
		document.getElementById('pincode').disabled = '';
	}
}