function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}


function validateForm() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var isChecked = Array.prototype.slice.call(checkboxes).some(function(checkbox) {
    return checkbox.checked;
  });

  if (!isChecked) {
    alert("Please select at least one option.");
    return false;
  }

  return true;
}